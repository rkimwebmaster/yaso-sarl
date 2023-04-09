<?php

namespace App\Entity;

use App\Repository\MessageBroadcastRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MessageBroadcastRepository::class)]
class MessageBroadcast
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'messageBroadcast', targetEntity: NewsLetter::class)]
    private Collection $destinataires;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $contenu = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $dateEmission = null;

    #[ORM\ManyToOne(inversedBy: 'messageBroadcasts')]
    private ?User $user = null;

    #[ORM\Column(length: 255)]
    private ?string $objet = null;

    public function __construct()
    {
        $this->destinataires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, NewsLetter>
     */
    public function getDestinataires(): Collection
    {
        return $this->destinataires;
    }

    public function addDestinataire(NewsLetter $destinataire): self
    {
        if (!$this->destinataires->contains($destinataire)) {
            $this->destinataires->add($destinataire);
            $destinataire->setMessageBroadcast($this);
        }

        return $this;
    }

    public function removeDestinataire(NewsLetter $destinataire): self
    {
        if ($this->destinataires->removeElement($destinataire)) {
            // set the owning side to null (unless already changed)
            if ($destinataire->getMessageBroadcast() === $this) {
                $destinataire->setMessageBroadcast(null);
            }
        }

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

    public function getDateEmission(): ?\DateTimeInterface
    {
        return $this->dateEmission;
    }

    public function setDateEmission(\DateTimeInterface $dateEmission): self
    {
        $this->dateEmission = $dateEmission;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getObjet(): ?string
    {
        return $this->objet;
    }

    public function setObjet(string $objet): self
    {
        $this->objet = $objet;

        return $this;
    }
}
