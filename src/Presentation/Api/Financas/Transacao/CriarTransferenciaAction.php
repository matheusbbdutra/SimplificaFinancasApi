<?php

namespace App\Presentation\Api\Financas\Transacao;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CriarTransferenciaAction
{
    #[Route('/api/financas/nova-transferencia', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        // TODO: Implementar action
    }
}
