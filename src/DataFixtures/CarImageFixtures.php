<?php

namespace App\DataFixtures;

use App\Entity\CarImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarImageFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Load CarImages for Car1
        $this->loadCarImagesForCar($manager, $this->getReference('car-1'), 'bmw-64b576fb6282b296177986.jpg', 'BMW SPORT BLANCHE');
        $this->loadCarImagesForCar($manager, $this->getReference('car-1'), 'bmw-interieur-64b576fb79185998642121.jpg', 'Intérieur BMW');

        // Load CarImages for Car2
        $this->loadCarImagesForCar($manager, $this->getReference('car-2'), 'VolkswagenGolf-2.webp', 'VW Golf7 BLANCHE AVANT');
        $this->loadCarImagesForCar($manager, $this->getReference('car-2'), 'VolkswagenGolf-3.webp', 'VW Golf7 BLANCHE ARRIERE');

        // Load CarImages for Car3
        $this->loadCarImagesForCar($manager, $this->getReference('car-3'), 'peugeot208-1.webp', 'PEUGEOT 208 BLEUE AVANT');
        $this->loadCarImagesForCar($manager, $this->getReference('car-3'), 'peugeot208-2.webp', 'PEUGEOT 208 BLEUE ARRIERE');
        $this->loadCarImagesForCar($manager, $this->getReference('car-3'), 'peugeot208-3.webp', 'PEUGEOT 208 BLEUE COTE');

        // Load CarImages for Car4
        $this->loadCarImagesForCar($manager, $this->getReference('car-4'), 'RenaultCaptur-1.webp', 'RENAULT CAPTURE ORANGE COTE GAUCHE');
        $this->loadCarImagesForCar($manager, $this->getReference('car-4'), 'RenaultCaptur-2.webp', 'RENAULT CAPTURE ORANGE COTE DROIT');

        // Load CarImages for Car5
        $this->loadCarImagesForCar($manager, $this->getReference('car-5'), 'RenaultClio-1.webp', 'RENAULT CLIO 4 BLANCHE AVANT');
        $this->loadCarImagesForCar($manager, $this->getReference('car-5'), 'RenaultClio-2.webp', 'RENAULT CLIO 4 BLANCHE COTE');
        $this->loadCarImagesForCar($manager, $this->getReference('car-5'), 'RenaultClio-3.webp', 'RENAULT CLIO 4 BLANCHE AVANT');

        // Load CarImages for Car5
        $this->loadCarImagesForCar($manager, $this->getReference('car-6'), 'VolkswagenPolo-2.webp', 'VOLKSWAGEN POLO ROUGE DROITE');
        $this->loadCarImagesForCar($manager, $this->getReference('car-6'), 'VolkswagenPolo-3.webp', 'VOLKSWAGEN POLO ROUGE GAUCHE');

        $manager->flush();
    }

    private function loadCarImagesForCar(ObjectManager $manager, $carReference, $title, $description): void
    {
        $carImage = new CarImage();
        $carImage->setTitle($title);
        $carImage->setDescription($description);
        $carImage->setCar($carReference);
        $manager->persist($carImage);
        $this->addReference($title, $carImage);
    }
      }