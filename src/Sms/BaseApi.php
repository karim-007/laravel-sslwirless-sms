<?php

namespace Karim007\LaravelSslwirlessSms\Sms;

class BaseApi
{
    /**
     * @var string $baseUrl
     */
    protected $baseUrl;
    protected $api_token;
    protected $sid;
    protected $domain;
    protected $MsgType;

    public function __construct()
    {
        $this->api_token = config("sslwirless.api_token");
        $this->sid = config("sslwirless.sid");
        $this->domain = config("sslwirless.domain");
        $this->MsgType = config("sslwirless.message_type");
        $this->baseUrl();
    }

    private function baseUrl()
    {
        $this->baseUrl = $this->domain;
    }
}
