<?php

namespace TriHTM\UploadVideo\Platforms;

use TriHTM\UploadVideo\File;
use TriHTM\UploadVideo\UploadResponse;

interface UploadableInterface
{
    /**
     * Upload file
     *
     * @param File $file
     * @param string $accessToken
     * @return UploadResponse
     */
    public function upload(File $file, $accessToken);
}