<?php

namespace App\WebController;

use App\Entity\Gra;
use App\Form\GraType;
use App\Repository\GraRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/gra")
 */
class GraController extends AbstractController
{
    /**
     * @Route("/", name="gra_index", methods={"GET"})
     */
    public function index(GraRepository $graRepository): Response
    {
        return $this->render('gra/index.html.twig', ['gras' => $graRepository->findAll()]);
    }

    /**
     * @Route("/new", name="gra_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $gra = new Gra();
        $form = $this->createForm(GraType::class, $gra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($gra);
            $entityManager->flush();

            return $this->redirectToRoute('gra_index');
        }

        return $this->render('gra/new.html.twig', [
            'gra' => $gra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gra_show", methods={"GET"})
     */
    public function show(Gra $gra): Response
    {
        return $this->render('gra/show.html.twig', ['gra' => $gra]);
    }

    /**
     * @Route("/{id}/edit", name="gra_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Gra $gra): Response
    {
        $form = $this->createForm(GraType::class, $gra);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('gra_index', ['id' => $gra->getId()]);
        }

        return $this->render('gra/edit.html.twig', [
            'gra' => $gra,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="gra_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Gra $gra): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gra->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($gra);
            $entityManager->flush();
        }

        return $this->redirectToRoute('gra_index');
    }
}
