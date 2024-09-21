<?php

namespace App\Controller\Admin;

use App\Entity\Message;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;


class MessagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Message::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        // Supprimer l'action d'édition
        $actions->remove(Crud::PAGE_INDEX, Action::EDIT);

        // Supprimer l'action d'ajout
        $actions->remove(Crud::PAGE_INDEX, Action::NEW);

        return $actions;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('firstName', 'Prénom'),
            TextField::new('lastName', 'Nom'),
            EmailField::new('email', 'E-mail'),
            TextField::new('phoneNumber', 'Numéro de téléphone'),
            TextEditorField::new('message', 'Contenu du message'),
            BooleanField::new('processed', 'Traité')->renderAsSwitch(),
        ];
    }


    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Messages des clients')
            ->setPaginatorPageSize(20);
    }
}
