<?php

namespace App\DataFixtures;

  use App\Entity\Utilisateurs;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

use Faker; 
use Faker\Factory;

/** 
 * @codeCoverageIgnore
 * 
*/

class UtilisateursFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $faker = Faker\Factory::create('fr_FR');
        $tabstat= ["Publier", "Dépublier", "Archiver"];
        $tabciv= ["Monsieur", "Madame"];
            
            for ($i = 0; $i < 10; $i++) 
            {
            
            $utilisateurs = new Utilisateurs();

            $utilisateurs->setCivilite($tabciv[0])
                        ->setNom($faker->lastName)
                        ->setPrenoms($faker->firstName)
                        ->setDatenaiss($faker->dateTime())
                        ->setAdresse($faker->address)
                      //  ->setPassword($faker->password)
                        ->setEmail($faker->email)
                        ->setStatus($tabstat[0]);
                        $manager->persist($utilisateurs);
            }
            $manager->flush();
    }
    public static function getGroups(): array
     {
        return ['group5'];
     }
}