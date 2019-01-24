<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-23
 * Time: 18:17
 */

namespace App\Controller;


use App\Entity\Konwent;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class KonwentController extends AbstractFOSRestController
{

    /**
     * @Rest\Get("/konwents")
     */
    public function getKonwentsAction(): View
    {
        $repository = $this->getDoctrine()->getRepository(Konwent::class);
        $konwents = $repository->findAll();

        return View::create($konwents, Response::HTTP_OK);

    }


}