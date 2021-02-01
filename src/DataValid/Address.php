<?php

namespace Jeidison\SerproPHP\DataValid;

class Address
{
    /**
     * @var string
     */
    private $address;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $complement;

    /**
     * @var string
     */
    private $neighborhood;

    /**
     * @var int
     */
    private $zipCode;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $uf;

    public static function new()
    {
        return new self;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(?string $address): Address
    {
        $this->address = $address;
        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): Address
    {
        $this->number = $number;
        return $this;
    }

    public function getComplement(): ?string
    {
        return $this->complement;
    }

    public function setComplement(?string $complement): Address
    {
        $this->complement = $complement;
        return $this;
    }

    public function getNeighborhood(): ?string
    {
        return $this->neighborhood;
    }

    public function setNeighborhood(?string $neighborhood): Address
    {
        $this->neighborhood = $neighborhood;
        return $this;
    }

    public function getZipCode(): ?int
    {
        return $this->zipCode;
    }

    public function setZipCode(?int $zipCode): Address
    {
        $this->zipCode = $zipCode;
        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(?string $city): Address
    {
        $this->city = $city;
        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(?string $uf): Address
    {
        $this->uf = $uf;
        return $this;
    }

    public function toArray()
    {
        return  [
            'logradouro'  => $this->getAddress(),
            'numero'      => $this->getNumber(),
            'complemento' => $this->getComplement(),
            'bairro'      => $this->getNeighborhood(),
            'cep'         => $this->getZipCode(),
            'municipio'   => $this->getCity(),
            'uf'          => $this->getUf(),
        ];
    }

}