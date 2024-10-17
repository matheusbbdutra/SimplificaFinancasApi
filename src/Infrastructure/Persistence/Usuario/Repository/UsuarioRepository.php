<?php

namespace App\Infrastructure\Persistence\Usuario\Repository;

use App\Domain\Usuario\Entity\Usuario;
use App\Domain\Usuario\Repository\UsuarioRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class UsuarioRepository implements UsuarioRepositoryInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }

    public function salvar(Usuario $usuario): void
    {
        $this->entityManager->persist($usuario);
        $this->entityManager->flush();
    }
}
