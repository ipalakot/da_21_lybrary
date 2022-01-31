<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AdminUserFunctionalTest extends WebTestCase
{
    public function testIndexUser(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'admin/user/');

        $this->assertResponseIsSuccessful();
        //$this->assertSelectorTextContains('', '');
    }

}