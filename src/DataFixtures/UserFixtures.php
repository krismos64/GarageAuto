<?php

namespace App\DataFixtures;

use App\Entity\User;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserFixtures extends Fixture
{
    private UserPasswordHasherInterface $passwordHasher;

    public function __construct(UserPasswordHasherInterface $passwordHasher)
    {
        $this->passwordHasher = $passwordHasher;
    }

    public function load(ObjectManager $manager): void
    {
        $superAdmin = new User();
        $superAdmin->setEmail('v.parrot@gmail.com');
        $superAdmin->setFirstname('Vincent');
        $superAdmin->setLastname('Parrot');
        $superAdmin->setRoles(['ROLE_SUPER_ADMIN']);
        $superAdmin->setPassword(
            $this->passwordHasher->hashPassword(
                $superAdmin,
                'Toulouse31!' 
            )
        );

        $manager->persist($superAdmin);
        $manager->flush();
    }
}
