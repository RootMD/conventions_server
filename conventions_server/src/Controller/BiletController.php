<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-24
 * Time: 14:50
 */

namespace App\Controller;


use App\Entity\Bilet;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;


class BiletController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/bilety/{id}")
     * @param $id
     * @return View
     */
    public function getBiletyAction($id): View
    {
        $repository = $this->getDoctrine()->getRepository(Bilet::class);
        $bilety = $repository->findBy(
            ['uczestnik' => $id]
        );

        return View::create($bilety, Response::HTTP_OK);

    }
}