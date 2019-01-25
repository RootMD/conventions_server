<?php

namespace App\WebController;

use App\Entity\Zespol;
use App\Form\ZespolType;
use App\Repository\ZespolRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/zespol")
 */
class ZespolController extends AbstractController
{
    /**
     * @Route("/", name="zespol_index", methods={"GET"})
     */
    public function index(ZespolRepository $zespolRepository): Response
    {
        return $this->render('zespol/index.html.twig', ['zespols' => $zespolRepository->findAll()]);
    }

    /**
     * @Route("/new", name="zespol_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $zespol = new Zespol();
        $form = $this->createForm(ZespolType::class, $zespol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($zespol);
            $entityManager->flush();

            return $this->redirectToRoute('zespol_index');
        }

        return $this->render('zespol/new.html.twig', [
            'zespol' => $zespol,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="zespol_show", methods={"GET"})
     */
    public function show(Zespol $zespol): Response
    {
        return $this->render('zespol/show.html.twig', ['zespol' => $zespol]);
    }

    /**
     * @Route("/{id}/edit", name="zespol_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Zespol $zespol): Response
    {
        $form = $this->createForm(ZespolType::class, $zespol);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('zespol_index', ['id' => $zespol->getId()]);
        }

        return $this->render('zespol/edit.html.twig', [
            'zespol' => $zespol,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="zespol_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Zespol $zespol): Response
    {
        if ($this->isCsrfTokenValid('delete'.$zespol->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($zespol);
            $entityManager->flush();
        }

        return $this->redirectToRoute('zespol_index');
    }
}
