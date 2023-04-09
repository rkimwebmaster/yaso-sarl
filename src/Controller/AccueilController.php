<?php

namespace App\Controller;

use App\Repository\PageQSNRepository;
use App\Repository\TeamMemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AccueilController extends AbstractController
{
    #[Route('/', name: 'app_accueil')]
    public function index(): Response
    {
        return $this->render('accueil/index.html.twig', [
            'controller_name' => 'AccueilController',
        ]);
    }


    #[Route('/qsn', name: 'app_qsn')]
    public function qsn(PageQSNRepository $pageQSNRepository, TeamMemberRepository $teamMemberRepository): Response
    {
        $page=$pageQSNRepository->findOneBy([],['createdAt'=>'desc']);
        $teamMembers=$teamMemberRepository->findAll([],['createdAt'=>'desc']);
        return $this->render('accueil/page.html.twig', [
            'page'=>$page,
            'indice'=>'qsn',
            'teamMembers'=>$teamMembers,
            'titre'=> 'Qui sommes-nous ? ',

        ]);
    }
}
