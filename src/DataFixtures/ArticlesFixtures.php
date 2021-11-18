<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Categories;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker; 
use Faker\Factory;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
      
        $faker = Faker\Factory::create('fr_FR');

         // Creer occurence de 10 Categroie
        for ($i=0; $i<5 ; $i++ ) 
        { 
            $categories = new Categories();
            
            $categories->setTitre($faker->sentence())
                    ->setResume($faker->sentence());
            
            $manager->persist($categories);
        
            // Mainteannt je cree mes Articles
            for ($j=0; $j<10 ; $j++ ) 
            { 
                $articles = new Articles();
                
                $articles->setTire($faker->sentence())
                        ->setImage($faker->imageUrl())
                        ->setResume($faker->sentence())
                        ->setContenu($faker->sentence()) 
                        ->setCreatedAt(new \DateTime())
                        ->setCategories($categories);
    
                    $manager->persist($articles);
            }
        }
     $manager->flush();
    }
}

