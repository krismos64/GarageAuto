<?php

namespace App\Twig;

use App\Repository\SchedulesRepository;
use Twig\Extension\AbstractExtension;
use Twig\Extension\GlobalsInterface;

class AppExtension extends AbstractExtension implements GlobalsInterface
{
    private const DAYS = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

    public function __construct(private SchedulesRepository $schedulesRepository)
    {
    }

    public function getGlobals(): array
    {
        $workingHours = [];

        foreach (self::DAYS as $day) {
            $workingHours[$day] = $this->schedulesRepository->findWorkingHoursByDay($day);
        }

        return [
            'workingHours' => $workingHours,
        ];
    }
}
