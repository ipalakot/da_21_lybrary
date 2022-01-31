<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\Collection;

use Doctrine\Common\Collections\ArrayCollection;

use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass=App\Repository\CategoriesRepository::class)
 * @UniqueEntity("titre")
 */
class Categories
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
    * @Assert\Length(
     *      min = 2,
     *      max = 50,
     *      minMessage = "Le titre doit avoir 1 minimum de {{ limit }} characteres long",
     *      maxMessage = "Votre Titre de ne pas depasser {{ limit }} characteres")
     * @Groups({"article:api"})
     *
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
     * @ORM\OneToMany(targetEntity=Articles::class, mappedBy="category")
     * 
     */
    private $article;


    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->article = new ArrayCollection();
    }

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

    /**
     * @return Collection|Articles[]
     */
    public function getArticle(): Collection
    {
        return $this->article;
    }

    public function addArticle(Articles $article): self
    {
        if (!$this->article->contains($article)) {
            $this->article[] = $article;
            $article->setCategory($this);
        }

        return $this;
    }

    public function removeArticle(Articles $article): self
    {
        if ($this->article->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getCategory() === $this) {
                $article->setCategory(null);
            }
        }

        return $this;
    }

    public function __toString() {
        return $this->titre;
    }

}