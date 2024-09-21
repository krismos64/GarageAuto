<?php

namespace App\Controller;

use App\Repository\SchedulesRepository;
use App\Repository\ServiceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(ServiceRepository $serviceRepository, SchedulesRepository $schedulesRepository): Response
    {
        // Récupérer la liste des services depuis la base de données
        $services = $serviceRepository->findAll();
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $workingHours = [];
        foreach ($days as $day) {
        $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
     }
        // Rendre la vue Twig en transmettant la liste des services
        return $this->render('services/index.html.twig', [
            'services' => $services,
            'workingHours' => $workingHours,
        ]);
    }
}