<?php

namespace App\WebController;

use App\Entity\Stoisko;
use App\Form\StoiskoType;
use App\Repository\StoiskoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/stoisko")
 */
class StoiskoController extends AbstractController
{
    /**
     * @Route("/", name="stoisko_index", methods={"GET"})
     */
    public function index(StoiskoRepository $stoiskoRepository): Response
    {
        return $this->render('stoisko/index.html.twig', ['stoiskos' => $stoiskoRepository->findAll()]);
    }

    /**
     * @Route("/new", name="stoisko_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $stoisko = new Stoisko();
        $form = $this->createForm(StoiskoType::class, $stoisko);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($stoisko);
            $entityManager->flush();

            return $this->redirectToRoute('stoisko_index');
        }

        return $this->render('stoisko/new.html.twig', [
            'stoisko' => $stoisko,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stoisko_show", methods={"GET"})
     */
    public function show(Stoisko $stoisko): Response
    {
        return $this->render('stoisko/show.html.twig', ['stoisko' => $stoisko]);
    }

    /**
     * @Route("/{id}/edit", name="stoisko_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Stoisko $stoisko): Response
    {
        $form = $this->createForm(StoiskoType::class, $stoisko);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stoisko_index', ['id' => $stoisko->getId()]);
        }

        return $this->render('stoisko/edit.html.twig', [
            'stoisko' => $stoisko,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="stoisko_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Stoisko $stoisko): Response
    {
        if ($this->isCsrfTokenValid('delete'.$stoisko->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($stoisko);
            $entityManager->flush();
        }

        return $this->redirectToRoute('stoisko_index');
    }
}
