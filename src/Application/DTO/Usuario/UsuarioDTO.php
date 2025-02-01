<?php

namespace App\Application\DTO\Usuario;

use App\Application\DTO\InputDTO;
use Symfony\Component\Serializer\Attribute\SerializedName;

class UsuarioDTO extends InputDTO
{
    private string $nome;
    private string $email;
    private string $senha;

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    public function getSenha(): string
    {
        return $this->senha;
    }

    public function setSenha(string $senha): void
    {
        $this->senha = $senha;
    }
}
