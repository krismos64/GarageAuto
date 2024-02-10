<?php

namespace App\Controller\Admin;

use App\Entity\Reviews;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ReviewsCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Reviews::class;
    }
     public function configureFields(string $pageName): iterable
    {
        return [
            TextField::new('Firstname')->setLabel('Prénom'),
            TextField::new('Lastname')->setLabel('Nom'),
            EmailField::new('Email')->setLabel('Adresse Email'),
            TextField::new('Message', 'Contenu du message'),
            IntegerField::new('Rating')->setLabel('Note sur 5'),
            DateField::new('PublishedAt')->setLabel('Date de publication'),
            BooleanField::new('isApproved', 'Validation')
                    ->renderAsSwitch()
        ];
    }

        public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Avis des clients')
            ->setPageTitle('new', 'Créér un avis client')
            ->setPaginatorPageSize(20);
    }
}
    
    

