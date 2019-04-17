<?php
/**
 * Created by PhpStorm.
 * User: harz
 * Date: 25.12.18
 * Time: 21:46
 */

namespace App\Lotto\Algoritmo;

use App\Repository\LottoDataRepository;
use Symfony\Component\Config\Definition\Exception\Exception;

class HowManyAlgoritmo
{

    private $data;
    private $repository;


    // Inject LottoDataRepository for query the Daterbase with Doctrine
    public function __construct(LottoDataRepository $repository)
    {
        // $repository object
        $this->repository = $repository;

        // the working dataset from db as array
        $this->data = $this->repository->myfindAll();
    }



    // wie oft wurde eine Zahl gezogen : how many n its come
    // check given n in long array(sixnumbers) or in short array(townumbers)
    public function counterHowMany($n)
    {


        $counter = 0;

        // count given n is in array
        foreach ($this->data as $group) {

            foreach ($group as $item) {
                if ($item == $n) {
                    $counter++;
                }
            }
        }

        return $counter;
    }

    public function howManyBetweenNtoNextN($n){


    }

    public function counterBetween($n,$align){

    }
}
