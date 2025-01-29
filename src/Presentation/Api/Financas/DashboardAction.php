<?php

namespace App\Presentation\Api\Financas;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/api/financas/dashboard', methods: ['GET'])]
class DashboardAction
{
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse([]);
    }
}
