<?php

namespace App\Presentation\Api\Financas\Transacao\Command;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CriarDespesaAction
{
    #[Route('/api/financas/nova-despesa', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        // TODO: Implementar action
    }
}
