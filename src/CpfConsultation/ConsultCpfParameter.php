<?php

namespace Jeidison\SerproPHP\CpfConsultation;

use Jeidison\SerproPHP\Curl\CurlCallParameter;

class ConsultCpfParameter
{

    private $cpf;
    private $consumerKey;
    private $consumeSecret;
    private $accessToken;
    private $url = UrlEnum::URL_PRODUCTION;
    private $endpoint = "/consulta-cpf-df/v1/cpf";

    public static function new(): self
    {
        return new static;
    }

    public function getCpf()
    {
        return $this->cpf;
    }

    public function setCpf($cpf): void
    {
        $this->cpf = $cpf;
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

    public function getAccessToken()
    {
        return $this->accessToken;
    }

    public function setAccessToken($accessToken): void
    {
        $this->accessToken = $accessToken;
    }

    public function getTokenHeader()
    {
        return $this->getAccessToken();
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
        return $this->endpoint;
    }

    public function toCurlParam()
    {
        $curlParam = new CurlCallParameter();
        $curlParam->setUrl("{$this->getUrl()}/{$this->getEndpoint()}/{$this->getCpf()}");
        $curlParam->setHeaders(["Accept: application/json", "Authorization: Bearer {$this->getTokenHeader()}"]);
        $curlParam->setMethod('GET');
        return $curlParam;
    }
}