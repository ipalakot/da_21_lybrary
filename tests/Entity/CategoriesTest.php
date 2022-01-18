<?php

namespace App\Tests\Entity;

use App\Entity\Categories;
use PHPUnit\Framework\TestCase;

class CategoriesTest extends TestCase
{
    public function testIsTrue()
    {
        $categories = new Categories();
        
        $categories->setTitre('Titre')
                   ->setResume('Resume');
    
        $this->assertTrue($categories->getTitre()==='Titre');
        $this->assertTrue($categories->getResume()==='Resume');
    }

    public function testIsFalse()
    {
        $categories = new Categories();
        
        $categories->setTitre('Titre')
                   ->setResume('Resume');
    
        $this->assertFalse($categories->getTitre() !=='Titre');
        $this->assertFalse($categories->getResume() !=='Resume');
    }

    public function testIsEmpty()
    {
        $categories = new Categories();
        
        $this->assertEmpty($categories->getTitre());
        $this->assertEmpty($categories->getResume() );
        $this->assertEmpty($categories->getId());
    }
    
    public function AddArticles(){
        
         $categories = new Categories();
         $articles = new Articles();
       

        $this->assertEmpty($categories->getArticle());

        $articles->addArticle($articles);
        $this->assertContains($articles, $categories->getArticle());

        $articles->RemoveArticle($commentaire);
        $this->assertEmpty($categories->getArticle());

    }
}