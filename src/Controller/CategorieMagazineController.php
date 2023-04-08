<?php

namespace App\Controller;

use App\Entity\CategorieMagazine;
use App\Form\CategorieMagazineType;
use App\Repository\CategorieMagazineRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie/magazine')]
class CategorieMagazineController extends AbstractController
{
    #[Route('/', name: 'app_categorie_magazine_index', methods: ['GET'])]
    public function index(CategorieMagazineRepository $categorieMagazineRepository): Response
    {
        return $this->render('categorie_magazine/index.html.twig', [
            'categorie_magazines' => $categorieMagazineRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categorie_magazine_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CategorieMagazineRepository $categorieMagazineRepository): Response
    {
        $categorieMagazine = new CategorieMagazine();
        $form = $this->createForm(CategorieMagazineType::class, $categorieMagazine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieMagazineRepository->save($categorieMagazine, true);

            return $this->redirectToRoute('app_categorie_magazine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_magazine/new.html.twig', [
            'categorie_magazine' => $categorieMagazine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_magazine_show', methods: ['GET'])]
    public function show(CategorieMagazine $categorieMagazine): Response
    {
        return $this->render('categorie_magazine/show.html.twig', [
            'categorie_magazine' => $categorieMagazine,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_categorie_magazine_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieMagazine $categorieMagazine, CategorieMagazineRepository $categorieMagazineRepository): Response
    {
        $form = $this->createForm(CategorieMagazineType::class, $categorieMagazine);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieMagazineRepository->save($categorieMagazine, true);

            return $this->redirectToRoute('app_categorie_magazine_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_magazine/edit.html.twig', [
            'categorie_magazine' => $categorieMagazine,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_magazine_delete', methods: ['POST'])]
    public function delete(Request $request, CategorieMagazine $categorieMagazine, CategorieMagazineRepository $categorieMagazineRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieMagazine->getId(), $request->request->get('_token'))) {
            $categorieMagazineRepository->remove($categorieMagazine, true);
        }

        return $this->redirectToRoute('app_categorie_magazine_index', [], Response::HTTP_SEE_OTHER);
    }
}
