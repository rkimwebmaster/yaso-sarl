<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestonsController extends AbstractController
{
    #[Route('/testons', name: 'app_testons')]
    public function index(): Response
    {
        return $this->render('testons/index.html.twig', [
            'controller_name' => 'TestonsController',
        ]);
    }
}
