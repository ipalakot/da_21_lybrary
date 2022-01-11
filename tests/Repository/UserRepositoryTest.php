<?php

namespace App\Tests\Repository;

use App\Repository\UserRepository;
use AW\HmacBundle\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class UserRepositoryTest extends KernelTestCase
{
    public function testCalcul(): void
    {
        # Le besoin ici est de de recuperer mon Repo 
        # Pour cela, je je Lance le kermel afin d'avoir le noyau
        // $kernel = self::bootKernel();
            self::bootKernel();

        # Maintenant que j'ai le noyau je peux acceder au Container
         // $kermel->getContainer();
          $user = self::$container->get(UserRepository::class)->count([]);
          $this ->assertEquals(10, $user);
        
        //$this->assertSame('test', $kernel->getEnvironment());
        //$routerService = self::$container->get('router');
        //$myCustomService = self::$container->get(CustomService::class);
    }
}