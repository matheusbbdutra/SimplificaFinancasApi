<?php

namespace App\Domain\Financas\Entity;

use App\Domain\Usuario\Entity\Usuario;

class Categoria
{
    private int $id;
    
    public function __construct(
        private string $descricao,
        private TipoTransacao $tipo,
        private Usuario $usuario
    ) {
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getTipo(): TipoTransacao
    {
        return $this->tipo;
    }

    public function setTipo(TipoTransacao $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }
}
