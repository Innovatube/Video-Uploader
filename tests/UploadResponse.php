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

        // Test message
        $uploadResponse->setMessage('Message');
        $this->assertEquals('Message', $uploadResponse->getMessage());
    }
}