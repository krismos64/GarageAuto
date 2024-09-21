<?php

namespace App\DataFixtures;

use App\Entity\Car;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CarFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $car1 = new Car();
        $car1->setTitle('BMW SPORT EDITION BLANCHE TOIT OUVRANT');
        $car1->setBrand('Bmw');
        $car1->setModel('Sport Edition');
        $car1->setKm(25700);
        $car1->setYear(2018);
        $car1->setPrice(intval(35000));
        $car1->setDescription('La BMW édition sport était proposée en deux versions de carrosserie, comme modèle à 
        trois et à cinq portes. Ce modèle à trois portes avec son concept d’espace variable, dispose d’un volume de
        presque 2000 litres lors du rabattement des sièges arrière et du siège du convoyeur. Ce grand volume résulte
        surtout de la construction spécifique de la grande hauteur de cette incroyable voiture.');
        $manager->persist($car1);

        $car2 = new Car();
        $car2->setTitle('VOLKSWAGEN GOLF 7 BLANCHE');
        $car2->setBrand('Volkswagen');
        $car2->setModel('Golf 7');
        $car2->setKm(55700);
        $car2->setYear(2016);
        $car2->setPrice(intval(11000));
        $car2->setDescription('Un moteur essence et un moteur électrique combinés. Passez d’un transport purement 
        électrique, sans émissions de gaz d’échappement, à un mélange d’essence et d’électrique afin de réduire les 
        émissions sur les longs trajets. La recharge électrique de votre PHEV se fait en toute simplicité depuis votre
        domicile ou sur votre lieu de destination.');
        $manager->persist($car2);

        $car3 = new Car();
        $car3->setTitle('PEUGEOT 208 BLEUE');
        $car3->setBrand('Peugeot');
        $car3->setModel('208');
        $car3->setKm(85700);
        $car3->setYear(2015);
        $car3->setPrice(intval(7500));
        $car3->setDescription('La voiture parfaite ! Le confort est irréprochable, la finition le choix des matériaux 
        fait de cette voiture l’une des meilleures au monde. Idéale pour les longs trajets comme les plus courts.');
        $manager->persist($car3);

        $car4 = new Car();
        $car4->setTitle('RENAULT CAPTURE ORANGE');
        $car4->setBrand('Renault');
        $car4->setModel('Captur');
        $car4->setKm('95100');
        $car4->setYear('2018');
        $car4->setPrice(intval(8500));
        $car4->setDescription('La voiture a été entretenue par nos soins depuis le début, elle est dans un état irreprochable !');
        $manager->persist($car4);

        $car5 = new Car();
        $car5->setTitle('RENAULT CLIO 4 BLANCHE');
        $car5->setBrand('Renault');
        $car5->setModel('Clio 4');
        $car5->setKm(65220);
        $car5->setYear(2017);
        $car5->setPrice(intval(8100));
        $car5->setDescription('La voiture a été révision chez nous, controle technique ok dépechez-vous!');
        $manager->persist($car5);

        $car6 = new Car();
        $car6->setTitle('VOLKSWAGEN POLO ROUGE');
        $car6->setBrand('Volkswagen');
        $car6->setModel('Polo');
        $car6->setKm(22422);
        $car6->setYear(2022);
        $car6->setPrice(intval(14100));
        $car6->setDescription('La voiture est en super état, controle technique ok première main comme neuve full options');
        $manager->persist($car6); 

        $manager->flush();

// Références pour les objets Car
$this->addReference('car-1', $car1);
$this->addReference('car-2', $car2);
$this->addReference('car-3', $car3);
$this->addReference('car-4', $car4);
$this->addReference('car-5', $car5);
$this->addReference('car-6', $car6);
    }
}