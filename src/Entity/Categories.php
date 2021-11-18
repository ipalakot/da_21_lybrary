<?php

namespace App\Entity;

use App\Repository\CategoriesRepository;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=CategoriesRepository::class)
 * @UniqueEntity("titre")
 */
class Categories
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
    * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le titre doit avoir 1 minimum de {{ limit }} characteres long",
     *      maxMessage = "Votre Titre de ne pas depasser {{ limit }} characteres")
     */
    private $titre;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le resumé doit avoir 1 minimum de {{ limit }} characteres long",
     *      maxMessage = "Votre resumé de ne pas depasser {{ limit }} characteres"
     * )
     */
    private $resume;

    /**
     * @ORM\ManyToOne(targetEntity=Articles::class, inversedBy="categorie")
     * @ORM\JoinColumn(nullable=false)
     */
    private $articles;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): self
    {
        $this->titre = $titre;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    public function getArticles(): ?Articles
    {
        return $this->articles;
    }

    public function setArticles(?Articles $articles): self
    {
        $this->articles = $articles;

        return $this;
    }
}
