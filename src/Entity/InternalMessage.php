<?php

namespace App\Entity;

use App\Repository\InternalMessageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=InternalMessageRepository::class)
 */
class InternalMessage
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
     * @ORM\Column(type="text")
     */
    private $content;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="internalMessages")
     */
    private $user;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isAdminResponse;

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

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

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

    public function getIsAdminResponse(): ?bool
    {
        return $this->isAdminResponse;
    }

    public function setIsAdminResponse(?bool $isAdminResponse): self
    {
        $this->isAdminResponse = $isAdminResponse;

        return $this;
    }
}
