<?php

namespace Jeidison\SerproPHP\AccessToken;

use Jeidison\SerproPHP\Curl\CurlCallParameter;

class AccessTokenParameter
{
    private $consumerKey;
    private $consumeSecret;
    private $url;
    private $endpoint;
    private $grantType = "grant_type=client_credentials";

    public static function new($consumerKey, $consumeSecret)
    {
        $self = new self();
        $self->setConsumeSecret($consumeSecret);
        $self->setConsumerKey($consumerKey);

        return $self;
    }

    public function getConsumerKey()
    {
        return $this->consumerKey;
    }

    public function setConsumerKey($consumerKey): void
    {
        $this->consumerKey = $consumerKey;
    }

    public function getConsumeSecret()
    {
        return $this->consumeSecret;
    }

    public function setConsumeSecret($consumeSecret): void
    {
        $this->consumeSecret = $consumeSecret;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function setEndpoint($endpoint)
    {
        $this->endpoint = $endpoint;
    }

    public function getEndpoint()
    {
        return $this->endpoint ?? $this->getUrl() . "/token";
    }

    public function getGrantType(): string
    {
        return $this->grantType;
    }

    public function setGrantType(string $grantType): void
    {
        $this->grantType = $grantType;
    }

    public function getTokenHeader()
    {
        return base64_encode($this->getConsumerKey() . ':' . $this->getConsumeSecret());
    }

    public function toCurlParam()
    {
        $curlParam = new CurlCallParameter();
        $curlParam->setUrl($this->getEndpoint());
        $curlParam->setHeaders(["Content-Type: application/x-www-form-urlencoded", "Authorization: Basic {$this->getTokenHeader()}"]);
        $curlParam->setMethod('POST');
        $curlParam->setParamsBody($this->getGrantType());
        return $curlParam;
    }

}