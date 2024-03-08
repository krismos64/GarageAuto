<?php

namespace App\Controller\Admin;

use App\Entity\Car;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;

class CarCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Car::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('title')->setLabel('Nom de la voiture'),
            TextField::new('km')->setLabel('Kilométrage'),
            TextField::new('year')->setLabel('Année'),
            TextField::new('brand')->setLabel('Marque'),
            TextField::new('model')->setLabel('Modèle'),
            TextField::new('price')->setLabel('Prix'),
            TextEditorField::new('description')->setLabel('Description'),
            AssociationField::new('carImages')
            ->onlyOnForms()
            ->setLabel('Images de la voiture'),
            CollectionField::new('carImages')
            ->onlyOnForms()
            ->setLabel('Images de la voiture')
            ->setTemplatePath('admin/car_images.html.twig'), // chemin vers le template Twig pour afficher les images
            ImageField::new('carImages')
            ->setLabel('Images de la voiture')
            ->setBasePath('/path/to/car/images') // chemin de base vers les images de voiture
            ->setUploadDir('/path/to/upload/directory') // répertoire d'upload des images
            ->setTemplatePath('admin/car_images_list.html.twig'), // chemin vers le template Twig pour afficher les images dans la liste
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