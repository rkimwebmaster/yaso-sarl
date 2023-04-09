<?php

namespace App\Controller\Admin;

use App\Entity\Carousel;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarouselCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Carousel::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('titre')->setColumns(3)->setLabel("Titre de carousel "),
            TextField::new('description')->setColumns(6)->setLabel("Description de carousel "),
            ImageField::new('photo960x440')->setBasePath('uploads/images/')->setUploadDir('public/uploads/images/')->setColumns(3)->setLabel("Image de carousel 960 x 440 px "),

        ];
    }
    
}
