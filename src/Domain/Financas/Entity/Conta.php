<?php

namespace App\Domain\Financas\Entity;

class Conta
{
    private int $id;
    
    public function __construct(
        private Carteira $carteira,
        private string $descricao,
        private string $tipo
    ) {
    }
    
    public function getCarteira(): Carteira
    {
        return $this->carteira;
    }

    public function setCarteira(Carteira $carteira): void
    {
        $this->carteira = $carteira;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getTipo(): string
    {
        return $this->tipo;
    }

    public function setTipo(string $tipo): void
    {
        $this->tipo = $tipo;
    }
}
