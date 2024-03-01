<?php

namespace App\Controller\Admin;

use App\Entity\Reviews;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Validator\Constraints as Assert;

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
            IntegerField::new('rating')
                ->setLabel('Note sur 5')
                ->setFormTypeOptions([
                    'constraints' => [
                        new Assert\NotBlank(['message' => 'La note est requise']),
                        new Assert\Range([
                            'min' => 1,
                            'max' => 5,
                            'notInRangeMessage' => 'La note doit être entre 1 et 5',
                        ]),
                    ],
                ]),
            DateTimeField::new('createdAt')
                ->setLabel('Date de publication')
                ->setFormat('dd/MM/yyyy HH:mm:ss'),
            BooleanField::new('isApproved', 'Validation')
                ->renderAsSwitch(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setPageTitle('index', 'Avis des clients')
            ->setPageTitle('new', 'Créer un avis client')
            ->setPaginatorPageSize(20);
    }
}
