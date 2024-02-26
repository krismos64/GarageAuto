<?php

namespace App\Entity;

use App\Repository\ReviewsRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ReviewsRepository::class)]
class Reviews
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column]
    #[Assert\NotBlank(message: "La note est requise")]
    private int $rating;

    #[ORM\Column(type: Types::TEXT)]
    #[Assert\NotBlank(message: "Le champ commentaire est requis")]
    private string $content;

    #[ORM\Column]
    private \DateTimeImmutable $createdAt;

    #[ORM\Column]
    private bool $isApproved;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le prénom est requis")]
    private string $firstname;

    #[ORM\Column]
    #[Assert\NotBlank(message: "Le nom de famille est requis")]
    private string $lastname;

    #[ORM\ManyToOne(inversedBy: 'reviews')]
    #[ORM\JoinColumn(nullable: true)]
    private ?User $user;

    public function __construct()
    {
        $this->createdAt = new \DateTimeImmutable();
        $this->isApproved = false;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRating(): int
    {
        return $this->rating;
    }

    public function setRating(int $rating): self
    {
        $this->rating = $rating;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;
        return $this;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
{
    $this->createdAt = $createdAt;
    return $this;
}

    public function getIsApproved(): bool
    {
        return $this->isApproved;
    }

    public function setIsApproved(bool $isApproved): self
    {
        $this->isApproved = $isApproved;
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

    public function getFirstname(): string
    {
        return $this->firstname;
    }

    public function setFirstname(string $firstname): self
    {
        $this->firstname = $firstname;
        return $this;
    }

    public function getLastname(): string
    {
        return $this->lastname;
    }

    public function setLastname(string $lastname): self
    {
        $this->lastname = $lastname;
        return $this;
    }
}
