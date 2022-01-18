<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

use App\Controller\HomeController;

class HomeFunctionnalTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
      //$this->assertSelectorTextContains('', 'BIBO-PROJECT');
       // $this->assertSelectorTextContains('h3', 'DWWM / 2021-2022');
    }

    public function testApropos(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/aprpos');

        $this->assertResponseIsSuccessful();
      //$this->assertSelectorTextContains('', 'BIBO-PROJECT');
       // $this->assertSelectorTextContains('h3', 'DWWM / 2021-2022');
    }

    public function testlistesarticles(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/h_articles');

        $this->assertResponseIsSuccessful();
      //$this->assertSelectorTextContains('', 'BIBO-PROJECT');
       // $this->assertSelectorTextContains('h3', 'DWWM / 2021-2022');
    }

    public function articlesParCategorie(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '//search_art_cat');

        $this->assertResponseIsSuccessful();
      //$this->assertSelectorTextContains('', 'BIBO-PROJECT');
       // $this->assertSelectorTextContains('h3', 'DWWM / 2021-2022');
    }
    
}