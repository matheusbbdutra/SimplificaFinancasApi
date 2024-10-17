<?php

namespace App\Infrastructure\Persistence\Financas\Repository;

use App\Domain\Financas\Entity\Carteira;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class CarteiraRepository extends ServiceEntityRepository
{
    public function __construct(private readonly ManagerRegistry $registry)
    {
        parent::__construct($registry, Carteira::class);
    }
}
