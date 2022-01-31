<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CommentairesFunctionalTest extends WebTestCase
{
    public function testIndexCommentaires(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'commentaires/');

        $this->assertResponseIsSuccessful();
       // $this->assertSelectorTextContains('h1', 'Hello World');
    }

}