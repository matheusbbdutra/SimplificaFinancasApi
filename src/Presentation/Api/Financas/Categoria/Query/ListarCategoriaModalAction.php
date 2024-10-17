<?php

namespace App\Presentation\Api\Financas\Categoria\Query;

use App\Domain\Financas\Entity\Categoria;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\SecurityBundle\Security;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ListarCategoriaModalAction
{
    public function __construct(
        private readonly Security $security, 
        private readonly EntityManagerInterface $entityManager 
    ) {
    }
    
    #[Route('/api/financas/listar-categoria-modal/{idTipoCategoria}', name: 'listar_categoria_modal', methods: ['GET'])]
    public function __invoke(int $idTipoCategoria)
    {
        $user = $this->security->getUser();
        $categorias = $this->entityManager->getRepository(Categoria::class)->findBy([
            'usuario' => $user, 'tipo' => $idTipoCategoria
        ]);
        
        return new JsonResponse($categorias, Response::HTTP_OK);
    }
}
