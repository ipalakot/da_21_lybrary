<?php

namespace App\Tests;

# le NameSpace de TesCase
use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase // TestCase = Class qui etend de PhpUnit, notre outils de test
{
    public function testSomething(): void
    {
        // $this->assertTrue(true);
                //$this->assertTrue(true);
        $this->assertEquals(4, 2*2); 
        $this->assertEquals(12, 7+5);
    }
}