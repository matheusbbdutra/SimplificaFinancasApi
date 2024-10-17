<?php

namespace App\Domain\Financas\Entity;

class TipoTransacao
{
    private int $id;
    private string $descricao;

    public function getId(): int
    {
        return $this->id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
}
