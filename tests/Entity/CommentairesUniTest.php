<?php

namespace App\Tests\Entity;

use App\Entity\Commentaires;
use App\Entity\Articles;

use DateTime;

use PHPUnit\Framework\TestCase;

class CommentairesUniTest extends TestCase
{
    public function testValide(): void
    {
        $dateTime = new DateTime();
        $artcile_comm = new Articles();
        

        $commentaire = new Commentaires();

        $commentaire->setAuteur('Nom_Auteur')
                    ->setDate($dateTime)
                    ->setContenu('Contenu')
                    ->setArtcileComm($artcile_comm);
        $this->assertTrue($commentaire->getAuteur()==='Nom_Auteur');
        $this->assertTrue($commentaire->getDate()===$dateTime);
        $this->assertTrue($commentaire->getContenu()==='Contenu');
        $this->assertTrue($commentaire->getArtcileComm()===$artcile_comm);
    }

    public function testError(): void
    {
        $dateTime = new DateTime();
        $artcile_comm = new Articles();
        $commentaire = new Commentaires();

        $commentaire->setAuteur('Nom_Auteur')
                    ->setDate($dateTime)
                    ->setContenu('Contenu')
                    ->setArtcileComm($artcile_comm);

        $this->assertFalse($commentaire->getAuteur() !=='Nom_Auteur');
        $this->assertFalse($commentaire->getDate() !==$dateTime);
        $this->assertFalse($commentaire->getContenu() !=='Contenu');
        $this->assertFalse($commentaire->getArtcileComm() !== $artcile_comm);
    }

        public function testvide(): void
    {
        $dateTime = new DateTime();
        $artcile_comm = new Articles();
        $commentaire = new Commentaires();

        $this->assertEmpty($commentaire->getAuteur());
        $this->assertEmpty($commentaire->getDate() );
        $this->assertEmpty($commentaire->getContenu());
        $this->assertEmpty($commentaire->getArtcileComm());
         $this->assertEmpty($commentaire->getId());
    }
}