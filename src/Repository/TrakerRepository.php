<?php

namespace App\Repository;

use App\Entity\Tracker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Tracker|null find($id, $lockMode = null, $lockVersion = null)
 * @method Tracker|null findOneBy(array $criteria, array $orderBy = null)
 * @method Tracker[]    findAll()
 * @method Tracker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrakerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tracker::class);
    }

//    /**
//     * @return Traker[] Returns an array of Traker objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Traker
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
