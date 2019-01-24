<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-23
 * Time: 23:35
 */

namespace App\Controller;

use App\Entity\Bilet;
use App\Entity\CzlonekZespolu;
use App\Entity\Gra;
use App\Entity\Konkurs;
use App\Entity\Konwent;
use App\Entity\Plan;
use App\Entity\Produkt;
use App\Entity\Stoisko;
use App\Entity\Uczestnik;
use App\Entity\Zespol;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PlanController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/plans/{id}")
     * @return View
     */
    public function getPlanAction($id): View
    {
        $repository = $this->getDoctrine()->getRepository(Plan::class);
        $plans = $repository->findBy(
            ['konwent' => $id]
        );
        return View::create($plans, Response::HTTP_OK);
    }
}