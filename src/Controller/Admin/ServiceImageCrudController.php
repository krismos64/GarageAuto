<?php

namespace App\Controller\Admin;

use App\Entity\ServiceImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceImage::class;
    }
    public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Title')->setLabel('Titre image'),
        ];
    }
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Images des services proposés')
            ->setPageTitle('new', 'Ajouter une image de service pour le site web')
            ->setPaginatorPageSize(20);
    }
}
    
    
