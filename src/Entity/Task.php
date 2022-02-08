<?php

namespace App\Entity;

use App\Repository\TaskRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TaskRepository::class)
 */
class Task
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $date;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateexecute;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="tasks")
     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $pathScraping;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDateexecute(): ?\DateTimeInterface
    {
        return $this->dateexecute;
    }

    public function setDateexecute(?\DateTimeInterface $dateexecute): self
    {
        $this->dateexecute = $dateexecute;

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

    public function getPathScraping(): ?string
    {
        return $this->pathScraping;
    }

    public function setPathScraping(string $pathScraping): self
    {
        $this->pathScraping = $pathScraping;

        return $this;
    }
}
