<?php

namespace App\Controller\Admin;

use App\Entity\CategorieImageGallerie;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CategorieImageGallerieCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CategorieImageGallerie::class;
    }


    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('designation')->setColumns(6),
            TextEditorField::new('description')->setColumns(12),
        ];
    }

    public function configureFilters(Filters $filters): Filters
    {
        return $filters
            ->add('designation')
        ;
    }

}
