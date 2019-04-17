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


    /**
     * @return array
     *              return dataset as array
     */
    public function myfindAll()
    {
        return $this->getEntityManager()
            ->createQuery('SELECT l FROM App\Entity\LottoData l')
            ->getArrayResult();
    }


    /**
     * @return array
     *              return only sequence array
     */
    public function getOnlySequences()
    {

        $dataset = $this->myfindAll();

        foreach ($dataset as $value) {
            $data[$value['id']] = [
                0 => $value['gezogeneZahl1'],
                1 => $value['gezogeneZahl2'],
                2 => $value['gezogeneZahl3'],
                3 => $value['gezogeneZahl4'],
                4 => $value['gezogeneZahl5'],
                5 => $value['gezogeneZahl6'],
            ];
        }
        return $data;
    }

}
