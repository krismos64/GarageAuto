<?php

namespace App\Controller;

use App\Repository\CarRepository;
use App\Repository\SchedulesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class CarController extends AbstractController
{
    private CarRepository $carRepository;
    private SchedulesRepository $schedulesRepository;

    public function __construct(CarRepository $carRepository, SchedulesRepository $schedulesRepository)
    {
        $this->carRepository = $carRepository;
        $this->schedulesRepository = $schedulesRepository;
    }

    #[Route('/voitures', name: 'app_car')]
    public function index(): Response
    {
        $cars = $this->carRepository->findAllWithImages();
        $days = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $workingHours = [];
        foreach ($days as $day) {
            $workingHours[$day] = $this->schedulesRepository->findWorkingHoursByDay($day);
        }

        return $this->render('car/index.html.twig', [
            'controller_name' => 'CarController',
            'cars' => $cars,
            'workingHours' => $workingHours,
        ]);
    }

    #[Route('/voitures/{filename}', name: 'car_download')]
    public function download(string $filename): BinaryFileResponse
    {
        $filePath = $this->getParameter('kernel.project_dir') . '/uploads/Cars/' . $filename;

        return new BinaryFileResponse($filePath, 200, [], false, ResponseHeaderBag::DISPOSITION_INLINE);
    }
}
