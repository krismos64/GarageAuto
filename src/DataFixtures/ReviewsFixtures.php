<?php

namespace App\DataFixtures;

use App\Entity\Reviews;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ReviewsFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $review=new Reviews();
        $review->setFirstname('Stacy');
        $review->setLastname('Moss');
        $review->setEmail('stacy@gmail.com');
        $review->setRating(5);
        $review->setContent('Au top ce garage !');
        $review->setCreatedAt (\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2024-02-19 12:00:00')); 
        $review->setIsApproved(true);
        $manager->persist($review);

        $review2=new Reviews();
        $review2->setFirstname('Esteban');
        $review2->setLastname('Ocon');
        $review2->setEmail('oconesteban@gmail.com');
        $review2->setRating(5);
        $review2->setContent('Je suis très satisfait, ma formule 1 avit un problème pour accélérer, Mr Parrot a su trouver le problème rapidement je recommande ce garage!');
        $review2->setCreatedAt (\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2023-11-14 11:00:00')); 
        $review2->setIsApproved(true);
        $manager->persist($review);

        $review3=new Reviews();
        $review3->setFirstname('Emilia');
        $review3->setLastname('Clark');
        $review3->setEmail('queenkalicee@hotmail.com');
        $review3->setRating(4);
        $review3->setContent('Génial, un point en moins pour la fermeture le dimanche !');
        $review3->setCreatedAt (\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2023-09-10 12:00:00')); 
        $review3->setIsApproved(true);
        $manager->persist($review);

        $review4=new Reviews();
        $review4->setFirstname('Lebron');
        $review4->setLastname('James');
        $review4->setEmail('l.james@gmail.com');
        $review4->setRating(5);
        $review4->setContent('Le meilleur garage au monde !');
        $review4->setCreatedAt (\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2024-01-31 12:00:00')); 
        $review4->setIsApproved(true);
        $manager->persist($review);

        $review5=new Reviews();
        $review5->setFirstname('Elon');
        $review5->setLastname('Musk');
        $review5->setEmail('elonmusk@gmail.com');
        $review5->setRating(5);
        $review5->setContent('Ils ont pu réparer ma fusée en 5minutes, de vrais pro !');
        $review5->setCreatedAt (\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2024-11-05 12:00:00')); 
        $review5->setIsApproved(true);
        $manager->persist($review);

        $review6=new Reviews();
        $review6->setFirstname('Luc');
        $review6->setLastname('Skywalker');
        $review6->setEmail('skyluc@yahoo.fr');
        $review6->setRating(4);
        $review6->setContent('Sympathique mais locaux un peu petits...');
        $review6->setCreatedAt (\DateTimeImmutable::createFromFormat('Y-m-d H:i:s', '2023-12-28 12:00:00')); 
        $review6->setIsApproved(true);
        $manager->persist($review);

        $manager->flush();
    }
    }


