<?php

namespace App\Presentation\Api\Financas\Contas\Command;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class NovaContaAction
{
    #[Route('/api/financas/nova-conta', name: 'nova_conta', methods: ['POST'])]
    public function __invoke(Request $request)
    {
        // TODO: Implementar action
    }
}
