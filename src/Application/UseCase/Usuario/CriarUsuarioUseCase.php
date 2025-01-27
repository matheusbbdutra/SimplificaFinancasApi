<?php

namespace App\Application\UseCase\Usuario;

use App\Application\DTO\InputDTO;
use App\Application\DTO\OutputDTO;
use App\Application\UseCase\UseCaseInterface;
use App\Domain\Usuario\Services\CriarUsuarioService;

class CriarUsuarioUseCase implements UseCaseInterface
{
    public function __construct(private readonly CriarUsuarioService $service)
    {
    }
    public function execute(InputDTO $dto): OutputDTO
    {
        try {
            $result = $this->service->criarUsuario($dto);

            return OutputDTO::success($result, "Usuário criado com sucesso.");
        } catch (\Exception $e) {
            return OutputDTO::failure($e->getMessage());
        }
    }
}