<?php

namespace App\Repository;

use App\Entity\LottoData;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method LottoData|null find($id, $lockMode = null, $lockVersion = null)
 * @method LottoData|null findOneBy(array $criteria, array $orderBy = null)
 * @method LottoData[]    findAll()
 * @method LottoData[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LottoDataRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, LottoData::class);
    }

    // /**
    //  * @return LottoData[] Returns an array of LottoData objects
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
    public function findOneBySomeField($value): ?LottoData
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
