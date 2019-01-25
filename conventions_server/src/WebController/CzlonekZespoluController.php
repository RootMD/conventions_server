<?php

namespace App\WebController;

use App\Entity\CzlonekZespolu;
use App\Form\CzlonekZespoluType;
use App\Repository\CzlonekZespoluRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/czlonek/zespolu")
 */
class CzlonekZespoluController extends AbstractController
{
    /**
     * @Route("/", name="czlonek_zespolu_index", methods={"GET"})
     */
    public function index(CzlonekZespoluRepository $czlonekZespoluRepository): Response
    {
        return $this->render('czlonek_zespolu/index.html.twig', ['czlonek_zespolus' => $czlonekZespoluRepository->findAll()]);
    }

    /**
     * @Route("/new", name="czlonek_zespolu_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $czlonekZespolu = new CzlonekZespolu();
        $form = $this->createForm(CzlonekZespoluType::class, $czlonekZespolu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($czlonekZespolu);
            $entityManager->flush();

            return $this->redirectToRoute('czlonek_zespolu_index');
        }

        return $this->render('czlonek_zespolu/new.html.twig', [
            'czlonek_zespolu' => $czlonekZespolu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="czlonek_zespolu_show", methods={"GET"})
     */
    public function show(CzlonekZespolu $czlonekZespolu): Response
    {
        return $this->render('czlonek_zespolu/show.html.twig', ['czlonek_zespolu' => $czlonekZespolu]);
    }

    /**
     * @Route("/{id}/edit", name="czlonek_zespolu_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, CzlonekZespolu $czlonekZespolu): Response
    {
        $form = $this->createForm(CzlonekZespoluType::class, $czlonekZespolu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('czlonek_zespolu_index', ['id' => $czlonekZespolu->getId()]);
        }

        return $this->render('czlonek_zespolu/edit.html.twig', [
            'czlonek_zespolu' => $czlonekZespolu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="czlonek_zespolu_delete", methods={"DELETE"})
     */
    public function delete(Request $request, CzlonekZespolu $czlonekZespolu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$czlonekZespolu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($czlonekZespolu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('czlonek_zespolu_index');
    }
}
