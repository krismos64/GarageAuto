<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('name')->setLabel('Nom de la voiture'),
            TextField::new('km')->setLabel('Kilométrage'),
            TextField::new('year')->setLabel('Année'),
            TextField::new('brand')->setLabel('Marque'),
            TextField::new('model')->setLabel('Modèle'),
            TextField::new('price')->setLabel('Prix'),
            TextEditorField::new('description')->setLabel('Description'),
            AssociationField::new('images')
                ->setFormTypeOptions([
                    'by_reference' => false,
                ])->setLabel('Images de la voiture'),
            CollectionField::new('images')
                ->onlyOnForms()->setLabel('Images de la voiture (Collection)'),
        ];
    }

        public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Liste des annonces des voitures à vendre')
            ->setPageTitle('new', 'Créer une nouvelle annonce de voiture à vendre')
            ->setPaginatorPageSize(20);
    }
}