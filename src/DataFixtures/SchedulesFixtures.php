<?php

namespace App\DataFixtures;

use App\Entity\Schedules;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SchedulesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $schedule = new Schedules();
        $schedule->setDay('Lundi');
        $schedule->setOpeningTime('08:30');
        $schedule->setClosingTime('19:00');
        $manager->persist($schedule);
  
        $schedule1 = new Schedules();
        $schedule1->setDay('Mardi');
        $schedule1->setOpeningTime('08:30');
        $schedule1->setClosingTime('19:00');
        $manager->persist($schedule1);

        $schedule2 = new Schedules();
        $schedule2->setDay('Mercredi');
        $schedule2->setOpeningTime('08:30');
        $schedule2->setClosingTime('19:00');
        $manager->persist($schedule2);

        $schedule3 = new Schedules();
        $schedule3->setDay('Jeudi');
        $schedule3->setOpeningTime('08:30');
        $schedule3->setClosingTime('19:00');
        $manager->persist($schedule3);

        $schedule4 = new Schedules();
        $schedule4->setDay('Vendredi');
        $schedule4->setOpeningTime('08:00');
        $schedule4->setClosingTime('17:30');
        $manager->persist($schedule4);

        $schedule5 = new Schedules();
        $schedule5->setDay('Samedi');
        $schedule5->setOpeningTime('08:00');
        $schedule5->setClosingTime('12:00');
        $manager->persist($schedule5);

        $schedule6 = new Schedules();
        $schedule6->setDay('Dimanche');
        $schedule6->setOpeningTime('Fermé');
        $schedule6->setClosingTime('');
        $manager->persist($schedule6);


        $manager->flush();
    }
}


