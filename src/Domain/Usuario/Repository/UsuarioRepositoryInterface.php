<?php

namespace App\Domain\Usuario\Repository;

use App\Domain\Usuario\Entity\Usuario;

interface UsuarioRepositoryInterface
{
    public function salvar(Usuario $usuario): void;
}
