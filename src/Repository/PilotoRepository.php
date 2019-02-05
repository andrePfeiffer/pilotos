<?php

namespace App\Repository;

use App\Entity\Piloto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Piloto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Piloto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Piloto[]    findAll()
 * @method Piloto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PilotoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Piloto::class);
    }

     /**
      * @return Piloto[] Returns an array of Piloto objects
      */
    public function verTodos()
    {
        return $this->createQueryBuilder('p')
//            ->andWhere('p.exampleField = :val')
//            ->setParameter('val', $value)
            ->orderBy('p.nome', 'ASC')
//            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

    /*
    public function findOneBySomeField($value): ?Piloto
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
