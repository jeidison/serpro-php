<?php

namespace Jeidison\SerproPHP\DataValid;

class Affiliation
{
    private $fatherName;
    private $motherName;

    public static function new()
    {
        return new self;
    }

    public function getFatherName(): ?string
    {
        return $this->fatherName;
    }

    public function setFatherName(?string $fatherName)
    {
        $this->fatherName = $fatherName;
        return $this;
    }

    public function getMotherName(): ?string
    {
        return $this->motherName;
    }

    public function setMotherName(?string $motherName)
    {
        $this->motherName = $motherName;
        return $this;
    }

    public function toArray()
    {
        return [
            'nome_mae' => $this->getMotherName(),
            'nome_pai' => $this->getFatherName(),
        ];
    }

}