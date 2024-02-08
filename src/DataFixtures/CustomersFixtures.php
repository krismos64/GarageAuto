<?php

namespace App\DataFixtures;

use App\Entity\Customer;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CustomersFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $customer1 = new Customer();
        $customer1->setFirstname('Stacy');
        $customer1->setLastname('Moss');
        $customer1->setEmail('stacymoss@gmail.com');
        $customer1->setPhone('0785953500');
        $manager->persist($customer1);

        $customer2 = new Customer();
        $customer2->setFirstname('Charles');
        $customer2->setLastname('Leclerc');
        $customer2->setEmail('cleclerc@gmail.com');
        $customer2->setPhone('0654749652');
        $manager->persist($customer2);

        $customer3 = new Customer();
        $customer3->setFirstname('Sebastien');
        $customer3->setLastname('Loeb');
        $customer3->setEmail('sebloeb@gmail.com');
        $customer3->setPhone('0654782136');
        $manager->persist($customer3);

        $customer4 = new Customer();
        $customer4->setFirstname('Esteban');
        $customer4->setLastname('Ocon');
        $customer4->setEmail('estebanocon@gmail.com');
        $customer4->setPhone('0633790888');
        $manager->persist($customer4);

        $customer5 = new Customer();
        $customer5->setFirstname('Pitt');
        $customer5->setLastname('Sampras');
        $customer5->setEmail('pitsampras@gmail.com');
        $customer5->setPhone('0728099785');
        $manager->persist($customer5);

        $manager->flush();
    }
}
