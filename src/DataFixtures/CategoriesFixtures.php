<?php

namespace App\DataFixtures;
use App\Entity\Categories;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Doctrine\Bundle\FixturesBundle\FixtureGroupInterface;

use Faker; 
use Faker\Factory;

class CategoriesFixtures extends Fixture implements FixtureGroupInterface
{
    public function load(ObjectManager $manager): void
    {
// $product = new Product();
        // $manager->persist($product);

            $faker = Faker\Factory::create('fr_FR');
            
            for ($i = 0; $i < 10; $i++) 
            {
                $categories = new Categories();

                $categories->setTitre($faker->sentence())
                           ->setResume($faker->sentence());

                $manager->persist($categories);
            }
            $manager->flush();
    }
    public static function getGroups(): array
     {
        return ['group1'];
     }
}