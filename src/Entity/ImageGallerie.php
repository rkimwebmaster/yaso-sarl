<?php

namespace App\Entity;

use App\Repository\ImageGallerieRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ImageGallerieRepository::class)]
class ImageGallerie
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $photo800x600 = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\ManyToOne(inversedBy: 'imageGalleries')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CategorieImageGallerie $categorieImageGallerie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPhoto800x600(): ?string
    {
        return $this->photo800x600;
    }

    public function setPhoto800x600(string $photo800x600): self
    {
        $this->photo800x600 = $photo800x600;

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

    public function getCategorieImageGallerie(): ?CategorieImageGallerie
    {
        return $this->categorieImageGallerie;
    }

    public function setCategorieImageGallerie(?CategorieImageGallerie $categorieImageGallerie): self
    {
        $this->categorieImageGallerie = $categorieImageGallerie;

        return $this;
    }
}
