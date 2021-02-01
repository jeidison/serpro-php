<?php

namespace Jeidison\SerproPHP\DataValid;

class Document
{
    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $number;

    /**
     * Orgão expedidor
     * @var string
     */
    private $dispatchingBody;

    /**
     * Orgão expedidor
     * @var string
     */
    private $dispatchingUf;

    public static function new()
    {
        return new self;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(?int $type): Document
    {
        $this->type = $type;
        return $this;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): Document
    {
        $this->number = $number;
        return $this;
    }

    public function getDispatchingBody(): ?string
    {
        return $this->dispatchingBody;
    }

    public function setDispatchingBody(?string $dispatchingBody): Document
    {
        $this->dispatchingBody = $dispatchingBody;
        return $this;
    }

    public function getDispatchingUf(): ?string
    {
        return $this->dispatchingUf;
    }

    public function setDispatchingUf(?string $dispatchingUf): Document
    {
        $this->dispatchingUf = $dispatchingUf;
        return $this;
    }

    public function toArray()
    {
        return [
            'tipo'            => $this->getType(),
            'numero'          => $this->getNumber(),
            'orgao_expedidor' => $this->getDispatchingBody(),
            'uf_expedidor'    => $this->getDispatchingUf(),
        ];
    }

}