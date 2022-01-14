<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserUnitTest extends TestCase
{
    public function testIsTrue(): void
    {
        $user = new User();
        
        $user->setUsername('username') 
             ->setEmail('ipalakot@mail.com')
             ->setPassword('password')
             ->setRoles(['ROLE_ADMIN']);
            
        $this->assertTrue($user->getUsername()==='username');
        $this->assertTrue($user->getEmail()==='ipalakot@mail.com');
        $this->assertTrue($user->getPassword()==='password');
        //$this->assertTrue($user->getRoles()===['ROLE_ADMIN']);
    }
}