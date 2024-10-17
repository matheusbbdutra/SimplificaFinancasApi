<?php

namespace App\Presentation\Api\Financas\Transacao\Command;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class CriarDespesaCartaoAction
{
    #[Route('/api/financas/nova-despesa-cartao', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        // TODO: Implementar action
    }
}
