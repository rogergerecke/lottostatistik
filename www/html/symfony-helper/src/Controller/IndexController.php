<?php
// src/Controller/IndexController.php
namespace App\Controller;

use App\Entity\LottoData;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class IndexController extends AbstractController
{
    public function index()
    {
        $number = random_int(0, 100);
 $em = new LottoData();
 $em = $em->findAll();
print_r($em);
        return new Response(
            '<html><body>Lucky number: '.$number.'</body></html>'
        );
    }
}