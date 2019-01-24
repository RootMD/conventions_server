<?php

namespace App\Repository;

use App\Entity\Bilet;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Bilet|null find($id, $lockMode = null, $lockVersion = null)
 * @method Bilet|null findOneBy(array $criteria, array $orderBy = null)
 * @method Bilet[]    findAll()
 * @method Bilet[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BiletRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Bilet::class);
    }

    // /**
    //  * @return Bilet[] Returns an array of Bilet objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Bilet
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
