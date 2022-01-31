<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class RegistrationFunctionalTest extends WebTestCase
{
    public function testregistration(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'enregistrement');

        $this->assertResponseIsSuccessful();
       // $this->assertSelectorTextContains('h1', 'Hello World');
    }
}