<?php

namespace App\Domain\Financas\Entity;

use App\Domain\Usuario\Entity\Usuario;

class SubCategoria
{
    private int $id;
    
    public function __construct(
        private string $descricao,
        private Categoria $categoria,
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

    public function getCategoria(): Categoria
    {
        return $this->categoria;
    }

    public function setCategoria(Categoria $categoria): void
    {
        $this->categoria = $categoria;
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
