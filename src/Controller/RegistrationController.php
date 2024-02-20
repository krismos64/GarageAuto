<?php

namespace App\Controller;

use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(SchedulesRepository $schedulesRepository): Response
    {
        $workingHours = [];
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

        foreach ($days as $day) {
            $workingHours[$day] = $schedulesRepository->findWorkingHoursByDay ($day);
        }

        return $this->render('registration/register.html.twig', [
            'workingHours' => $workingHours,
        ]);
    }
}
