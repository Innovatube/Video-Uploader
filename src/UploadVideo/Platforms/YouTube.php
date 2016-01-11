<?php

namespace TriHTM\UploadVideo\Platforms;

use Google_Client;
use Google_Service_YouTube;
use Google_Service_YouTube_VideoSnippet;
use Google_Service_YouTube_VideoStatus;
use Google_Service_YouTube_Video;
use Google_Http_MediaFileUpload;
use Google_Http_Request;
use TriHTM\UploadVideo\File;
use TriHTM\UploadVideo\UploadResponse;

class YouTube extends Base
{
    protected $client;

    public function __construct($config)
    {
        $this->client = new Google_Client();
        $this->client->setClientId($config['clientId']);
        $this->client->setClientSecret($config['clientSecret']);
        $this->client->setScopes($config['scopes']);
    }

    public function upload(File $file, $accessToken)
    {
        $this->client->setAccessToken($accessToken);

        $response = new UploadResponse();
        $youtube = new Google_Service_YouTube($this->client);

        $snippet = new Google_Service_YouTube_VideoSnippet();
        $snippet->setTitle($file->getTitle());
        $snippet->setDescription($file->getDescription());
        $snippet->setTags($file->getTags());

        $status = new Google_Service_YouTube_VideoStatus();
        $status->setPrivacyStatus($file->getPrivacy());

        $video = new Google_Service_YouTube_Video();
        $video->setSnippet($snippet);
        $video->setStatus($status);

        try {
            // Specify the size of each chunk of data, in bytes. Set a higher value for
            // reliable connection as fewer chunks lead to faster uploads. Set a lower
            // value for better recovery on less reliable connections.
            $chunkSizeBytes = 1 * 1024 * 1024;

            // Setting the defer flag to true tells the client to return a request which can be called
            // with ->execute(); instead of making the API call immediately.
            $this->client->setDefer(true);

            // Create a request for the API's videos.insert method to create and upload the video.
            /** @var Google_Http_Request $insertRequest */
            $insertRequest = $youtube->videos->insert("status,snippet", $video);

            // Create a MediaFileUpload object for resumable uploads.
            $media = new Google_Http_MediaFileUpload(
                $this->client,
                $insertRequest,
                'video/*',
                null,
                true,
                $chunkSizeBytes
            );
            $media->setFileSize($file->getFileSize());

            // Read the media file and upload it chunk by chunk.
            $status = false;
            $handle = fopen($file->getPath(), "rb");
            while (!$status && !feof($handle)) {
                $chunk = fread($handle, $chunkSizeBytes);
                $status = $media->nextChunk($chunk);
            }

            fclose($handle);

            // If you want to make other calls after the file upload, set setDefer back to false
            $this->client->setDefer(false);
        } catch (\Exception $e) {
            $response->setCode(UploadResponse::RESPONSE_ERROR_UNDEFINED);
            $response->setMessage($e->getMessage());

            return $response;
        }

        $response->setCode(UploadResponse::RESPONSE_SUCCESS);
        $response->setMessage('Upload successfully.');

        return $response;
    }
}