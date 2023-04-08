<?php

namespace App\Controller;

use App\Entity\Magazine;
use App\Form\MagazineType;
use App\Repository\MagazineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/magazine')]
class MagazineController extends AbstractController
{
    #[Route('/', name: 'app_magazine_index', methods: ['GET'])]
    public function index(MagazineRepository $magazineRepository): Response
    {
        return $this->render('magazine/index.html.twig', [
            'magazines' => $magazineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_magazine_new', methods: ['GET', 'POST'])]
    public function new(Request $request, MagazineRepository $magazineRepository): Response
    {
        $magazine = new Magazine();
        $form = $this->createForm(MagazineType::class, $magazine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $magazineRepository->save($magazine, true);

            return $this->redirectToRoute('app_magazine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('magazine/new.html.twig', [
            'magazine' => $magazine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_magazine_show', methods: ['GET'])]
    public function show(Magazine $magazine): Response
    {
        return $this->render('magazine/show.html.twig', [
            'magazine' => $magazine,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_magazine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Magazine $magazine, MagazineRepository $magazineRepository): Response
    {
        $form = $this->createForm(MagazineType::class, $magazine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $magazineRepository->save($magazine, true);

            return $this->redirectToRoute('app_magazine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('magazine/edit.html.twig', [
            'magazine' => $magazine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_magazine_delete', methods: ['POST'])]
    public function delete(Request $request, Magazine $magazine, MagazineRepository $magazineRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$magazine->getId(), $request->request->get('_token'))) {
            $magazineRepository->remove($magazine, true);
        }

        return $this->redirectToRoute('app_magazine_index', [], Response::HTTP_SEE_OTHER);
    }
}
