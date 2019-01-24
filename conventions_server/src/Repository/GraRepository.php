<?php

namespace App\Repository;

use App\Entity\Gra;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Gra|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gra|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gra[]    findAll()
 * @method Gra[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GraRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Gra::class);
    }

    // /**
    //  * @return Gra[] Returns an array of Gra objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Gra
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
