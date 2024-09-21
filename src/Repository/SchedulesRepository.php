<?php

namespace App\Repository;

use App\Entity\Schedules;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class SchedulesRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Schedules::class);
    }

    /**
     * Get working hours for a specific day.
     *
     * @param string $day
     * @return array|null
     */
    public function findWorkingHoursByDay(string $day): ?array
    {
        return $this->createQueryBuilder('s')
            ->select('s.OpeningTime', 's.ClosingTime')
            ->where('s.Day = :day')
            ->setParameter('day', $day)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
