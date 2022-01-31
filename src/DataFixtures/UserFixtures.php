<?php

namespace App\DataFixtures;

use App\Entity\User;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;
//use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;


use Faker; 
use Faker\Factory;

/** 
 * @codeCoverageIgnore
 * 
*/
class UserFixtures extends Fixture implements FixtureGroupInterface
{
     private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
        $this->passwordEncoder = $passwordEncoder;
    }
    
    
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

            $faker = Faker\Factory::create('fr_FR');
            
            for ($i = 0; $i < 10; $i++) 
            {
            
            $user = new User();

                $user->setUsername($faker->userName()) 
                     ->setEmail($faker->email())
                     ->setPassword($this->passwordEncoder->encodePassword($user, 'test'))
                    ->setRoles(['ROLE_ADMIN']);
                $manager->persist($user);
            }
            $manager->flush();
    }
    public static function getGroups(): array
     {
        return ['group2'];
     }
}