<?php

namespace App\Domain\Financas\Entity;

use App\Domain\Usuario\Entity\Usuario;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

class Carteira
{
    private int $id;
    private ?string $descricao;

    public function __construct(
        private Usuario $usuario,
        private ?Collection $contas = new ArrayCollection()
    ) {
    }

    public function getUsuario(): Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(Usuario $usuario): void
    {
        $this->usuario = $usuario;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function addConta(Conta $conta): void
    {
        if (!$this->contas->contains($conta)) {
            $this->contas->add($conta);
            $conta->setCarteira($this);
        }
    }

    public function removeConta(Conta $conta): void
    {
        if ($this->contas->contains($conta)) {
            $this->contas->removeElement($conta);
            $conta->setCarteira(null);
        }
    }
    
    public function getContas(): Collection
    {
        return $this->contas;
    }
}
