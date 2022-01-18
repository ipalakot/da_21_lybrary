<?php

namespace App\Tests\Entity;

use App\Entity\Utilisateurs;
use DateTime;
use PHPUnit\Framework\TestCase;

class UtilisateursTest extends TestCase
{
    public function testIsTrue(): void
    {

        $utilisateurs = new Utilisateurs();
        $dateTime = New DateTime();
        
        $utilisateurs->setCivilite('mme')
                     ->setNom('nom')
                    ->setPrenoms('prenoms')
                    ->setDatenaiss($dateTime)
                    ->setAdresse('adresse')
                    //->setPassword('password')
                    ->setEmail('ipalakot@mail.com')
                    ->setStatus('0');
                    
        $this->assertTrue($utilisateurs->getCivilite()==='mme');
        $this->assertTrue($utilisateurs->getNom()==='nom');
        $this->assertTrue($utilisateurs->getPrenoms()==='prenoms');
        $this->assertTrue($utilisateurs->getDatenaiss()===$dateTime);
        $this->assertTrue($utilisateurs->getAdresse()==='adresse');
        //$this->assertTrue($utilisateurs->getPassword()==='password');
        $this->assertTrue($utilisateurs->getEmail()==='ipalakot@mail.com');
        $this->assertTrue($utilisateurs->getStatus()==='0');
    }

    public function testFaux(): void
    {
        $dateTime = New DateTime();
        
        $utilisateurs = new Utilisateurs();
        
        $utilisateurs->setCivilite('mme')
                     ->setNom('nom')
                    ->setPrenoms('prenoms')
                    ->setDatenaiss($dateTime)
                    ->setAdresse('adresse')
                    //->setPassword('password')
                    ->setEmail('ipalakot@mail.com')
                    ->setStatus('0');
                    
        $this->assertFalse($utilisateurs->getCivilite()==='false');
        $this->assertFalse($utilisateurs->getNom()==='false');
        $this->assertFalse($utilisateurs->getPrenoms()==='false');
        $this->assertFalse($utilisateurs->getDatenaiss()!==$dateTime);
        $this->assertFalse($utilisateurs->getAdresse()==='false');
        // $this->assertFalse($utilisateurs->getPassword()!=='password');
        $this->assertFalse($utilisateurs->getEmail()==='false');
        $this->assertFalse($utilisateurs->getStatus()==='false');
    }

        public function testVide(): void
    {
        //$dateTime = New DateTime();
        
        $utilisateurs = new Utilisateurs();
        
        $this->assertEmpty($utilisateurs->getId());
        $this->assertEmpty($utilisateurs->getCivilite());
        $this->assertEmpty($utilisateurs->getNom());
        $this->assertEmpty($utilisateurs->getPrenoms());
        $this->assertEmpty($utilisateurs->getDatenaiss());
        $this->assertEmpty($utilisateurs->getAdresse());
        //$this->assertEmpty($utilisateurs->getPassword());
        $this->assertEmpty($utilisateurs->getEmail());
        $this->assertEmpty($utilisateurs->getStatus());
    }
}