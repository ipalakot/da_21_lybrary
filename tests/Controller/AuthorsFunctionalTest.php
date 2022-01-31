<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthorsFunctionalTest extends WebTestCase
{
    public function testIndexAuteurs(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'authors/');

        $this->assertResponseIsSuccessful();
     //   $this->assertSelectorTextContains('', '');
    }

    public function testNouveauAuteurs(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'authors/inscription');

        $this->assertResponseIsSuccessful();
     //   $this->assertSelectorTextContains('', '');
    }
}