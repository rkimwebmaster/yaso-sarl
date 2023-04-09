<?php

namespace App\Controller\Admin;

use App\Entity\CategorieImageGallerie;
use App\Entity\CategorieMagazine;
use App\Entity\CategorieService;
use App\Entity\Commentaire;
use App\Entity\Contact;
use App\Entity\Entreprise;
use App\Entity\FAQ;
use App\Entity\ImageGallerie;
use App\Entity\Magazine;
use App\Entity\NewsLetter;
use App\Entity\PageQSN;
use App\Entity\Partenaire;
use App\Entity\Service;
use App\Entity\TeamMember;
use App\Entity\Temoignage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(): Response
    {
        // return parent::index();

        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        // $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        // return $this->redirect($adminUrlGenerator->setController(OneOfYourCrudController::class)->generateUrl());

        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        return $this->render('admin/my-dashboard.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Yaso Rdc');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToRoute('YASO SITE WEB', 'fas fa-home', 'app_accueil');
        yield MenuItem::subMenu('Entreprise')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Entreprise::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Entreprise::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Page Qui Sommes-nous')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', PageQSN::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', PageQSN::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Categorie images ')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', CategorieImageGallerie::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', CategorieImageGallerie::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Categorie magazines  ')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', CategorieMagazine::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', CategorieMagazine::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Categorie services   ')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', CategorieService::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', CategorieService::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Commentaires')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Commentaire::class)->setAction(Crud::PAGE_INDEX),

        ]);
        yield MenuItem::subMenu('Contact   ')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Contact::class)->setAction(Crud::PAGE_INDEX),

        ]);
        yield MenuItem::subMenu('FAQ   ')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', FAQ::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', FAQ::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Image gallerie')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', ImageGallerie::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', ImageGallerie::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Magazine   ')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Magazine::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Magazine::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Newsletter   ')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', NewsLetter::class)->setAction(Crud::PAGE_INDEX),
        ]);
        yield MenuItem::subMenu('Témoignage    ')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Temoignage::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Temoignage::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Partenaires ')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Partenaire::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Partenaire::class)->setAction(Crud::PAGE_NEW),

        ]);
        yield MenuItem::subMenu('Membres équipe dirigeante')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', TeamMember::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', TeamMember::class)->setAction(Crud::PAGE_NEW),

        ]);

        yield MenuItem::subMenu('Services')->setSubItems([
            MenuItem::linkToCrud('Liste ', 'fa fa-list-ul', Service::class)->setAction(Crud::PAGE_INDEX),
            MenuItem::linkToCrud('Nouveau', 'fa fa-plus-circle', Service::class)->setAction(Crud::PAGE_NEW),

        ]);
    }
}
