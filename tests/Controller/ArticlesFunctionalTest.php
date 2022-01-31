<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticlesFunctionalTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'articles/');

        $this->assertResponseIsSuccessful();
        
        $this->assertSelectorTextContains('h1', 'Tous les Articles');
    }

    public function testArticlesPubliesAuteurs(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'articles/publies_auteurs');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Tous les Articles');
    }

    public function testCatInfo(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'articles/article__cat_info');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Tous les Articles');
    }

    public function testNouveauArticles(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'articles/new');
        $this->assertResponseIsSuccessful();
        //$this->assertSelectorTextContains('', '');
    }

   /* public function testAffichageArticles(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'articles/{}slug');
        $this->assertResponseIsSuccessful();
        //$this->assertSelectorTextContains('', '');
    } */
}