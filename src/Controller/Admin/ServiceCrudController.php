<?php

namespace App\Controller\Admin;

use App\Entity\Service;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
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
            TextField::new('Title',)->setLabel('Titre du service'),
            TextField::new('Description',)->setLabel('Description du service'),
            AssociationField::new('images')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ])->setLabel('Images des services'),
        ];
    }

public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des services proposés sur le site web')
            ->setPageTitle('new', 'Créér un nouveau service')
            ->setPaginatorPageSize(20);
    }
}
    
    