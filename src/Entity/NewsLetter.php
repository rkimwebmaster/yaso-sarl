<?php

namespace App\Entity;

use App\Repository\NewsLetterRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: NewsLetterRepository::class)]
class NewsLetter
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    #[ORM\Column(length: 255, nullable:true)]
    private ?string $ipAdress = null;

    #[ORM\ManyToOne(inversedBy: 'destinataires')]
    private ?MessageBroadcast $messageBroadcast = null;

    public function __construct()
    {
        $this->createdAt=new \DateTimeImmutable();
        $this->updatedAt=new \DateTimeImmutable();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    public function getIpAdress(): ?string
    {
        return $this->ipAdress;
    }

    public function setIpAdress(string $ipAdress): self
    {
        $this->ipAdress = $ipAdress;

        return $this;
    }

    public function getMessageBroadcast(): ?MessageBroadcast
    {
        return $this->messageBroadcast;
    }

    public function setMessageBroadcast(?MessageBroadcast $messageBroadcast): self
    {
        $this->messageBroadcast = $messageBroadcast;

        return $this;
    }
}
