<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-24
 * Time: 14:59
 */

namespace App\Controller;
use App\Entity\Uczestnik;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;


class UczestnikController extends AbstractFOSRestController
{
    /**
     * @Rest\Get("/uczestnik/{id}")
     * @param $id
     * @return View
     */
    public function getUczestnikAction($id): View
    {
        $repository = $this->getDoctrine()->getRepository(Uczestnik::class);
        $uczestnik = $repository->findBy(
            ['konkurs' => $id]
        );

        return View::create($uczestnik, Response::HTTP_OK);

    }
}