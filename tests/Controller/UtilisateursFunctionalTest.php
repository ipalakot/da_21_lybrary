<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class UtilisateursFunctionalTest extends WebTestCase
{
    public function testIndexUtilisateurs(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/utilisateurs');

        $this->assertResponseIsSuccessful();
      //  $this->assertSelectorTextContains('h1', 'Hello World');
    }

    public function testUserSex(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/utilisateurs2');

        $this->assertResponseIsSuccessful();
      //  $this->assertSelectorTextContains('h1', 'Hello World');
    }

    public function testUserStatus(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/utilisateurs3');

        $this->assertResponseIsSuccessful();
      //  $this->assertSelectorTextContains('h1', 'Hello World');
    }

    public function testNew(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/admin/new');

        $this->assertResponseIsSuccessful();
      //  $this->assertSelectorTextContains('h1', 'Hello World');
    }
}