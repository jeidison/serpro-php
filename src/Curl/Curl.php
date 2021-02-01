<?php

namespace Jeidison\SerproPHP\Curl;

class Curl
{

    public static function call(CurlCallParameter $parameter): CurlCallResponse
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $parameter->getUrl());
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $parameter->getMethod());
        curl_setopt($ch, CURLOPT_HTTPHEADER, $parameter->getHeaders());
        if ($parameter->getParamsBody())
            curl_setopt($ch, CURLOPT_POSTFIELDS, $parameter->getParamsBody());

        $result = curl_exec($ch);

        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        curl_close($ch);
        return new CurlCallResponse($result);
    }

}