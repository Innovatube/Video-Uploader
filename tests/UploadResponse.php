<?php

namespace TriHTM\UploadVideo\Tests;

class UploadResponse extends Base
{
    public function testUploadResponse()
    {
        $uploadResponse = new \TriHTM\UploadVideo\UploadResponse();

        // Test code
        $uploadResponse->setCode(\TriHTM\UploadVideo\UploadResponse::RESPONSE_SUCCESS);
        $this->assertEquals(\TriHTM\UploadVideo\UploadResponse::RESPONSE_SUCCESS, $uploadResponse->getCode());
        $this->assertEquals(true, $uploadResponse->success());
        $this->assertEquals(false, $uploadResponse->failure());

        // Test message
        $uploadResponse->setMessage('Message');
        $this->assertEquals('Message', $uploadResponse->getMessage());

        // Test videoid
        $uploadResponse->setVideoId('123');
        $this->assertEquals('123', $uploadResponse->getVideoId());
    }
}