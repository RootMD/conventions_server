<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-24
 * Time: 14:57
 */

namespace App\Controller;
use App\Entity\Stoisko;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;


class StoiskoController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/stoisko/{id}")
     * @param $id
     * @return View
     */
    public function getStoiskoAction($id): View
    {
        $repository = $this->getDoctrine()->getRepository(Stoisko::class);
        $stoisko = $repository->findBy(
            ['zespol' => $id]
        );

        return View::create($stoisko, Response::HTTP_OK);

    }
}