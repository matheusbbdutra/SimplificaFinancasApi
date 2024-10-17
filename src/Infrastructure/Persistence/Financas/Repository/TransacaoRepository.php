<?php

namespace App\Infrastructure\Persistence\Financas\Repository;

use App\Domain\Financas\Entity\Transacao;
use App\Domain\Financas\Repository\TransacaoRepositoryInterface;
use Doctrine\ORM\EntityManagerInterface;

class TransacaoRepository implements TransacaoRepositoryInterface
{
    public function __construct(private readonly EntityManagerInterface $entityManager)
    {
    }
    
    public function criarTransacao(Transacao $transacao): void
    {
        // TODO: Implement criarTransacao() method.
    }
}
