<?php

namespace Jeidison\SerproPHP\Curl;

class CurlCallResponse
{
    private $result;
    private $isSuccess;

    public function __construct($result = null)
    {
        if ($result != null) {
            $this->result    = $result;
            $resultAsArray   = $this->toArray();
            $this->isSuccess = !isset($resultAsArray['error']);
        }
    }

    public function setResult($result)
    {
        $this->result = $result;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function isSuccess(): ?bool
    {
        return $this->isSuccess;
    }

    public function setIsSuccess(bool $isSuccess): void
    {
        $this->isSuccess = $isSuccess;
    }

    public function toJson()
    {
        if ($this->isJson($this->result))
            return $this->result;
        return json_encode($this->result);
    }

    public function toArray()
    {
        return json_decode($this->toJson(), true);
    }

    public function toObject()
    {
        return json_decode($this->result);
    }

    private function isJson($string)
    {
        json_decode($string);
        return (json_last_error() == JSON_ERROR_NONE);
    }
}