<?php

namespace App\Entity;

use App\Repository\CategorieImageGallerieRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategorieImageGallerieRepository::class)]
class CategorieImageGallerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $designation = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\OneToMany(mappedBy: 'categorieImageGallerie', targetEntity: ImageGallerie::class, orphanRemoval: true)]
    private Collection $imageGalleries;

    public function __construct()
    {
        $this->imageGalleries = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, ImageGallerie>
     */
    public function getImageGalleries(): Collection
    {
        return $this->imageGalleries;
    }

    public function addImageGallery(ImageGallerie $imageGallery): self
    {
        if (!$this->imageGalleries->contains($imageGallery)) {
            $this->imageGalleries->add($imageGallery);
            $imageGallery->setCategorieImageGallerie($this);
        }

        return $this;
    }

    public function removeImageGallery(ImageGallerie $imageGallery): self
    {
        if ($this->imageGalleries->removeElement($imageGallery)) {
            // set the owning side to null (unless already changed)
            if ($imageGallery->getCategorieImageGallerie() === $this) {
                $imageGallery->setCategorieImageGallerie(null);
            }
        }

        return $this;
    }
}
