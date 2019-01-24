<?php
/**
 * Created by PhpStorm.
 * User: Michau
 * Date: 2019-01-23
 * Time: 23:35
 */

namespace App\Controller;

use App\Entity\Bilet;
use App\Entity\CzlonekZespolu;
use App\Entity\Gra;
use App\Entity\Konkurs;
use App\Entity\Konwent;
use App\Entity\Plan;
use App\Entity\Produkt;
use App\Entity\Stoisko;
use App\Entity\Uczestnik;
use App\Entity\Zespol;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PlanController extends AbstractFOSRestController
{

    /**
     * @Rest\Get("/plans/{id}")
     * @return View
     */
    public function getPlanAction($id): View
    {
//        $bilet = new Bilet();
//        $bilet->setCena(5)->setNazwa("normalny");
//        $uczestnik = new Uczestnik();
//        $uczestnik->setBilet($bilet)->setImie("Marek")->setNazwisko("Marecki")->setNick("michi");
//        $gra = new Gra();
//        $gra->setNazwa("Mortal Combat");
//        $konkurs = new Konkurs();
//        $konkurs->setData(new \DateTime())->setGra($gra)->setNagroda(50);
//        $uczestnik->setKonkurs($konkurs);
//        $konwent = new Konwent();
//        $konwent->setData(new \DateTime())->setNazwa("PGA")->setMiasto("Poznan")->setLokalizacja("Most Dworcowy");
//        $konkurs->setKonwent($konwent);
//        $plan=new Plan();
//        $plan->setCzasRozpoczecia(new \DateTime())->setCzasZakonczenia(new \DateTime())->setKonwent($konwent);
//        $czlonek = new CzlonekZespolu();
//        $stoisko = new Stoisko();
//        $produkt = new Produkt();
//        $zespol = new Zespol();
//        $czlonek->setImie("Ania")->setNazwisko("Anielska")->setStanowisko("Rakietowy")->setZespol($zespol);
//        $stoisko->setLokalizacja("Hangar B");
//        $produkt->setNazwa("Rakieta")->setCena(21)->setIlosc(42)->setStoisko($stoisko);
//        $zespol->setNazwa("Rakietnice")->setPlan($plan)->setStoisko($stoisko);
//
//        $em = $this->getDoctrine()->getManager();
//        $em->persist($gra);
//        $em->persist($konwent);
//        $em->persist($konkurs);
//        $em->persist($bilet);
//        $em->persist($uczestnik);
//        $em->persist($plan);
//        $em->persist($stoisko);
//        $em->persist($produkt);
//        $em->persist($zespol);
//        $em->persist($czlonek);
//        $em->flush();
//
        $repository = $this->getDoctrine()->getRepository(Plan::class);
        $plans = $repository->findBy(
            ['konwent' => $id]
        );
        return View::create($plans, Response::HTTP_OK);
    }


}