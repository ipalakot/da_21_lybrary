<?php

namespace App\Tests\Entity;

use App\Entity\Categories;
use PHPUnit\Framework\TestCase;

class CategoriesTest extends TestCase
{
    public function testIsTrue()
    {
        $categories = new Categories();
        
        $categories->setTitre('Titre')
                   ->setResume('Rsume');
                   $this->assertTrue($categories->getTitre()==='Titre');
                   $this->assertTrue($categories->getResume()==='Resume');
    }
}