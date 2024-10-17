<?php

namespace App\Domain\Financas\Entity;

use App\Domain\Usuario\Entity\Usuario;

class Cartao
{
    public function __construct(
        private $id,
        private $descricao,
        private $limite,
        private $dataValidade,
        private Usuario $usuario
    )
    {
        
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;
        return $this;
    }

    public function getLimite(): ?float
    {
        return $this->limite;
    }

    public function setLimite(float $limite): self
    {
        $this->limite = $limite;
        return $this;
    }

    public function getDataValidade(): ?\DateTimeInterface
    {
        return $this->dataValidade;
    }

    public function setDataValidade(\DateTimeInterface $dataValidade): self
    {
        $this->dataValidade = $dataValidade;
        return $this;
    }
}
