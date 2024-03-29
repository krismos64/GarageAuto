<?php

namespace App\Controller\Admin;

use App\Entity\CarImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;

class CarImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return CarImage::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title')->setLabel('Titre image'),
            TextField::new('description')->setLabel('Description'),
            AssociationField::new('car')->setLabel('Voiture'),
            // Add other fields for CarImage entity...
        ];
    }

        public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Images des voitures pour les annonces')
            ->setPaginatorPageSize(20);
    }
}
