<?php

namespace Jeidison\SerproPHP\CpfConsultation;

use Jeidison\SerproPHP\AccessToken\AccessToken;
use Jeidison\SerproPHP\AccessToken\AccessTokenParameter;
use Jeidison\SerproPHP\Curl\Curl;

class CPFConsultation
{
    private $accessTokenRequest;

    public function __construct()
    {
        $this->accessTokenRequest = new AccessToken();
    }

    public static function new()
    {
        return new self();
    }

    public function consultCpf(ConsultCpfParameter $parameter)
    {
        if ($parameter->getAccessToken())
            return Curl::call($parameter->toCurlParam());

        $paramAccessToken = new AccessTokenParameter();
        $paramAccessToken->setConsumerKey($parameter->getConsumerKey());
        $paramAccessToken->setConsumeSecret($parameter->getConsumeSecret());
        $paramAccessToken->setUrl($parameter->getUrl());

        $accessTokenObject = $this->accessTokenRequest->retrieveAccessToken($paramAccessToken);

        $parameter->setAccessToken($accessTokenObject->toObject()->access_token);

        return Curl::call($parameter->toCurlParam());
    }

}