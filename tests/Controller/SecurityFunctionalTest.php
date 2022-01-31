<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityFunctionalTest extends WebTestCase
{
    public function testLoginPage(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/connexion');

        $this->assertResponseIsSuccessful();
       // $this->assertSelectorTextContains('h1', 'Hello World');
    }


    
    public function testSaiseIdentifiantsError(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'connexion');

         $form = $crawler->selectButton('SE connecter')->form(
            [
                'email'=> 'colette.maillot@voila.fr',
                'password'=>'mail'
            ]);
        $client->submit ($form);
             
        $crawler = $client->request('GET', '/connexion');
        $this->assertResponseredirects('/connexion');
        $client->followRedirects();
    }

    /*public function testSaiseIdentifiants(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', 'connexion');

        $buttonCrawlerNode = $crawler->selectButton('sign in');
        $form = $buttonCrawlerNode->form();

        $form =$buttonCrawlerNode->form(
            [
                'email'=> 'admin@mail.com',
                'password'=>'mailmail',
            ]
            );
             $client->submit ($form);
             
        $crawler = $client->request('GET', '/connexion');
        
        $this->assertResponseIsSuccessful();
       // $this->assertSelectorTextContains('h1', 'Hello World');
    } */
}