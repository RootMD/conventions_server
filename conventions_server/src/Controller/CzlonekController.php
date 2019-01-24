<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-24
 * Time: 14:52
 */

namespace App\Controller;
use App\Entity\CzlonekZespolu;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;


class CzlonekController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/czlonek/{id}")
     * @param $id
     * @return View
     */
    public function getCzlonekAction($id): View
    {
        $repository = $this->getDoctrine()->getRepository(CzlonekZespolu::class);
        $czlonkowie = $repository->findBy(
            ['zespol' => $id]
        );

        return View::create($czlonkowie, Response::HTTP_OK);

    }
}