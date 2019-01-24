<?php

namespace App\Repository;

use App\Entity\Zespol;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Zespol|null find($id, $lockMode = null, $lockVersion = null)
 * @method Zespol|null findOneBy(array $criteria, array $orderBy = null)
 * @method Zespol[]    findAll()
 * @method Zespol[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ZespolRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Zespol::class);
    }

    // /**
    //  * @return Zespol[] Returns an array of Zespol objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('z.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Zespol
    {
        return $this->createQueryBuilder('z')
            ->andWhere('z.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
