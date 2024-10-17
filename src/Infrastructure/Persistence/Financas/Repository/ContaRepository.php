<?php

namespace App\Infrastructure\Persistence\Financas\Repository;

use App\Domain\Financas\Entity\Carteira;
use App\Domain\Financas\Entity\Conta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ContaRepository extends ServiceEntityRepository
{
    public function __construct(private readonly ManagerRegistry $registry)
    {
        parent::__construct($registry, Conta::class);
    }
    
    public function listarContasPorUsuario(int $idUsuario): array
    {
        return $this->createQueryBuilder('c')
            ->select('c.id', 'c.descricao')
            ->join(Carteira::class, 'ca', 'WITH', 'c.carteira = ca.id')
            ->where('ca.usuario = :idUsuario')
            ->setParameter('idUsuario', $idUsuario)
            ->getQuery()
            ->getResult();
    }
}
