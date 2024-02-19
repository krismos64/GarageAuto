<?php

namespace App\Controller;

use App\Entity\Schedules;
use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FAQController extends AbstractController
{
    #[Route('/foire-aux-questions', name: 'app_f_a_q')]
    public function index(SchedulesRepository $schedulesRepository,): Response
    {
    
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

        $workingHours = [];
        foreach ($days as $day) {
            $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
        }

        return $this->render('FAQ/index.html.twig', [
            'workingHours' => $workingHours,
            
        ]);
    }
}