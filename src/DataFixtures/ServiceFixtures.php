<?php

namespace App\DataFixtures;

use App\Entity\Service;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $service1 = new Service();
        $service1->setTitle('Réparation mécanique');
        $service1->setDescription('Une panne, une casse, un accident ? On s’occupe d’effectuer les diagnostics et les
        réparations mécaniques et carrosseries de votre auto');
        $manager->persist($service1);

        $service2 = new Service();
        $service2->setTitle('Entretien et révision');
        $service2->setDescription('Nous vous accompagnons toute l’année pour la réparation et l’équipementde votre auto
        afin de garantir votre mobilité au quotidien.');
       
        $manager->persist($service2);

        $service3 = new Service();
        $service3->setTitle('Pare-brise et vitrage');
        $service3->setDescription('Dès l’instant où vous repérez un dommage (impact ou fissure) sur votre pare-brise, 
        contactez notre garage. Un professionnel déterminera s’il faut le réparer ou le remplacer puis vous proposera 
        une solution adaptée.');
        $manager->persist($service3);

        $service4 = new Service();
        $service4->setTitle('Pneumatique');
        $service4->setDescription('Les pneus de votre auto sont essentiels à votre sécurité à bord ! Les pneumatiques 
        sont le lien direct entre votre voiture et le sol. Leur état influence en grande partie la tenue de route ainsi 
        que les distances de freinage de votre véhicule.');
        $manager->persist($service4);

        $manager->flush();

        // Références pour les objets Services
        $this->addReference('Service-1', $service1);
        $this->addReference('Service-2', $service2);
        $this->addReference('Service-3', $service3);
        $this->addReference('Service-4', $service4);
    }
}
   