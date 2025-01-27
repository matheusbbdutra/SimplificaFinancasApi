<?php

namespace App\Presentation\Api\Usuario;

use App\Application\DTO\Usuario\UsuarioDTO;
use App\Application\UseCase\Usuario\CriarUsuarioUseCase;
use App\Domain\Usuario\Services\CriarUsuarioService;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class CriarUsuarioAction
{
    public function __construct(
        private readonly SerializerInterface $serializer,
        private readonly ValidatorInterface $validator,
        private readonly CriarUsuarioUseCase $useCase
    ) {
    }

    #[Route('/api/usuario/registrar', name: 'registrar_usuario', methods: ['POST'])]
    public function __invoke(Request $request): Response
    {
        try {
            $data = $request->getContent();
            $dto = $this->serializer->deserialize($data, UsuarioDTO::class, 'json');
            $error = $this->validator->validate($dto);

            if (count($error) > 0) {
                return new JsonResponse(['message' => (string) $error], Response::HTTP_BAD_REQUEST);
            }

            $resultado = $this->useCase->execute($dto);

            if ($resultado->isSuccess()) {
                return new JsonResponse($resultado->getMessage(), Response::HTTP_CREATED);
            }
            
            return new JsonResponse(['error' => $resultado->getMessage()], Response::HTTP_BAD_REQUEST);
        } catch (\Exception $e) {
            return new JsonResponse(['message' => $e->getMessage()], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
