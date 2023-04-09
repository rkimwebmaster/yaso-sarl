<?php

namespace App\Controller\Admin;

use App\Entity\Adresse;
use App\Entity\Entreprise;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CountryField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TelephoneField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;
use EasyCorp\Bundle\EasyAdminBundle\Form\Type\CodeEditorType;

class EntrepriseCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Entreprise::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nomEntreprise')->hideOnIndex()->setColumns(4),
            TextField::new('sigle')->setColumns(4),
            ImageField::new('logo')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(4),
            AssociationField::new('carouselUn')->renderAsEmbeddedForm(CarouselCrudController::class)->setColumns(12)->setLabel("Premier carousel"),
            AssociationField::new('carouselDeux')->renderAsEmbeddedForm(CarouselCrudController::class)->setColumns(12)->setLabel("Deuxieme carousel"),
            AssociationField::new('carouselTrois')->renderAsEmbeddedForm(CarouselCrudController::class)->setColumns(12)->setLabel("Troiisième carousel"),
            TextField::new('responsable')->hideOnIndex()->setColumns(3),
            TextField::new('slogan')->hideOnIndex()->setColumns(3),
            TelephoneField::new('phoneNumber')->setColumns(3)->setLabel("Numéro téléphone"),
            TextField::new('ville')->hideOnIndex()->setColumns(3),
            CountryField::new('pays')->setColumns(3),
            EmailField::new('email')->setColumns(3)->setLabel("Adresse email"),
            UrlField::new('website')->hideOnIndex()->setColumns(4)->setLabel("Site web"),
            TextField::new('whatsappNumber')->hideOnIndex()->setColumns(2)->setLabel("No Whatsapp"),
            TextField::new('facebook')->hideOnIndex()->setColumns(2),
            TextField::new('linkedIn')->hideOnIndex()->setColumns(2),
            TextField::new('twitter')->hideOnIndex()->setColumns(2),
            TextField::new('idnat')->hideOnIndex()->setColumns(3)->setLabel("ID. NAT."),
            TextField::new('rccm')->hideOnIndex()->setColumns(3)->setLabel("R.C.C.M"),
            TextField::new('adresse')->hideOnIndex()->setColumns(6)->setLabel("Adresse"),
            TextEditorField::new('description')->hideOnIndex()->setColumns(12),
            // AssociationField::new('adresse')->renderAsEmbeddedForm(AdresseCrudController::class),

        ];
    }
    
}
