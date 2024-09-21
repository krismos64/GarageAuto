<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testUserCreation(): void
    {
        $user = new User();
        $user->setEmail('john.doe@gmail.com')
            ->setPassword('password123')
            ->setLastname('Doe')
            ->setFirstname('John');

        $this->assertSame('john.doe@gmail.com', $user->getEmail());
        $this->assertSame('password123', $user->getPassword());
        $this->assertSame('Doe', $user->getLastname());
        $this->assertSame('John', $user->getFirstname());
    }

    public function testUserRoles(): void
    {
        $user = new User();
        $this->assertContains('ROLE_ADMIN', $user->getRoles());

        $user->setRoles(['ROLE_USER']);
        $this->assertContains('ROLE_USER', $user->getRoles());
        $this->assertContains('ROLE_ADMIN', $user->getRoles());
    }

    public function testUserIdentifier(): void
    {
        $user = new User();
        $user->setEmail('john.doe@gmail.com');

        $this->assertSame('john.doe@gmail.com', $user->getUserIdentifier());
    }


}
