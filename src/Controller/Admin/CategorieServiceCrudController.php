<?php

namespace App\Controller\Admin;

use App\Entity\CategorieService;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;

class CategorieServiceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorieService::class;
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

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('designation')
        ;
    }
}
