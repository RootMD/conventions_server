<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-24
 * Time: 15:00
 */

namespace App\Controller;
use App\Entity\Zespol;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;


class ZespolController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/zespol/{id}")
     * @param $id
     * @return View
     */
    public function getZespolAction($id): View
    {
        $repository = $this->getDoctrine()->getRepository(Zespol::class);
        $zespol = $repository->findBy(
            ['plan' => $id]
        );

        return View::create($zespol, Response::HTTP_OK);

    }
}