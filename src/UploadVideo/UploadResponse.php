<?php

namespace TriHTM\UploadVideo;

class UploadResponse
{
    const RESPONSE_SUCCESS = 0;

    const RESPONSE_ERROR_UNDEFINED = 1;

    /**
     * @var int
     */
    protected $code;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var string
     */
    protected $videoId;

    /**
     * Get response code
     *
     * @return int
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set response code
     *
     * @param $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * Get response message
     *
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Set response message
     *
     * @param $message
     */
    public function setMessage($message)
    {
        $this->message = $message;
    }

    /**
     * @param $videoId
     */
    public function setVideoId($videoId)
    {
        $this->videoId = $videoId;
    }

    /**
     * @return string
     */
    public function getVideoId()
    {
        return $this->videoId;
    }

    /**
     * Success?
     * @return bool
     */
    public function success()
    {
        return $this->getCode() == self::RESPONSE_SUCCESS;
    }

    /**
     * Failure?
     * @return bool
     */
    public function failure()
    {
        return !$this->success();
    }
}