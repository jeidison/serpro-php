<?php

namespace Jeidison\SerproPHP\DataValid;

class CNH
{
    /**
     * @var string
     */
    private $category;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $firstCnhDate;

    /**
     * @var string
     */
    private $expirationDate;

    /**
     * @var string
     */
    private $numberForeign;

    /**
     * @var string
     */
    private $lastEmissionDate;

    /**
     * @var string
     */
    private $situationCode;

    public static function new()
    {
        return new self;
    }

    public function getCategory(): ?string
    {
        return $this->category;
    }

    public function setCategory(?string $category): CNH
    {
        $this->category = $category;
        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): CNH
    {
        $this->number = $number;
        return $this;
    }

    public function getFirstCnhDate(): ?string
    {
        return $this->firstCnhDate;
    }

    public function setFirstCnhDate(?string $firstCnhDate): CNH
    {
        $this->firstCnhDate = $firstCnhDate;
        return $this;
    }

    public function getExpirationDate(): ?string
    {
        return $this->expirationDate;
    }

    public function setExpirationDate(?string $expirationDate): CNH
    {
        $this->expirationDate = $expirationDate;
        return $this;
    }

    public function getNumberForeign(): ?string
    {
        return $this->numberForeign;
    }

    public function setNumberForeign(?string $numberForeign): CNH
    {
        $this->numberForeign = $numberForeign;
        return $this;
    }

    public function getLastEmissionDate(): ?string
    {
        return $this->lastEmissionDate;
    }

    public function setLastEmissionDate(?string $lastEmissionDate): CNH
    {
        $this->lastEmissionDate = $lastEmissionDate;
        return $this;
    }

    public function getSituationCode(): ?string
    {
        return $this->situationCode;
    }

    public function setSituationCode(?string $situationCode): CNH
    {
        $this->situationCode = $situationCode;
        return $this;
    }

    public function toArray()
    {
        return [
            'categoria'                     => $this->getCategory(),
            'numero_registro'               => $this->getNumber(),
            'data_primeira_habilitacao'     => $this->getFirstCnhDate(),
            'data_validade'                 => $this->getExpirationDate(),
            'registro_nacional_estrangeiro' => $this->getNumberForeign(),
            'data_ultima_emissao'           => $this->getLastEmissionDate(),
            'codigo_situacao'               => $this->getSituationCode(),
        ];
    }

}