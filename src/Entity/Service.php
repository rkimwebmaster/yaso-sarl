<?php

namespace App\Entity;

use App\Repository\ServiceRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceRepository::class)]
class Service
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column(length: 255)]
    private ?string $photo1024x768 = null;

    #[ORM\Column(length: 255)]
    private ?string $photo800x600Un = null;

    #[ORM\Column(length: 255)]
    private ?string $photo800x600Deux = null;

    #[ORM\Column(length: 255)]
    private ?string $photo800x600Trois = null;

    #[ORM\ManyToOne(inversedBy: 'services')]
    #[ORM\JoinColumn(nullable: false)]
    private ?CategorieService $categorieService = null;

    public function getCategorieService(): ?CategorieService
    {
        return $this->categorieService;
    }

    public function setCategorieService(?CategorieService $categorieService): self
    {
        $this->categorieService = $categorieService;

        return $this;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    
    public function getPhoto1024x768(): ?string
    {
        return $this->photo1024x768;
    }

    public function setPhoto1024x768(string $photo1024x768): self
    {
        $this->photo1024x768 = $photo1024x768;

        return $this;
    }

    public function getPhoto800x600Un(): ?string
    {
        return $this->photo800x600Un;
    }

    public function setPhoto800x600Un(string $photo800x600Un): self
    {
        $this->photo800x600Un = $photo800x600Un;

        return $this;
    }

    public function getPhoto800x600Deux(): ?string
    {
        return $this->photo800x600Deux;
    }

    public function setPhoto800x600Deux(string $photo800x600Deux): self
    {
        $this->photo800x600Deux = $photo800x600Deux;

        return $this;
    }

    public function getPhoto800x600Trois(): ?string
    {
        return $this->photo800x600Trois;
    }

    public function setPhoto800x600Trois(string $photo800x600Trois): self
    {
        $this->photo800x600Trois = $photo800x600Trois;

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

}
