<?php

namespace App\DataFixtures;
use App\Entity\Auteurs;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

use Faker; 
use Faker\Factory;

/** 
 * @codeCoverageIgnore
 * 
*/
class AuteursFixtures extends Fixture  implements FixtureGroupInterface
{
public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

            $faker = Faker\Factory::create('fr_FR');
            
            for ($i = 0; $i < 10; $i++) 
            {
            
            $auteurs = new Auteurs();

                $auteurs->setNoms($faker->lastName)
                     ->setPrenoms($faker->firstName)
                     ->setMails($faker->email());
                $manager->persist($auteurs);
            }
            $manager->flush();
    }
    public static function getGroups(): array
     {
        return ['group4'];
     }
}