<?php

namespace App\Controller\Admin;

use App\Entity\PageQSN;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class PageQSNCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageQSN::class;
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
