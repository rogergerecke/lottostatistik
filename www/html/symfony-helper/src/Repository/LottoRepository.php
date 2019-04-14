<?php

namespace App\Repository;

use App\Entity\Lotto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Lotto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Lotto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Lotto[]    findAll()
 * @method Lotto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LottoRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Lotto::class);
    }

    // /**
    //  * @return Lotto[] Returns an array of Lotto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Lotto
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
