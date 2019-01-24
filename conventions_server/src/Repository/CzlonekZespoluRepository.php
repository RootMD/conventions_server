<?php

namespace App\Repository;

use App\Entity\CzlonekZespolu;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method CzlonekZespolu|null find($id, $lockMode = null, $lockVersion = null)
 * @method CzlonekZespolu|null findOneBy(array $criteria, array $orderBy = null)
 * @method CzlonekZespolu[]    findAll()
 * @method CzlonekZespolu[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CzlonekZespoluRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, CzlonekZespolu::class);
    }

    // /**
    //  * @return CzlonekZespolu[] Returns an array of CzlonekZespolu objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CzlonekZespolu
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
