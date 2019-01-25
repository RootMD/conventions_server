<?php

namespace App\WebController;

use App\Entity\Konkurs;
use App\Form\KonkursType;
use App\Repository\KonkursRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/konkurs")
 */
class KonkursController extends AbstractController
{
    /**
     * @Route("/", name="konkurs_index", methods={"GET"})
     */
    public function index(KonkursRepository $konkursRepository): Response
    {
        return $this->render('konkurs/index.html.twig', ['konkurs' => $konkursRepository->findAll()]);
    }

    /**
     * @Route("/new", name="konkurs_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $konkur = new Konkurs();
        $form = $this->createForm(KonkursType::class, $konkur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($konkur);
            $entityManager->flush();

            return $this->redirectToRoute('konkurs_index');
        }

        return $this->render('konkurs/new.html.twig', [
            'konkur' => $konkur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="konkurs_show", methods={"GET"})
     */
    public function show(Konkurs $konkur): Response
    {
        return $this->render('konkurs/show.html.twig', ['konkur' => $konkur]);
    }

    /**
     * @Route("/{id}/edit", name="konkurs_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Konkurs $konkur): Response
    {
        $form = $this->createForm(KonkursType::class, $konkur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('konkurs_index', ['id' => $konkur->getId()]);
        }

        return $this->render('konkurs/edit.html.twig', [
            'konkur' => $konkur,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="konkurs_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Konkurs $konkur): Response
    {
        if ($this->isCsrfTokenValid('delete'.$konkur->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($konkur);
            $entityManager->flush();
        }

        return $this->redirectToRoute('konkurs_index');
    }
}
