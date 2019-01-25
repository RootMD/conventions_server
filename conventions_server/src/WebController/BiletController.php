<?php

namespace App\WebController;

use App\Entity\Bilet;
use App\Form\BiletType;
use App\Repository\BiletRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/bilet")
 */
class BiletController extends AbstractController
{
    /**
     * @Route("/", name="bilet_index", methods={"GET"})
     */
    public function index(BiletRepository $biletRepository): Response
    {
        return $this->render('bilet/index.html.twig', ['bilets' => $biletRepository->findAll()]);
    }

    /**
     * @Route("/new", name="bilet_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $bilet = new Bilet();
        $form = $this->createForm(BiletType::class, $bilet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($bilet);
            $entityManager->flush();

            return $this->redirectToRoute('bilet_index');
        }

        return $this->render('bilet/new.html.twig', [
            'bilet' => $bilet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bilet_show", methods={"GET"})
     */
    public function show(Bilet $bilet): Response
    {
        return $this->render('bilet/show.html.twig', ['bilet' => $bilet]);
    }

    /**
     * @Route("/{id}/edit", name="bilet_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Bilet $bilet): Response
    {
        $form = $this->createForm(BiletType::class, $bilet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('bilet_index', ['id' => $bilet->getId()]);
        }

        return $this->render('bilet/edit.html.twig', [
            'bilet' => $bilet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="bilet_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Bilet $bilet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bilet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($bilet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('bilet_index');
    }
}
