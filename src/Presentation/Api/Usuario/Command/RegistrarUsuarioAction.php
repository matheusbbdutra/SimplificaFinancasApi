<?php

namespace App\Presentation\Api\Usuario\Command;

use App\Application\DTO\Usuario\UsuarioDTO;
use App\Domain\Usuario\Services\CriarUsuarioService;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Serializer\SerializerInterface;

class RegistrarUsuarioAction
{
    public function __construct(
        private readonly SerializerInterface $serializer, 
        private readonly CriarUsuarioService $service,
        private readonly JWTTokenManagerInterface $jwtManager,
        private readonly UserProviderInterface $userProvider
    ) {
    }

    #[Route('/api/usuario/registrar', name: 'registrar_usuario', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        try {
            $data = $request->getContent();
            $usuarioDTO = $this->serializer->deserialize($data, UsuarioDTO::class, 'json');
            $resultado = $this->service->criarUsuario($usuarioDTO);
            $user = $this->userProvider->loadUserByIdentifier($usuarioDTO->getEmail());
            $token = $this->jwtManager->create($user);
            
            return new JsonResponse(['message' => $resultado, 'token' => $token], Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        }
    }
}
