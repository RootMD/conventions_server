<?php

namespace App\WebController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller{

/**
 * @Route("/")
 */
    public function homepage(){
       return  $this->render('homepage/show.html.twig',[]);
    }
}