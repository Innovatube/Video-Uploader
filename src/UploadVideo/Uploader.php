<?php

namespace TriHTM\UploadVideo;

use TriHTM\UploadVideo\File;
use TriHTM\UploadVideo\Platforms\UploadableInterface;

class Uploader
{
    use AccessTokenTrait;

    /**
     * @var File
     */
    protected $file;

    /** @var  UploadableInterface */
    protected $platform;

    /**
     * Set file
     * @param File $file
     * @return Uploader
     */
    public function setFile(File $file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Get file
     * @return File
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Set platform
     *
     * @param UploadableInterface $platform
     */
    public function setPlatform(UploadableInterface $platform)
    {
        $this->platform = $platform;
    }

    /**
     * Get platform
     *
     * @return UploadableInterface
     */
    public function getPlatform()
    {
        return $this->platform;
    }

    /**
     * Upload file
     *
     * @return UploadResponse
     */
    public function upload()
    {
        return $this->getPlatform()->upload($this->getFile(), $this->getAccessToken());
    }
}