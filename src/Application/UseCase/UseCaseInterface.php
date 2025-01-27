<?php

namespace App\Application\UseCase;

use App\Application\DTO\InputDTO;
use App\Application\DTO\OutputDTO;

interface UseCaseInterface
{
    public function execute(InputDTO $dto): OutputDTO;
}