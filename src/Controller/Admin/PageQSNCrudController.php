<?php

namespace App\Controller\Admin;

use App\Entity\PageQSN;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageQSNCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageQSN::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            ImageField::new('photo1024x768')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(12)->setLabel("Image au fomat photo1024x768")->setHelp("Le poids le plus léger possible, moins de 50 Ko"),
            ImageField::new('photo800x600Un')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(12)->setLabel("Image au fomat photo1024x768")->setHelp("Le poids le plus léger possible, moins de 50 Ko"),
            ImageField::new('photo800x600Deux')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(12)->setLabel("Image au fomat photo1024x768")->setHelp("Le poids le plus léger possible, moins de 50 Ko"),
            ImageField::new('photo800x600Trois')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(12)->setLabel("Image au fomat photo1024x768")->setHelp("Le poids le plus léger possible, moins de 50 Ko"),
            TextField::new('titre')->setColumns(12),
            TextEditorField::new('contenu')->setColumns(12),
            DateTimeField::new('createdAt')->hideOnForm(),
            DateTimeField::new('updatedAt')->hideOnForm(),
        ];
    }

}
