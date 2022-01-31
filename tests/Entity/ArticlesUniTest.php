<?php

namespace App\Tests\Entity;

use App\Entity\Articles;
use App\Entity\Auteurs;
use App\Entity\Categories;
use App\Entity\Commentaires;
use DateTime;

use PHPUnit\Framework\TestCase;

class ArticlesUniTest extends TestCase
{
    public function testValide(): void
    {
        $auteurs = new Auteurs();
        $categories = new Categories();
        $dateTime = New DateTime();
        
        $articles = new Articles();
                    
        $articles->setTitle('Titlr')
                // ->setImageName('imageName')
                 ->setSlug('slug') 
                 ->setResume('resume')
                 ->setContenu('contenu') 
                 ->setUpdatedAt($dateTime)
                 ->setStatus([1])
                 ->setCategory($categories)
                 ->setAuteurs($auteurs);

        $this->assertTrue($articles->getTitle()==='Titlr');
        $this->assertTrue($articles->getSlug()==='slug');
      //  $this->assertTrue($articles->getImageName()==='imageName');
        $this->assertTrue($articles->getResume()==='resume');
        $this->assertTrue($articles->getContenu()==='contenu'); 
        $this->assertTrue($articles->getUpdatedAt()===$dateTime);
        $this->assertTrue($articles->getStatus()===[1]);
        $this->assertTrue($articles->getCategory()===$categories);
        $this->assertTrue($articles->getAuteurs()===$auteurs);
    }

     public function testFaux(): void
    {
        $auteurs = new Auteurs();
        $categories = new Categories();
        $dateTime = new DateTime();
        
        $articles = new Articles();
                    
        $articles->setTitle('Titlr')
                // ->setImageName('imageName')
                 ->setSlug('slug')
                 ->setResume('resume')
                 ->setContenu('contenu')
                 ->setDate($dateTime)
                 ->setStatus([1])
                 ->setCategory($categories)
                 ->setAuteurs($auteurs);

        $this->assertFalse($articles->getTitle()!=='Titlr');
        $this->assertFalse($articles->getSlug()!=='slug');
        //  $this->assertTrue($articles->getImageName()==='imageName');
        $this->assertFalse($articles->getResume()!=='resume');
        $this->assertFalse($articles->getContenu()!=='contenu');
        $this->assertFalse($articles->getDate()!==$dateTime);
        $this->assertFalse($articles->getStatus()!==[1]);
        $this->assertFalse($articles->getCategory()!==$categories);
        $this->assertFalse($articles->getAuteurs()!==$auteurs);
    }

         public function testVide(): void
    {
        $auteurs = new Auteurs();
        $categories = new Categories();
        $dateTime = new DateTime();
        
        $articles = new Articles();
                
        $this->assertEmpty($articles->getId());
        $this->assertEmpty($articles->getTitle());
        $this->assertEmpty($articles->getSlug());
        //  $this->assertTrue($articles->getImageName()==='imageName');
        $this->assertEmpty($articles->getResume());
        $this->assertEmpty($articles->getContenu());
        $this->assertEmpty($articles->getDate());
        $this->assertEmpty($articles->getStatus());
        $this->assertEmpty($articles->getCategory());
        $this->assertEmpty($articles->getAuteurs());
    }

       public function testAddCommentaires(){
        
        $article = new Articles();
        $commentaire = new Commentaires();

        $this->assertEmpty($article->getCommentaire());

        $article->addCommentaire($commentaire);
        $this->assertContains($commentaire, $article->getCommentaire());

     //   $article->RemoveCommentaire($commentaire);
     //   $this->assertEmpty($article->getCommentaire());

    }
}