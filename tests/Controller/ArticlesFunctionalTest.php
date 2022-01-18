<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ArticlesFunctionalTest extends WebTestCase
{
    public function testIndex(): void
    {
        $client = static::createPantherClient();
        $crawler = $client->request('GET', '/');

       // $this->assertSelectorTextContains('h1', 'Hello World');
    }
}