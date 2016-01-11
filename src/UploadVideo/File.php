<?php

namespace TriHTM\UploadVideo;

class File
{
    const PRIVACY_PUBLIC = 'public';

    const PRIVACY_PRIVATE = 'private';

    /**
     * @var string
     */
    protected $filePath;

    /**
     * @var string
     */
    protected $title;

    /**
     * @var string
     */
    protected $description;

    /**
     * @var array
     */
    protected $tags;

    /**
     * @var string
     */
    protected $privacy = self::PRIVACY_PUBLIC;

    public function __construct($filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * Set title of this file
     *
     * @param $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * Get title of this file
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set description of this file
     *
     * @param $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * Get description of this file
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set tags of this file
     *
     * @param array $tags
     */
    public function setTags(array $tags)
    {
        $this->tags = $tags;
    }

    /**
     * Get tags of this file
     *
     * @return array
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set privacy of this file
     * @param $privacy
     */
    public function setPrivacy($privacy)
    {
        $this->privacy = $privacy;
    }

    /**
     * Get privacy of this file
     *
     * @return string
     */
    public function getPrivacy()
    {
        return $this->privacy;
    }

    /**
     * Get path of this file
     *
     * @return string
     */
    public function getPath()
    {
        return $this->filePath;
    }

    /**
     * Get MIME type of this file
     *
     * @source http://stackoverflow.com/questions/23287341/how-to-get-mime-type-of-a-file-in-php-5-5
     * @return mixed
     */
    public function getMIME()
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);

        $mime = finfo_file($finfo, $this->filePath);

        finfo_close($finfo);

        return $mime;
    }


    /**
     * Get size of this file
     * @return int
     */
    public function getFileSize()
    {
        return filesize($this->filePath);
    }
}