<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-24
 * Time: 14:56
 */

namespace App\Controller;
use App\Entity\Produkt;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;


class ProduktController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/produkt/{id}")
     * @param $id
     * @return View
     */
    public function getProduktAction($id): View
    {
        $repository = $this->getDoctrine()->getRepository(Produkt::class);
        $produkt = $repository->findBy(
            ['stoisko' => $id]
        );

        return View::create($produkt, Response::HTTP_OK);

    }
}