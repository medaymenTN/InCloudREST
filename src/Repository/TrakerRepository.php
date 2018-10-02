<?php

namespace App\Repository;

use App\Entity\Traker;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Traker|null find($id, $lockMode = null, $lockVersion = null)
 * @method Traker|null findOneBy(array $criteria, array $orderBy = null)
 * @method Traker[]    findAll()
 * @method Traker[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TrakerRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Traker::class);
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
