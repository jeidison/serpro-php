<?php

namespace Jeidison\SerproPHP\DataValid;

use Jeidison\SerproPHP\AccessToken\AccessToken;
use Jeidison\SerproPHP\AccessToken\AccessTokenParameter;
use Jeidison\SerproPHP\Curl\Curl;

class DataValid
{
    public static function new()
    {
        return new self();
    }

    public function dateValidate(DataValidParameter $parameter)
    {
        if ($parameter->getAccessToken())
            return Curl::call($parameter->toCurlParam());

        $param = AccessTokenParameter::new($parameter->getConsumerKey(), $parameter->getConsumeSecret());
        $param->setUrl($parameter->getUrl());

        $accessTokenObject = AccessToken::new()->retrieveAccessToken($param);
        $parameter->setAccessToken($accessTokenObject->toObject()->access_token);

        return Curl::call($parameter->toCurlParam());
    }
}