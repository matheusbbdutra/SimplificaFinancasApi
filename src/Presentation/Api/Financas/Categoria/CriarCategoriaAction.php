<?php

namespace App\Presentation\Api\Financas\Categoria;

use Symfony\Component\Routing\Attribute\Route;

class CriarCategoriaAction
{
    #[Route('/api/financas/nova-categoria', methods: ['POST'])]
    public function __invoke()
    {
    }
}
