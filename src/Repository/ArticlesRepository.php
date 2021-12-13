<?php

namespace App\Repository;

use App\Entity\Articles;
use App\Entity\Auteurs;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Articles|null find($id, $lockMode = null, $lockVersion = null)
 * @method Articles|null findOneBy(array $criteria, array $orderBy = null)
 * @method Articles[]    findAll()
 * @method Articles[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ArticlesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Articles::class);
    }

    // /**
    //  * @return Articles[] Retourne un tableau d'objets d'articles publiés mais sans les auteurs et Categories
    //  */
    
    public function findArticlesPubliés()
    {
        $qb = $this->createQueryBuilder('a');
        $qb
            ->select('a.id', 'a.title', 'a.date', 'a.resume', 'a.status')
            ->where('a.status =:status ')
            ->setParameter('status', '1')
            ->setMaxResults(5)
            ->orderBy('a.title', 'ASC');

        return $qb->getQuery()->getResult();
    }

    // /**
    //  * @return Articles[] Retourne un tableau d'objets d'articles publiés mais par Auteurs cette fois avec les
    //  */
    
    public function findPublishArticlesAuteurs()
    {
        $qb = $this->createQueryBuilder('a');
        $qb

            ->innerJoin('App\Entity\Auteurs',  'o', 'WITH', 'o = a.auteurs')
           // ->select('a.id', 'a.title', 'a.date', 'a.resume', 'a.status')
            ->where('a.status =:status ')
            ->setParameter('status', '1')
         //   ->setMaxResults(5)
            ->orderBy('a.title', 'ASC');
        return $qb->getQuery()->getResult();
    }
    
    // /**
    //  * @return Articles[] Retourne un tableau d'objets d'articles publiés par un seul Autuers
    //  */
        public function findPublishArticlesOneAuteurs()
    {
        $qb = $this->createQueryBuilder('a');
        $qb

            ->innerJoin('App\Entity\Auteurs',  'o', 'WITH', 'o = a.auteurs')
           // ->select('a.id', 'a.title', 'a.date', 'a.resume', 'a.status')
            ->where('a.status =:status ')
            ->setParameter('status', '1')
            ->andWhere('o.noms like :noms')
            ->setParameter('noms', 'Omega')
         //   ->setMaxResults(5)
            ->orderBy('a.title', 'ASC');
        return $qb->getQuery()->getResult();
    }
    

//Comment faire des jointures avec le QueryBuilder ?

// Depuis le repository d'Article
public function getArticleAvecCommentaires()
{
  $qb = $this->createQueryBuilder('a')
             ->leftJoin('a.commentaires', 'c')
             ->addSelect('c');
  return $qb->getQuery()
            ->getResult();
}


    // /**
    //  * @return Articles[] Returns an array of Articles objects
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
    public function findOneBySomeField($value): ?Articles
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
