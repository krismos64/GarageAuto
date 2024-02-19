<?php

namespace App\Controller;

use App\Repository\ReviewsRepository;
use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(SchedulesRepository $schedulesRepository, ReviewsRepository $reviewsRepository): Response
    {
    
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $reviews = $reviewsRepository->findAll();
        $workingHours = [];
        foreach ($days as $day) {
            $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
        }

        return $this->render('home/index.html.twig', [
            'workingHours' => $workingHours,
            'reviews' => $reviews
            
        ]);
    }
}