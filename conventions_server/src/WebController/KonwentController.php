<?php

namespace App\WebController;

use App\Entity\Konwent;
use App\Form\KonwentType;
use App\Repository\KonwentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/konwent")
 */
class KonwentController extends AbstractController
{
    /**
     * @Route("/", name="konwent_index", methods={"GET"})
     */
    public function index(KonwentRepository $konwentRepository): Response
    {
        return $this->render('konwent/index.html.twig', ['konwents' => $konwentRepository->findAll()]);
    }

    /**
     * @Route("/new", name="konwent_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $konwent = new Konwent();
        $form = $this->createForm(KonwentType::class, $konwent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($konwent);
            $entityManager->flush();

            return $this->redirectToRoute('konwent_index');
        }

        return $this->render('konwent/new.html.twig', [
            'konwent' => $konwent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="konwent_show", methods={"GET"})
     */
    public function show(Konwent $konwent): Response
    {
        return $this->render('konwent/show.html.twig', ['konwent' => $konwent]);
    }

    /**
     * @Route("/{id}/edit", name="konwent_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Konwent $konwent): Response
    {
        $form = $this->createForm(KonwentType::class, $konwent);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('konwent_index', ['id' => $konwent->getId()]);
        }

        return $this->render('konwent/edit.html.twig', [
            'konwent' => $konwent,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="konwent_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Konwent $konwent): Response
    {
        if ($this->isCsrfTokenValid('delete'.$konwent->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($konwent);
            $entityManager->flush();
        }

        return $this->redirectToRoute('konwent_index');
    }
}
