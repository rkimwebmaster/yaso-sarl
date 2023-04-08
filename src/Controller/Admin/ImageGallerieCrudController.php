<?php

namespace App\Controller\Admin;

use App\Entity\ImageGallerie;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class ImageGallerieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ImageGallerie::class;
    }

    /*
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id'),
            TextField::new('title'),
            TextEditorField::new('description'),
        ];
    }
    */
}
