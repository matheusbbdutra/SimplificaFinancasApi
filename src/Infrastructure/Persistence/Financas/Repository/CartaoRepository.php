<?php

namespace App\Infrastructure\Persistence\Financas\Repository;


use App\Domain\Financas\Entity\Cartao;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CartaoRepository extends ServiceEntityRepository
{
    public function __construct(private readonly ManagerRegistry $registry)
    {
        parent::__construct($registry, Cartao::class);
    }
}
