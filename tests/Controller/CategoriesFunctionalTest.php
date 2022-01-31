<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategoriesFunctionalTest extends WebTestCase
{
    public function testIndexcategories(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'categories/');

        $this->assertResponseIsSuccessful();
       // $this->assertSelectorTextContains('', '');
    }

    public function testNewcategories(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'categories/new');

        $this->assertResponseIsSuccessful();
       // $this->assertSelectorTextContains('', '');
    }
}