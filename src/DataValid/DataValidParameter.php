<?php

namespace Jeidison\SerproPHP\DataValid;

use Exception;
use Jeidison\SerproPHP\Curl\CurlCallParameter;
use Jeidison\SerproPHP\Utils\ValidationUtils;

class DataValidParameter
{
    /**
     * @var string
     */
    private $cpf;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string[M, F]
     */
    private $sex;

    /**
     * @var int
     */
    private $nationality;

    /**
     * @var Affiliation
     */
    private $affiliation;

    /**
     * @var Document
     */
    private $document;

    /**
     * @var Address
     */
    private $address;

    /**
     * @var CNH
     */
    private $cnh;

    /**
     * @var string
     */
    private $cpfSituation;

    /**
     * @var string
     */
    private $birthDate;

    /**
     * @var string
     */
    private $url = UrlEnum::URL_PRODUCTION;

    /**
     * @var string
     */
    private $endpoint = "/datavalid/v2/validate/pf";

    /**
     * @var string
     */
    private $consumerKey;

    /**
     * @var string
     */
    private $consumeSecret;

    /**
     * @var string
     */
    private $accessToken;

    public static function new(): self
    {
        return new self;
    }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function setCpf(string $cpf): DataValidParameter
    {
        if(!ValidationUtils::isValidCPF($cpf))
            throw new Exception("CPF inválido.");

        $this->cpf = $cpf;
        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): DataValidParameter
    {
        $this->name = $name;
        return $this;
    }

    public function getSex(): ?string
    {
        return $this->sex;
    }

    public function setSex(?string $sex): DataValidParameter
    {
        $this->sex = $sex;
        return $this;
    }

    public function getNationality(): ?int
    {
        return $this->nationality;
    }

    public function setNationality(?int $nationality): DataValidParameter
    {
        $this->nationality = $nationality;
        return $this;
    }

    public function getAffiliation(): ?Affiliation
    {
        return $this->affiliation;
    }

    public function setAffiliation(?Affiliation $affiliation): DataValidParameter
    {
        $this->affiliation = $affiliation;
        return $this;
    }

    public function getDocument(): ?Document
    {
        return $this->document;
    }

    public function setDocument(?Document $document): DataValidParameter
    {
        $this->document = $document;
        return $this;
    }

    public function getAddress(): ?Address
    {
        return $this->address;
    }

    public function setAddress(?Address $address): DataValidParameter
    {
        $this->address = $address;
        return $this;
    }

    public function getCnh(): ?CNH
    {
        return $this->cnh;
    }

    public function setCnh(?CNH $cnh): DataValidParameter
    {
        $this->cnh = $cnh;
        return $this;
    }

    public function getCpfSituation(): ?string
    {
        return $this->cpfSituation;
    }

    public function setCpfSituation(?string $cpfSituation)
    {
        $this->cpfSituation = $cpfSituation;
        return $this;
    }

    public function getBirthDate(): ?string
    {
        return $this->birthDate;
    }

    public function setBirthDate(?string $birthDate)
    {
        $this->birthDate = $birthDate;
        return $this;
    }

    public function getUrl(): string
    {
        return $this->url;
    }

    public function setUrl(string $url): DataValidParameter
    {
        $this->url = $url;
        return $this;
    }

    public function getConsumerKey(): string
    {
        return $this->consumerKey;
    }

    public function setConsumerKey(string $consumerKey): DataValidParameter
    {
        $this->consumerKey = $consumerKey;
        return $this;
    }

    public function getConsumeSecret(): string
    {
        return $this->consumeSecret;
    }

    public function setConsumeSecret(string $consumeSecret): DataValidParameter
    {
        $this->consumeSecret = $consumeSecret;
        return $this;
    }

    public function getAccessToken(): ?string
    {
        return $this->accessToken;
    }

    public function setAccessToken(string $accessToken): DataValidParameter
    {
        $this->accessToken = $accessToken;
        return $this;
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }

    public function setEndpoint(string $endpoint): DataValidParameter
    {
        $this->endpoint = $endpoint;
        return $this;
    }

    public function toArray(): array
    {
        return [
            'key' => [
                'cpf' => $this->getCpf()
            ],
            'answer' => [
                'nome'            => $this->getName(),
                'sexo'            => $this->getSex(),
                'nacionalidade'   => $this->getNationality(),
                'filiacao'        => $this->getAffiliation()->toArray(),
                'documento'       => $this->getDocument()->toArray(),
                'endereco'        => $this->getAddress()->toArray(),
                'cnh'             => $this->getCnh()->toArray(),
                'data_nascimento' => $this->getBirthDate(),
                'situacao_cpf'    => $this->getCpfSituation(),
            ]
        ];
    }

    public function toJson()
    {
        return json_encode($this->toArray());
    }

    public function toCurlParam()
    {
        $curlParam = new CurlCallParameter();
        $curlParam->setUrl($this->getUrl() . $this->getEndpoint());
        $curlParam->setHeaders(["Accept: application/json", "Authorization: Bearer {$this->getAccessToken()}", "Content-Type: application/json"]);
        $curlParam->setMethod('POST');
        $curlParam->setParamsBody($this->toJson());
        return $curlParam;
    }

}