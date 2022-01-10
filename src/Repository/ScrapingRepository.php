<?php

namespace App\Repository;

use App\Entity\Scraping;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Scraping|null find($id, $lockMode = null, $lockVersion = null)
 * @method Scraping|null findOneBy(array $criteria, array $orderBy = null)
 * @method Scraping[]    findAll()
 * @method Scraping[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ScrapingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Scraping::class);
    }

    // /**
    //  * @return Scraping[] Returns an array of Scraping objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Scraping
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
