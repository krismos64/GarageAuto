<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Entity\Car;
use App\Entity\CarImage;
use App\Entity\Messages;
use App\Entity\Reviews;
use App\Entity\Schedules;
use App\Entity\Service;
use App\Entity\ServiceImage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;

class DashboardController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
    }
    #[IsGranted('ROLE_SUPER_ADMIN')]
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $url = $this->adminUrlGenerator
        ->setController(CarCrudController::class)
        ->generateUrl();

        return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('<img src="./images/Logo/logo.png"></span>')
            ->renderContentMaximized();
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToUrl('Accueil', 'fa fa-home', '/');

        yield MenuItem::subMenu('Annonce', 'fas fa-car')->setSubItems([
            MenuItem::linkToCrud('Créer une nouvelle annonce', 'fas fa-car', Car::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçu des annonces', 'fas fa-eye', Car::class)
        ]);
        yield  MenuItem::linkToCrud('Images voitures', 'fas fa-images', CarImage::class);
   
        yield MenuItem::subMenu('Avis', 'fas fa-comments')->setSubItems([
            MenuItem::linkToCrud('Créer un nouvel avis', 'fas fa-comments', Reviews::class)->setAction(Crud::PAGE_NEW),
            MenuItem::linkToCrud('Aperçu des avis', 'fas fa-eye', Reviews::class)
        ]);

        yield  MenuItem::linkToCrud('Messages clients', 'fas fa-comments', Messages::class);


        if ($this->isGranted('ROLE_SUPER_ADMIN')) {
            yield MenuItem::subMenu('Utilisateurs', 'fas fa-users')->setSubItems([
                MenuItem::linkToCrud('Créer un utilisateur', 'fas fa-user', User::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Aperçu des utilisateurs', 'fas fa-eye', User::class)
            ]);
        }

        if ($this->isGranted('ROLE_SUPER_ADMIN')) {
            yield  MenuItem::linkToCrud('Images services', 'fas fa-images', ServiceImage::class);
            yield MenuItem::subMenu('Services proposés', 'fas fa-bell-concierge')->setSubItems([
                MenuItem::linkToCrud('Créer un service', 'fas fa-bell-concierge', Service::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Aperçu des services', 'fas fa-eye', Service::class)
            ]);
            
        }

        if ($this->isGranted('ROLE_SUPER_ADMIN')) {
            yield MenuItem::subMenu('Jours d\'ouverture', 'fas fa-door-open')->setSubItems([
                MenuItem::linkToCrud('Modifier les horaires', 'fas fa-door-open', Schedules::class)->setAction(Crud::PAGE_NEW),
                MenuItem::linkToCrud('Aperçu des horaires', 'fas fa-eye', Schedules::class)
            ]);
        }
    }
}