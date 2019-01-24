<?php

namespace App\Repository;

use App\Entity\Konkurs;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Konkurs|null find($id, $lockMode = null, $lockVersion = null)
 * @method Konkurs|null findOneBy(array $criteria, array $orderBy = null)
 * @method Konkurs[]    findAll()
 * @method Konkurs[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KonkursRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Konkurs::class);
    }

    // /**
    //  * @return Konkurs[] Returns an array of Konkurs objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Konkurs
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
