<?php

namespace App\DataFixtures;

use App\Entity\ServiceImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;

class ServiceImageFixtures extends Fixture implements DependentFixtureInterface
{
    public function getDependencies()
    {
        return [
            ServiceFixtures::class,
        ];
    }

    public function load(ObjectManager $manager): void
    {
        // Load ServiceImages for Service1
        $this->loadServiceImagesForService($manager, $this->getReference('Service-1'), 'amortisseur.jpg', 'Voiture noire en réparation');

        // Load ServiceImages for Service2
        $this->loadServiceImagesForService($manager, $this->getReference('Service-2'), 'vidange.jpg', 'Vidange huile');

        // Load ServiceImages for Service3
        $this->loadServiceImagesForService($manager, $this->getReference('Service-3'), 'pare-brise.jpg', 'Réparation pare-brise');
        
        // Load ServiceImages for Service4
        $this->loadServiceImagesForService($manager, $this->getReference('Service-4'), 'pneus.jpg', 'Changement Pneus');
    
        $manager->flush();
    }

    private function loadServiceImagesForService(ObjectManager $manager, $serviceReference, $title, $description): void
    {
        $serviceImage = new ServiceImage();
        $serviceImage->setTitle($title);
        $serviceImage->setDescription($description);
        $serviceImage->setService($serviceReference);
        $manager->persist($serviceImage);
    }
}
