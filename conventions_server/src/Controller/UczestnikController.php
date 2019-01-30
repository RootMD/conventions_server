<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-29
 * Time: 23:28
 */

namespace App\Controller;


use App\Entity\Konkurs;
use App\Entity\Uczestnik;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
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
        $uczestniks = $repository->findBy(
            ['konkurs' => $id]
        );

        return View::create($uczestniks, Response::HTTP_OK);

    }

    /**
     * @Rest\Post("/uczestnik/add")
     */
    public function postUczestnikAction(Request $request): View
    {
        $uczestnik = new Uczestnik();
        $uczestnik->setNazwisko($request->request->get('nazwisko'));
        $uczestnik->setImie($request->request->get('imie'));
        $uczestnik->setNick($request->request->get('nick'));
        $uczestnik->setEmail($request->request->get('email'));
        $repo = $this->getDoctrine()->getRepository(Konkurs::class)->findOneBy(['id'=>$request->request->get('konkurs')]);
        $uczestnik->setKonkurs($repo);
        $entityManager = $this->getDoctrine()->getManager();
        $entityManager->persist($uczestnik);
        $entityManager->flush();

        return View::create($uczestnik, Response::HTTP_OK);
    }
}