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
}