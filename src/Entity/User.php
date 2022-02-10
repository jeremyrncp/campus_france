<?php

namespace App\Entity;

use App\Repository\UserRepository;
use App\Entity\ResetPasswordRequest;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @UniqueEntity(fields={"email"}, message="There is already an account with this email")
 */
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="json")
     */
    private $roles = [];

    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $usernameCampusFrance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $passwordCampusFrance;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $etatScraping;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $isVerified = false;

    /**
     * @ORM\OneToMany(targetEntity=Discussion::class, mappedBy="user", cascade={"remove"})
     */
    private $discussions;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $fullName;

    /**
     * @ORM\OneToMany(targetEntity=ResetPasswordRequest::class, mappedBy="user", cascade={"remove"})
     */
    private $resetPasswordRequest;

    /**
     * @ORM\OneToMany(targetEntity=Message::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $messages;

    /**
     * @ORM\OneToMany(targetEntity=Scraping::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $scrapings;

    /**
     * @ORM\OneToMany(targetEntity=CandidateInformations::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $candidateInformations;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $cv;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $dateCV;

    /**
     * @ORM\OneToMany(targetEntity=InternalMessage::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $internalMessages;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $planpremium;

    /**
     * @ORM\OneToMany(targetEntity=Paiement::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $paiements;

    /**
     * @ORM\OneToMany(targetEntity=Task::class, mappedBy="user", cascade={"persist", "remove"})
     */
    private $tasks;

    public function __construct()
    {
        $this->discussions = new ArrayCollection();
        $this->messages = new ArrayCollection();
        $this->candidateInformations = new ArrayCollection();
        $this->internalMessages = new ArrayCollection();
        $this->paiements = new ArrayCollection();
        $this->tasks = new ArrayCollection();
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

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @deprecated since Symfony 5.3, use getUserIdentifier instead
     */
    public function getUsername(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Returning a salt is only needed, if you are not using a modern
     * hashing algorithm (e.g. bcrypt or sodium) in your security.yaml.
     *
     * @see UserInterface
     */
    public function getSalt(): ?string
    {
        return null;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    public function getUsernameCampusFrance(): ?string
    {
        return $this->usernameCampusFrance;
    }

    public function setUsernameCampusFrance(string $usernameCampusFrance): self
    {
        $this->usernameCampusFrance = $usernameCampusFrance;

        return $this;
    }

    public function getPasswordCampusFrance(): ?string
    {
        return $this->passwordCampusFrance;
    }

    public function setPasswordCampusFrance(string $passwordCampusFrance): self
    {
        $this->passwordCampusFrance = $passwordCampusFrance;

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

    public function getEtatScraping(): ?bool
    {
        return $this->etatScraping;
    }

    public function setEtatScraping(bool $etatScraping): self
    {
        $this->etatScraping = $etatScraping;

        return $this;
    }

    public function isVerified(): bool
    {
        return $this->isVerified;
    }

    public function setIsVerified(bool $isVerified): self
    {
        $this->isVerified = $isVerified;

        return $this;
    }

    /**
     * @return Collection|Message[]
     */
    public function getDiscussion(): Collection
    {
        return $this->discussions;
    }

    public function addDiscussion(Message $discussion): self
    {
        if (!$this->discussions->contains($discussion)) {
            $this->discussion[] = $discussion;
            $discussion->setUser($this);
        }

        return $this;
    }

    public function removeDiscussion(Message $discussion): self
    {
        if ($this->discussion->removeElement($discussion)) {
            // set the owning side to null (unless already changed)
            if ($discussion->getUser() === $this) {
                $discussion->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Discussion[]
     */
    public function getDiscussions(): Collection
    {
        return $this->discussions;
    }

    public function getFullName(): ?string
    {
        return $this->fullName;
    }

    public function setFullName(string $fullName): self
    {
        $this->fullName = $fullName;

        return $this;
    }

    public function __toString()
    {
        return $this->fullName;
    }

    /**
     * @return Collection|Message[]
     */
    public function getMessages(): Collection
    {
        return $this->messages;
    }

    public function addMessage(Message $message): self
    {
        if (!$this->messages->contains($message)) {
            $this->messages[] = $message;
            $message->setUser($this);
        }

        return $this;
    }

    public function removeMessage(Message $message): self
    {
        if ($this->messages->removeElement($message)) {
            // set the owning side to null (unless already changed)
            if ($message->getUser() === $this) {
                $message->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getScrapings(): Collection
    {
        return $this->scrapings;
    }

    public function addScraping(Scraping $scraping): self
    {
        if (!$this->scrapings->contains($scraping)) {
            $this->scrapings[] = $scraping;
            $scraping->setUser($this);
        }

        return $this;
    }

    public function removeScraping(Scraping $scraping): self
    {
        if ($this->scrapings->removeElement($scraping)) {
            // set the owning side to null (unless already changed)
            if ($scraping->getUser() === $this) {
                $scraping->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CandidateInformations[]
     */
    public function getCandidateInformations(): Collection
    {
        return $this->candidateInformations;
    }

    public function addCandidateInformation(CandidateInformations $candidateInformation): self
    {
        if (!$this->candidateInformations->contains($candidateInformation)) {
            $this->candidateInformations[] = $candidateInformation;
            $candidateInformation->setUser($this);
        }

        return $this;
    }

    public function removeCandidateInformation(CandidateInformations $candidateInformation): self
    {
        if ($this->candidateInformations->removeElement($candidateInformation)) {
            // set the owning side to null (unless already changed)
            if ($candidateInformation->getUser() === $this) {
                $candidateInformation->setUser(null);
            }
        }

        return $this;
    }

    public function getCv(): ?string
    {
        return $this->cv;
    }

    public function setCv(?string $cv): self
    {
        $this->cv = $cv;

        return $this;
    }

    public function getDateCV(): ?\DateTimeInterface
    {
        return $this->dateCV;
    }

    public function setDateCV(\DateTimeInterface $dateCV): self
    {
        $this->dateCV = $dateCV;

        return $this;
    }

    /**
     * @return Collection|InternalMessage[]
     */
    public function getInternalMessages(): Collection
    {
        return $this->internalMessages;
    }

    public function addInternalMessage(InternalMessage $internalMessage): self
    {
        if (!$this->internalMessages->contains($internalMessage)) {
            $this->internalMessages[] = $internalMessage;
            $internalMessage->setUser($this);
        }

        return $this;
    }

    public function removeInternalMessage(InternalMessage $internalMessage): self
    {
        if ($this->internalMessages->removeElement($internalMessage)) {
            // set the owning side to null (unless already changed)
            if ($internalMessage->getUser() === $this) {
                $internalMessage->setUser(null);
            }
        }

        return $this;
    }

    public function getPlanpremium(): ?bool
    {
        return $this->planpremium;
    }

    public function setPlanpremium(?bool $planpremium): self
    {
        $this->planpremium = $planpremium;

        return $this;
    }

    /**
     * @return Collection|Paiement[]
     */
    public function getPaiements(): Collection
    {
        return $this->paiements;
    }

    public function addPaiement(Paiement $paiement): self
    {
        if (!$this->paiements->contains($paiement)) {
            $this->paiements[] = $paiement;
            $paiement->setUser($this);
        }

        return $this;
    }

    public function removePaiement(Paiement $paiement): self
    {
        if ($this->paiements->removeElement($paiement)) {
            // set the owning side to null (unless already changed)
            if ($paiement->getUser() === $this) {
                $paiement->setUser(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Task[]
     */
    public function getTasks(): Collection
    {
        return $this->tasks;
    }

    public function addTask(Task $task): self
    {
        if (!$this->tasks->contains($task)) {
            $this->tasks[] = $task;
            $task->setUser($this);
        }

        return $this;
    }

    public function removeTask(Task $task): self
    {
        if ($this->tasks->removeElement($task)) {
            // set the owning side to null (unless already changed)
            if ($task->getUser() === $this) {
                $task->setUser(null);
            }
        }

        return $this;
    }
}
