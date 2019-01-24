<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-24
 * Time: 14:54
 */

namespace App\Controller;
use App\Entity\Konkurs;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;


class KonkursController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/konkurs/{id}")
     * @param $id
     * @return View
     */
    public function getKonkursAction($id): View
    {
        $repository = $this->getDoctrine()->getRepository(Konkurs::class);
        $konkurs = $repository->findBy(
            ['konwent' => $id]
        );

        return View::create($konkurs, Response::HTTP_OK);

    }
}