<?php

namespace Jeidison\SerproPHP\AccessToken;

use Exception;
use Jeidison\SerproPHP\Curl\Curl;
use Jeidison\SerproPHP\Curl\CurlCallResponse;

class AccessToken
{
    public static function new()
    {
        return new self();
    }

    public function retrieveAccessToken(AccessTokenParameter $parameter): CurlCallResponse
    {
        $response = Curl::call($parameter->toCurlParam());
        if ($response->isSuccess())
            return $response;
        throw new Exception($response->toObject()->error_description);
    }

}