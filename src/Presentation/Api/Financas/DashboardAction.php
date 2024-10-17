<?php

namespace App\Presentation\Api\Financas;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

class DashboardAction
{
    #[Route('/api/financas/dashboard', methods: ['GET'])]
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse([]);
    }
}
