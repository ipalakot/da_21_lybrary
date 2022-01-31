<?php

namespace App\Tests\entity;

use App\Entity\Auteurs;
use App\Entity\Articles;

use PHPUnit\Framework\TestCase;

class AuteursUniTest extends TestCase
{
    public function testValid(): void
    {
        $auteurs = new Auteurs();
        $articleaut = new Articles();

        $auteurs->setNoms('noms')
                ->setPrenoms('prenoms')
                ->setMails('mail.mail.com');
                     
        $this->assertTrue($auteurs->getNoms()==='noms');
        $this->assertTrue($auteurs->getPrenoms()==='prenoms');
        $this->assertTrue($auteurs->getMails()==='mail.mail.com');

    }

     public function testFaux(): void
    {
        $auteurs = new Auteurs();

        $auteurs->setNoms('noms')
                ->setPrenoms('prenoms')
                ->setMails('mail.mail.com');
                     
        $this->assertFalse($auteurs->getNoms()!=='noms');
        $this->assertFalse($auteurs->getPrenoms()!=='prenoms');
        $this->assertFalse($auteurs->getMails()!=='mail.mail.com');
    }

    public function testVide(): void
    {
        $auteurs = new Auteurs();
        
         $this->assertEmpty($auteurs->getNoms());
        $this->assertEmpty($auteurs->getPrenoms());
        $this->assertEmpty($auteurs->getMails());
        $this->assertEmpty($auteurs->getId());
        
    }

    public function testAddremoveSetArticles()
    {        
        $auteur = new Auteurs();
        $article = new Articles();

        $this->assertEmpty($auteur-> getArticleaut());

        $auteur->addArticleaut($article);
        $this->assertContains($article, $auteur-> getArticleaut());

        $auteur->removeArticleaut($article);
        $this->assertEmpty($auteur-> getArticleaut());
    }
    
}