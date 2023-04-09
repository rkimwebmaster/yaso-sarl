<?php

namespace App\EventSubscriber;

use App\Repository\CategorieRepository;
use App\Repository\EntrepriseRepository;
use App\Repository\FAQRepository;
use App\Repository\MagazineRepository;
use App\Repository\PartenaireRepository;
use App\Repository\ProduitRepository;
use App\Repository\ServiceRepository;
use App\Repository\TemoignageRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Twig\Environment;

class TwigEventSubscriber implements EventSubscriberInterface
{
    
    public function __construct(
        private Environment $twig,
        private PartenaireRepository $partenaireRepository,
        private EntrepriseRepository $entrepriseRepository, 
        private ServiceRepository $serviceRepository, 
        private FAQRepository $faqRepository, 
        private TemoignageRepository $temoignageRepository, 
        private MagazineRepository $magazineRepository, )
    {
        
    }
    public function onKernelController(ControllerEvent $event)
    {
        $this->twig->addGlobal('entreprise', $this->entrepriseRepository->findOneBy([]));
        $this->twig->addGlobal('services', $this->serviceRepository->findAll([]));
        $this->twig->addGlobal('magazines', $this->magazineRepository->findAll([]));
        $this->twig->addGlobal('partenaires', $this->partenaireRepository->findAll([]));
        $this->twig->addGlobal('temoignages', $this->temoignageRepository->findAll([]));
        $this->twig->addGlobal('faqs', $this->faqRepository->findAll([]));
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
