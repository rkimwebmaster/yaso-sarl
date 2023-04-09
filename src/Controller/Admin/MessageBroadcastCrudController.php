<?php

namespace App\Controller\Admin;

use App\Entity\MessageBroadcast;
use EasyCorp\Bundle\EasyAdminBundle\Config\Filters;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MessageBroadcastCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return MessageBroadcast::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            AssociationField::new('destinataires')->setColumns(12)->setLabel("Les detinataires "),
            TextField::new('objet')->setColumns(12)->setLabel("Sujet du message "),
            TextEditorField::new('contenu')->setColumns(12)->setLabel("Message à envoyer "),
        ];
    }

    
    public function configureFilters(Filters $filters): Filters
    {
        return $filters
        ->add('destinataires')
        ->add('objet')
        ;
    }
    
}
