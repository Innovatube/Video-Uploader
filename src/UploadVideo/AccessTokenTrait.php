<?php

namespace Trihtm\UploadVideo;

trait AccessTokenTrait
{
    /**
     * @var string
     */
    protected $accessToken;

    /**
     * Set access token
     *
     * @param $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Get access token
     *
     * @return string
     */
    public function getAccessToken()
    {
        return $this->accessToken;
    }
}