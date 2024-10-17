<?php

namespace App\Domain\Usuario\Services;

use App\Application\DTO\Usuario\UsuarioDTO;
use App\Domain\Financas\Entity\Carteira;
use App\Domain\Usuario\Entity\Usuario;
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;

class CriarUsuarioService
{
    public function __construct(private readonly UsuarioRepositoryInterface $usuarioRepository)
    {
    }

    public function criarUsuario(UsuarioDTO $usuarioDTO): Usuario
    {
        $usuario = $this->criarEntidadeUsuario($usuarioDTO);
        $this->associarCarteiraAoUsuario($usuario);

        $this->usuarioRepository->salvar($usuario);

        return $usuario;
    }

    private function criarEntidadeUsuario(UsuarioDTO $dto): Usuario
    {
        return new Usuario(
            $dto->getNome(),
            $dto->getEmail(),
            $dto->getSenha()
        );
    }

    private function associarCarteiraAoUsuario(Usuario $usuario): void
    {
        $carteira = new Carteira($usuario);
        $usuario->setCarteira($carteira);
    }
}
