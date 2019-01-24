<?php

namespace App\Repository;

use App\Entity\Uczestnik;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Uczestnik|null find($id, $lockMode = null, $lockVersion = null)
 * @method Uczestnik|null findOneBy(array $criteria, array $orderBy = null)
 * @method Uczestnik[]    findAll()
 * @method Uczestnik[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UczestnikRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Uczestnik::class);
    }

    // /**
    //  * @return Uczestnik[] Returns an array of Uczestnik objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Uczestnik
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
