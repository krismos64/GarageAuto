<?php

namespace App\Controller\Admin;

use App\Entity\Contact;
use App\Entity\Messages;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class MessagesCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Messages::class;
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions->remove(Crud::PAGE_INDEX, Action::NEW);
    }
    public function configureFields(string $pageName): iterable
    {
        yield    TextField::new('firstName', 'Prénom');
        yield    TextField::new('lastName', 'Nom');
        yield    EmailField::new('email', 'E-mail');
        yield    TextField::new('phoneNumber', 'Numéro de téléphone');
        yield    TextareaField::new('Message', 'Contenu du message');
        yield    BooleanField::new('isApproved', 'Traité')->renderAsSwitch();
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Messages des clients')
            ->setPaginatorPageSize(20);
    }
}