<?php

namespace App\Tests\Entity;

use App\Entity\Article;
use App\Entity\Articles;
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
    
    
    public function testAddremoveSetArticles()
    {        
        
        $categorie = new Categories();
        $article = new Articles();

        $this->assertEmpty($categorie->getArticle());

        $categorie->addArticle($article);
        $this->assertContains($article, $categorie->getArticle());

        $categorie->removeArticle($article);
        $this->assertEmpty($categorie->getArticle());
    }
}