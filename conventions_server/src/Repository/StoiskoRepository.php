<?php

namespace App\Repository;

use App\Entity\Stoisko;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Stoisko|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stoisko|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stoisko[]    findAll()
 * @method Stoisko[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StoiskoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Stoisko::class);
    }

    // /**
    //  * @return Stoisko[] Returns an array of Stoisko objects
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
    public function findOneBySomeField($value): ?Stoisko
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
