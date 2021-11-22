<?php

namespace App\Repository;

use App\Entity\Aurteurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Aurteurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Aurteurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Aurteurs[]    findAll()
 * @method Aurteurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AurteursRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Aurteurs::class);
    }

    // /**
    //  * @return Aurteurs[] Returns an array of Aurteurs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Aurteurs
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
