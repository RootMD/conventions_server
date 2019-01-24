<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-24
 * Time: 14:53
 */

namespace App\Controller;
use App\Entity\Gra;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;


class GraController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/gra/{id}")
     * @param $id
     * @return View
     */
    public function getGraAction($id): View
    {
        $repository = $this->getDoctrine()->getRepository(Gra::class);
        $gra = $repository->findBy(
            ['konkursy' => $id]
        );

        return View::create($gra, Response::HTTP_OK);

    }
}