<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentairesRepository;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=CommentairesRepository::class)
 */
class Commentaires
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups({"article:api"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     
     */
    private $auteur;

    /**
     * @ORM\Column(type="datetime")
     * @Groups({"article:api"})
     */
    private $date;

    /**
     * @ORM\Column(type="text")
     * @Groups({"article:api"})
     */
    private $contenu;

    /**
     * @ORM\ManyToOne(targetEntity=Articles::class, inversedBy="commentaires")
     * @ORM\JoinColumn(nullable=false)
     */
    private $artcile_comm;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAuteur(): ?string
    {
        return $this->auteur;
    }

    public function setAuteur(string $auteur): self
    {
        $this->auteur = $auteur;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getContenu(): ?string
    {
        return $this->contenu;
    }

    public function setContenu(string $contenu): self
    {
        $this->contenu = $contenu;

        return $this;
    }

    public function getArtcileComm(): ?Articles
    {
        return $this->artcile_comm;
    }

    public function setArtcileComm(?Articles $artcile_comm): self
    {
        $this->artcile_comm = $artcile_comm;

        return $this;
    }
}