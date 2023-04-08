<?php

namespace App\Controller;

use App\Entity\CategorieService;
use App\Form\CategorieServiceType;
use App\Repository\CategorieServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/categorie/service')]
class CategorieServiceController extends AbstractController
{
    #[Route('/', name: 'app_categorie_service_index', methods: ['GET'])]
    public function index(CategorieServiceRepository $categorieServiceRepository): Response
    {
        return $this->render('categorie_service/index.html.twig', [
            'categorie_services' => $categorieServiceRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_categorie_service_new', methods: ['GET', 'POST'])]
    public function new(Request $request, CategorieServiceRepository $categorieServiceRepository): Response
    {
        $categorieService = new CategorieService();
        $form = $this->createForm(CategorieServiceType::class, $categorieService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieServiceRepository->save($categorieService, true);

            return $this->redirectToRoute('app_categorie_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_service/new.html.twig', [
            'categorie_service' => $categorieService,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_service_show', methods: ['GET'])]
    public function show(CategorieService $categorieService): Response
    {
        return $this->render('categorie_service/show.html.twig', [
            'categorie_service' => $categorieService,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_categorie_service_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CategorieService $categorieService, CategorieServiceRepository $categorieServiceRepository): Response
    {
        $form = $this->createForm(CategorieServiceType::class, $categorieService);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $categorieServiceRepository->save($categorieService, true);

            return $this->redirectToRoute('app_categorie_service_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('categorie_service/edit.html.twig', [
            'categorie_service' => $categorieService,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_categorie_service_delete', methods: ['POST'])]
    public function delete(Request $request, CategorieService $categorieService, CategorieServiceRepository $categorieServiceRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$categorieService->getId(), $request->request->get('_token'))) {
            $categorieServiceRepository->remove($categorieService, true);
        }

        return $this->redirectToRoute('app_categorie_service_index', [], Response::HTTP_SEE_OTHER);
    }
}
