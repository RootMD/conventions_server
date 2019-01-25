<?php

namespace App\WebController;

use App\Entity\Produkt;
use App\Form\ProduktType;
use App\Repository\ProduktRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/produkt")
 */
class ProduktController extends AbstractController
{
    /**
     * @Route("/", name="produkt_index", methods={"GET"})
     */
    public function index(ProduktRepository $produktRepository): Response
    {
        return $this->render('produkt/index.html.twig', ['produkts' => $produktRepository->findAll()]);
    }

    /**
     * @Route("/new", name="produkt_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $produkt = new Produkt();
        $form = $this->createForm(ProduktType::class, $produkt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($produkt);
            $entityManager->flush();

            return $this->redirectToRoute('produkt_index');
        }

        return $this->render('produkt/new.html.twig', [
            'produkt' => $produkt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produkt_show", methods={"GET"})
     */
    public function show(Produkt $produkt): Response
    {
        return $this->render('produkt/show.html.twig', ['produkt' => $produkt]);
    }

    /**
     * @Route("/{id}/edit", name="produkt_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Produkt $produkt): Response
    {
        $form = $this->createForm(ProduktType::class, $produkt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('produkt_index', ['id' => $produkt->getId()]);
        }

        return $this->render('produkt/edit.html.twig', [
            'produkt' => $produkt,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="produkt_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Produkt $produkt): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produkt->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($produkt);
            $entityManager->flush();
        }

        return $this->redirectToRoute('produkt_index');
    }
}
