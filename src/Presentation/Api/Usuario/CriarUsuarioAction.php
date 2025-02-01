<?php

namespace App\Presentation\Api\Usuario;

use App\Application\DTO\Usuario\UsuarioDTO;
use App\Application\UseCase\Usuario\CriarUsuarioUseCase;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use OpenApi\Attributes as OA;

#[Route('/api/usuario/registrar', name: 'registrar_usuario', methods: ['POST'])]
#[OA\Post(
    path: "/api/usuario/registrar",
    description: "Cria um novo usuário com base nos dados fornecidos",
    summary: "Registrar um novo usuário",
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ["nome", "email", "senha"],
            properties: [
                new OA\Property(property: "nome", type: "string", example: "João da Silva"),
                new OA\Property(property: "email", type: "string", example: "joao@email.com"),
                new OA\Property(property: "senha", type: "string", example: "123456"),
            ],
            type: "object"
        )
    ),
    responses: [
        new OA\Response(
            response: 201,
            description: "Usuário criado com sucesso",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "status", type: "string", example: "success"),
                    new OA\Property(property: "data", properties: [
                        new OA\Property(property: "message", type: "string", example: "Usuário criado com sucesso"),
                    ], type: "object"),
                ],
                type: "object"
            )
        ),
        new OA\Response(
            response: 400,
            description: "Erro de validação",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "status", type: "string", example: "error"),
                    new OA\Property(property: "data", properties: [
                        new OA\Property(property: "message", type: "string", example: "Dados inválidos fornecidos"),
                    ], type: "object"),
                ],
                type: "object"
            )
        ),
        new OA\Response(
            response: 500,
            description: "Erro interno",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "status", type: "string", example: "error"),
                    new OA\Property(property: "data", properties: [
                        new OA\Property(property: "message", type: "string", example: "Erro interno ao criar o usuário"),
                    ], type: "object"),
                ],
                type: "object"
            )
        ),
    ]
)]
readonly class CriarUsuarioAction
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface  $validator,
        private CriarUsuarioUseCase $useCase
    ) {
    }

    public function __invoke(Request $request): Response
    {
        try {
            $data = $request->getContent();
            $dto = $this->serializer->deserialize($data, UsuarioDTO::class, 'json');
            $error = $this->validator->validate($dto);

            if (count($error) > 0) {
                $errors = [];
                foreach ($error as $violation) {
                    $errors[] = [
                        'field' => $violation->getPropertyPath(),
                        'message' => $violation->getMessage(),
                    ];
                }
                return new JsonResponse(['status' => 'error', 'errors' => $errors], Response::HTTP_BAD_REQUEST);
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
