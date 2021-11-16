<?php

namespace App\DataFixtures;
use App\Entity\Utilisateurs;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Faker;

class Utilisateursfixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
     // J'utlise fixtures avec FAKER
     $faker = Faker\Factory::create('fr_FR');

     for ($i=0; $i<20 ; $i++ ) 
     { 
         $utilisateurs = new Utilisateurs();
         
         $utilisateurs->setNom($faker->sentence())
             ->setPrenoms($faker->$faker->lastName)
             ->setDatenaiss(new \DateTime)
             ->setAdresse($faker->address)
             ->setEmail($faker->email);
            // ->setContenu($faker->sentence($nbWords = 20, $variableNbWords = true));    
              //  ->setDate(new \DateTime());
         $manager->persist($utilisateurs);
     }
  $manager->flush();
 }
}
