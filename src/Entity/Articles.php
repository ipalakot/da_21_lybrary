<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\Common\Collections\Collection;
use ApiPlatform\Core\Annotation\ApiResource;
use Symfony\Component\HttpFoundation\File\File;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Serializer\Annotation\Groups;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticlesRepository")
 * @UniqueEntity("title")
 * @Vich\Uploadable
 * @ApiResource
 */
class Articles
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     * @Groups("article")
     *  @Groups({"article:api"})
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(
     *      min = 2,
     *      max = 150,
     *      minMessage = "Le titre doit avoir 1 minimum de {{ limit }} characteres long",
     *      maxMessage = "Votre Titre de ne pas depasser {{ limit }} characteres"
     * )
     * @Groups("article:api")
     */
    private $title;

    /**
     * @ORM\Column(type="string", length=255, unique=true, nullable=true)
     * @Gedmo\Slug(fields={"title"})
     * @Groups("article:api")
     */
    private $slug;

    /**
     * @ORM\ManyToOne(targetEntity=Auteurs::class, inversedBy="articleaut")
     * @Groups({"article:api"})
     */
    private $auteurs;

    /**
     * @ORM\ManyToOne(targetEntity=Categories::class, inversedBy="article")
     * @ORM\JoinColumn(nullable=false)
     *  @Groups({"article:api"})
     */
    private $category;

    /**
     * @ORM\Column(type="datetime")
     * @Groups("article:api")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=1000)
     * @Assert\Length(
     *      min = 100,
     *      max = 1000,
     *      minMessage = "Le titre doit avoir 1 minimum de {{ limit }} characteres long",
     *      maxMessage = "Votre Titre de ne pas depasser {{ limit }} characteres"
     * 
     * )
     * @Groups("article:api")
     */
    private $resume;

    /**
     * @ORM\Column(type="text")
     * @Groups("article:api")
     */
    private $contenu;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Commentaires", mappedBy="artcile_comm", orphanRemoval=true)
     * @Groups({"article:api"})
     */
    private $commentaire;

    /**
     * @Groups("article")
    * @ORM\Column(type="array")
     */
    private $status = [];

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     * 
     * @Vich\UploadableField(mapping="articles_images", fileNameProperty="imageName")
     * 
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;


    /**
     * @var \DateTime $updated_at
     * 
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     * @Groups("article")
     */
    private $updatedAt;

   

    public function __construct()
    {
        $this->commentaire = new ArrayCollection();
       // $this->updatedAt = new \DateTime();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

     public function getSlug(): ?string
    {
        return $this->slug;
    }

    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getCategory(): ?Categories
    {
        return $this->category;
    }

    public function setCategory(?Categories $category): self
    {
        $this->category = $category;

        return $this;
    }

    public function getAuteurs(): ?Auteurs
    {
        return $this->auteurs;
    }

    public function setAuteurs(?Auteurs $auteurs): self
    {
        $this->auteurs = $auteurs;

        return $this;
    }

    public function getResume(): ?string
    {
        return $this->resume;
    }

    public function setResume(?string $resume): self
    {
        $this->resume = $resume;

        return $this;
    }

    /**
     * @return Collection|Commentaires[]
     */
    public function getCommentaire(): Collection
    {
        return $this->commentaire;
    }

    public function addCommentaire(Commentaire $commentaire): self
    {
        if (!$this->commentaire->contains($commentaire)) {
            $this->commentaire[] = $commentaire;
            $commentaire->setArtcileComm($this);
        }

        return $this;
    }

    public function removeCommentaire(Commentaire $commentaire): self
    {
        if ($this->commentaire->removeElement($commentaire)) {
            // set the owning side to null (unless already changed)
            if ($commentaire->getArtcileComm() === $this) {
                $commentaire->setArtcileComm(null);
            }
        }

        return $this;
    }

    public function __toString()
    {
        return $this->title;
    }


       public function getStatus(): ?array
   {
       return $this->status;
   }

   public function setStatus(array $status): self
   {
       $this->status = $status;

       return $this;
   }
   

 /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageFile
     */
    public function setImageFile(?File $imageFile = null): void
    {
        $this->imageFile = $imageFile;

        if (null !== $imageFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->updatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageName(?string $imageName): void
    {
        $this->imageName = $imageName;
    }

    public function getImageName(): ?string
    {
        return $this->imageName;
    }


    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeInterface $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

}