<?php

namespace App\Domain\Financas\Repository;

use App\Domain\Financas\Entity\Transacao;

interface TransacaoRepositoryInterface
{
    public function criarTransacao(Transacao $transacaoDTO): void;
}
