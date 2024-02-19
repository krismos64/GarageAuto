<?php

namespace App\Entity;

use App\Repository\SchedulesRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: SchedulesRepository::class)]
class Schedules
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Day = null;

    #[ORM\Column(length: 255)]
    private ?string $OpeningTime = null;

    #[ORM\Column(length: 255)]
    private ?string $ClosingTime = null;

    #[ORM\ManyToOne(inversedBy: 'modify_schedules')]
    private ?User $user = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDay(): ?string
    {
        return $this->Day;
    }

    public function setDay(string $Day): static
    {
        $this->Day = $Day;

        return $this;
    }

    public function getOpeningTime(): ?string
    {
        return $this->OpeningTime;
    }

    public function setOpeningTime(string $OpeningTime): static
    {
        $this->OpeningTime = $OpeningTime;

        return $this;
    }

    public function getClosingTime(): ?string
    {
        return $this->ClosingTime;
    }

    public function setClosingTime(string $ClosingTime): static
    {
        $this->ClosingTime = $ClosingTime;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): static
    {
        $this->user = $user;

        return $this;
    }
}
