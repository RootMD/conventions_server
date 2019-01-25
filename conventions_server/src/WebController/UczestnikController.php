<?php

namespace App\WebController;

use App\Entity\Uczestnik;
use App\Form\UczestnikType;
use App\Repository\UczestnikRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/uczestnik")
 */
class UczestnikController extends AbstractController
{
    /**
     * @Route("/", name="uczestnik_index", methods={"GET"})
     */
    public function index(UczestnikRepository $uczestnikRepository): Response
    {
        return $this->render('uczestnik/index.html.twig', ['uczestniks' => $uczestnikRepository->findAll()]);
    }

    /**
     * @Route("/new", name="uczestnik_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $uczestnik = new Uczestnik();
        $form = $this->createForm(UczestnikType::class, $uczestnik);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($uczestnik);
            $entityManager->flush();

            return $this->redirectToRoute('uczestnik_index');
        }

        return $this->render('uczestnik/new.html.twig', [
            'uczestnik' => $uczestnik,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="uczestnik_show", methods={"GET"})
     */
    public function show(Uczestnik $uczestnik): Response
    {
        return $this->render('uczestnik/show.html.twig', ['uczestnik' => $uczestnik]);
    }

    /**
     * @Route("/{id}/edit", name="uczestnik_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Uczestnik $uczestnik): Response
    {
        $form = $this->createForm(UczestnikType::class, $uczestnik);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('uczestnik_index', ['id' => $uczestnik->getId()]);
        }

        return $this->render('uczestnik/edit.html.twig', [
            'uczestnik' => $uczestnik,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="uczestnik_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Uczestnik $uczestnik): Response
    {
        if ($this->isCsrfTokenValid('delete'.$uczestnik->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($uczestnik);
            $entityManager->flush();
        }

        return $this->redirectToRoute('uczestnik_index');
    }
}
