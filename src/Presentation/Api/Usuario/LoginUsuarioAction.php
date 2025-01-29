<?php

namespace App\Presentation\Api\Usuario;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use OpenApi\Attributes as OA;

#[Route('/api/usuario/login', name: 'api_login', methods: ['POST'])]
#[OA\Post(
    path: "/api/usuario/login",
    description: "Autentica o usuário e retorna um token JWT para uso em requisições subsequentes.",
    summary: "Realiza login e retorna um token JWT",
    requestBody: new OA\RequestBody(
        required: true,
        content: new OA\JsonContent(
            required: ["email", "password"],
            properties: [
                new OA\Property(property: "email", type: "string", example: "usuario@email.com"),
                new OA\Property(property: "password", type: "string", example: "senha123"),
            ],
            type: "object"
        )
    ),
    responses: [
        new OA\Response(
            response: 200,
            description: "Login realizado com sucesso",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "token", type: "string", example: "eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9..."),
                ],
                type: "object"
            )
        ),
        new OA\Response(
            response: 401,
            description: "Credenciais inválidas",
            content: new OA\JsonContent(
                properties: [
                    new OA\Property(property: "message", type: "string", example: "Credenciais inválidas"),
                ],
                type: "object"
            )
        ),
    ]
)]
class LoginUsuarioAction
{
    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse([
            'status' => 'success',
            'message' => 'Login realizado com sucesso',
        ]);
    }
}