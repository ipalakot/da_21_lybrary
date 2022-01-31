<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use App\Repository\AuteursRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AuteursRepository::class)
 */
class Auteurs
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
     * @Groups({"article:api"})
     */
    private $noms;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"article:api"})
     */
    private $prenoms;

    /**
     * @ORM\Column(type="string", length=255)
     * @Groups({"article:api"})
     */
    private $mails;

    /**
     * @ORM\OneToMany(targetEntity=Articles::class, mappedBy="auteurs")
     */
    private $articleaut;

    public function __construct()
    {
        $this->articleaut = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNoms(): ?string
    {
        return $this->noms;
    }

    public function setNoms(string $noms): self
    {
        $this->noms = $noms;

        return $this;
    }

    public function getPrenoms(): ?string
    {
        return $this->prenoms;
    }

    public function setPrenoms(string $prenoms): self
    {
        $this->prenoms = $prenoms;

        return $this;
    }

    public function getMails(): ?string
    {
        return $this->mails;
    }

    public function setMails(string $mails): self
    {
        $this->mails = $mails;

        return $this;
    }

    /**
     * @return Collection|Articles[]
     */
    public function getArticleaut(): Collection
    {
        return $this->articleaut;
    }

    public function addArticleaut(Articles $articleaut): self
    {
        if (!$this->articleaut->contains($articleaut)) {
            $this->articleaut[] = $articleaut;
            $articleaut->setAuteurs($this);
        }

        return $this;
    }

    public function removeArticleaut(Articles $articleaut): self
    {
        if ($this->articleaut->removeElement($articleaut)) {
            // set the owning side to null (unless already changed)
            if ($articleaut->getAuteurs() === $this) {
                $articleaut->setAuteurs(null);
            }
        }

        return $this;
    }
}