<?php

namespace App\Presentation\Api\Financas\Contas;

use App\Domain\Financas\Entity\Conta;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ListarContasModalAction
{
    public function __construct(
        private readonly Security $security,
        private readonly EntityManagerInterface $entityManager
    ) {
    }
    
    #[Route('/api/financas/listar-contas-modal', name: 'listar_contas_modal', methods: ['GET'])]
    public function __invoke(): JsonResponse
    {
        $user = $this->security->getUser();

        $contas = $this->entityManager->getRepository(Conta::class)->listarContasPorUsuario($user->getId());
        return new JsonResponse($contas, Response::HTTP_OK);
    }
}
