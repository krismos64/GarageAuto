<?php

namespace App\Controller\Admin;

use App\Entity\Reviews;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
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
            TextField::new('firstname')->setLabel('Prénom'),
            TextField::new('lastname')->setLabel('Nom'),
            TextField::new('content', 'Contenu du message'),
            IntegerField::new('rating')->setLabel('Note sur 5'),
            DateField::new('created_at')->setLabel('Date de publication'),
            BooleanField::new('is_approved', 'Validation')
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
    
    

