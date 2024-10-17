<?php

namespace App\Domain\Usuario\Entity;

use App\Domain\Financas\Entity\Carteira;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

class Usuario implements UserInterface, PasswordAuthenticatedUserInterface
{
    private int $id;
    private string $senha;
    private Carteira $carteira;
    
    public function __construct(
        private string $nome,
        private string $email,
        string $senha
    ) {
        $this->senha = $this->hashSenha($senha);
    }

    public function getId(): int
    {
        return $this->id;
    }
    
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

    public function getCarteira(): Carteira
    {
        return $this->carteira;
    }

    public function setCarteira(Carteira $carteira): void
    {
        $this->carteira = $carteira;
    }

    private function hashSenha(string $senha): string
    {
        return password_hash($senha, PASSWORD_BCRYPT);
    }

    public function verificarSenha(string $senha): bool
    {
        return password_verify($senha, $this->senha);
    }

    public function getRoles(): array
    {
        return ['ROLE_USER'];
    }

    public function eraseCredentials(): void
    {
        // TODO: Implement eraseCredentials() method.
    }

    public function getUserIdentifier(): string
    {
        return $this->email;
    }

    public function getPassword(): ?string
    {
        return $this->senha;
    }
}
