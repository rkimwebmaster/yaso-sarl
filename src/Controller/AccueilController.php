<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Entity\NewsLetter;
use App\Repository\ContactRepository;
use App\Repository\NewsLetterRepository;
use App\Repository\PageQSNRepository;
use App\Repository\TeamMemberRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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


    #[Route('/creationNewsLetter', name: 'app_creationNewsLetter', methods: 'GET')]
    public function creationNewsLetter(Request $request, NewsLetterRepository $newsLetterRepository): Response
    {

        $email = $request->get('email');
        // verifier doublon
        $check = $newsLetterRepository->findBy(['email' => $email]);
        if ($check) {
            $this->addFlash("info", "Merci vous êtes déja dans le système.");
            return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
        }
        $newsLetter = new NewsLetter();
        $newsLetter->setEmail($email);
        $newsLetterRepository->save($newsLetter, true);
        $this->addFlash("success", "Merci pour votre inscription à la newsletter, Vous recevrez desormais des belles infos.");
        return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
        // return $this->redirect();
    }

    
    #[Route('/indexContact', name: 'app_contact_index')]
    public function indexContact(): Response
    {
        return $this->render('accueil/contact.html.twig', [
        ]);
    }

    #[Route('/creationContact', name: 'app_creationContact', methods:['GET'])]
    public function creationContact(Request $request, ContactRepository $contactRepository): Response
    {
        $nom=$request->get('nom');
        $email=$request->get('email');
        $sujet=$request->get('sujet');
        $message=$request->get('message');
        $telephone=$request->get('telephone');
        $contact = new Contact($nom, $email, $telephone, $sujet, $message);
        $contactRepository->save($contact, true);

        // return $this->redirectToRoute('app_news_letter_index', [], Response::HTTP_SEE_OTHER);
        $this->addFlash("success", "Merci pour votre inscription.");
        return $this->redirectToRoute('app_accueil', [], Response::HTTP_SEE_OTHER);
    }
}
