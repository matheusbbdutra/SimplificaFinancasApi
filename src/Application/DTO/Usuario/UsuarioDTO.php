<?php

namespace App\Application\DTO\Usuario;

use Symfony\Component\Serializer\Attribute\SerializedName;

class UsuarioDTO
{
    #[SerializedName('nome')]
    private string $nome;
    #[SerializedName('email')]
    private string $email;
    #[SerializedName('senha')]
    private string $senha;
    #[SerializedName('acao')]
    private string $acao;

    public function __construct(string $nome, string $email, string $senha)
    {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = $senha;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function getAcao(): string
    {
        return $this->acao;
    }
}
