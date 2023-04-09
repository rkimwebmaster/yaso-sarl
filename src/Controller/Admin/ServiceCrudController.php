<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Service::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre')->setColumns(6)->setLabel("Nom du service "),
            TextField::new('description')->setColumns(6)->setLabel("Description"),
            TextEditorField::new('contenu')->setColumns(6)->setLabel("Contenu "),
            ImageField::new('photo1024x768')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(6)->setLabel("Image de la page du service ")->setHelp("Avec une taille photo1024x768 et le plus léger possible"),
            ImageField::new('photo800x600Un')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(6)->setLabel("Image de la page du service ")->setHelp("Avec une taille photo800x600Un et le plus léger possible"),
            ImageField::new('photo800x600Deux')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(6)->setLabel("Image de la page du service ")->setHelp("Avec une taille photo800x600Un et le plus léger possible"),
            ImageField::new('photo800x600Trois')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(6)->setLabel("Image de la page du service ")->setHelp("Avec une taille photo800x600Un et le plus léger possible"),
        ];
    }
    
}
