<?php

namespace Jeidison\SerproPHP\Curl;

class CurlCallParameter
{

    private $url;
    private $method;
    private $headers = [];
    private $paramsBody;

    public function getUrl()
    {
        return $this->url;
    }

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setMethod($method): void
    {
        $this->method = $method;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function setHeaders(array $headers): void
    {
        $this->headers = $headers;
    }

    public function getParamsBody()
    {
        return $this->paramsBody;
    }

    public function setParamsBody($paramsBody): void
    {
        $this->paramsBody = $paramsBody;
    }

}