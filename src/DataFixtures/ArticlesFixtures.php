<?php

namespace App\DataFixtures;

use App\Entity\Articles;
use App\Entity\Auteurs;
use App\Entity\Categories;
use App\Entity\Commentaires;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

use Faker; 
use Faker\Factory;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
      
        $faker = Faker\Factory::create('fr_FR');

         // Creer occurence de 5 Categroie
        for ($i=0; $i<2 ; $i++ ) 
        { 
            $categories = new Categories();
            
            $categories->setTitre($faker->sentence())
                    ->setResume($faker->sentence());
            
            $manager->persist($categories);


        // Creer occurence de 5 Categroie
        for ($l=0; $l<2 ; $l++ ) 
        { 
            $auteurs = new Auteurs();
            
            $auteurs->setNoms($faker->sentence())
                    ->setPrenoms($faker->sentence())
                    ->setMails($faker->sentence());
            
            $manager->persist($auteurs);


        
                // Mainteannt je cree mes Articles
                for ($j=0; $j<3 ; $j++ ) 
                { 
                    $articles = new Articles();
                    
                    $articles->setTitle($faker->sentence($nb = 5, $asText = false))
                            //->setImage($faker->imageUrl($width = 640, $height = 480))
                            //->setResume($faker->sentence())
                            ->setContenu($faker->text($maxNbChars = 250)) 
                            ->setDate(new \DateTime())
                            ->setStatus($faker->boolean())
                            ->setCategory($categories)
                            ->setAuteurs($auteurs);
                        $manager->persist($articles);
                
                        // Creons des commentaires pour les articles 

                        for ($k=1; $k<=mt_rand(4, 10); $k++)
                        {
                            $commentaires = New Commentaires();

                            $days = (new \DateTime());
                         // 	$minimum = '-'.$days.'days';
                            
                            $commentaires->setAuteur($faker->name)
                                    ->setContenu($faker->realText($maxNbChars = 200, $indexSize = 2))
                                    ->setDate($faker->dateTime())
                                    ->setArtcileComm($articles);
                            
                                    $manager-> persist($commentaires);
                        }
                }
            }}
     $manager->flush();
    }
}