<?php

namespace App\Controller;

use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LegalMentionsController extends AbstractController
{
    #[Route('/mentions-legales', name: 'app_legal_mentions')]
    public function index(SchedulesRepository $schedulesRepository): Response
    {
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $workingHours = [];
        
        foreach ($days as $day) {
        $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay($day);
        }
        return $this->render('legal_mentions/index.html.twig', [
            'controller_name' => 'LegalMentionsController',
            'workingHours' => $workingHours,
        ]);
    }
}
