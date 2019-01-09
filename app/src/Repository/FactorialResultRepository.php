<?php

namespace App\Repository;

use App\Entity\FactorialResult;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method FactorialResult|null find($id, $lockMode = null, $lockVersion = null)
 * @method FactorialResult|null findOneBy(array $criteria, array $orderBy = null)
 * @method FactorialResult[]    findAll()
 * @method FactorialResult[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FactorialResultRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, FactorialResult::class);
    }

//    /**
//     * @return FactorialResult[] Returns an array of FactorialResult objects
//     */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FactorialResult
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
