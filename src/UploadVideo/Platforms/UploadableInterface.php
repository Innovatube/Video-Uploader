<?php

namespace Innovatube\UploadVideo\Platforms;

use Innovatube\UploadVideo\File;
use Innovatube\UploadVideo\UploadResponse;

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