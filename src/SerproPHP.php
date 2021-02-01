<?php

namespace Jeidison\SerproPHP;

use Jeidison\SerproPHP\AccessToken\AccessToken;
use Jeidison\SerproPHP\AccessToken\AccessTokenParameter;
use Jeidison\SerproPHP\CpfConsultation\ConsultCpfParameter;
use Jeidison\SerproPHP\CpfConsultation\CPFConsultation;
use Jeidison\SerproPHP\Curl\CurlCallResponse;
use Jeidison\SerproPHP\DataValid\DataValid;
use Jeidison\SerproPHP\DataValid\DataValidParameter;

class SerproPHP
{
    public static function new()
    {
        return new self();
    }

    public function consultCpf(ConsultCpfParameter $parameter)
    {
        return CPFConsultation::new()->consultCpf($parameter);
    }

    public function retrieveAccessToken(AccessTokenParameter $parameter): CurlCallResponse
    {
        return AccessToken::new()->retrieveAccessToken($parameter);
    }

    public function dateValidate(DataValidParameter $parameter)
    {
        return DataValid::new()->dateValidate($parameter);
    }

}