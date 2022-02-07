<?php

namespace App\Entity;

use App\Enum\StateCandidateInformations;
use App\Repository\CandidateInformationsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CandidateInformationsRepository::class)
 */
class CandidateInformations
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $personalInformationsStepOne = StateCandidateInformations::NONPRISENCHARGE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $personalInformationsStepTwo = StateCandidateInformations::NONPRISENCHARGE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $personalInformationsStepThree = StateCandidateInformations::NONPRISENCHARGE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $basketStepOne = StateCandidateInformations::NONPRISENCHARGE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $basketStepTwo = StateCandidateInformations::NONPRISENCHARGE;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $submissionStepOne = StateCandidateInformations::NONPRISENCHARGE;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="candidateInformations")
     */
    private $user;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPersonalInformationsStepOne(): ?string
    {
        return $this->personalInformationsStepOne;
    }

    public function setPersonalInformationsStepOne(string $personalInformationsStepOne): self
    {
        $this->personalInformationsStepOne = $personalInformationsStepOne;

        return $this;
    }

    public function getPersonalInformationsStepTwo(): ?string
    {
        return $this->personalInformationsStepTwo;
    }

    public function setPersonalInformationsStepTwo(string $personalInformationsStepTwo): self
    {
        $this->personalInformationsStepTwo = $personalInformationsStepTwo;

        return $this;
    }

    public function getPersonalInformationsStepThree(): ?string
    {
        return $this->personalInformationsStepThree;
    }

    public function setPersonalInformationsStepThree(string $personalInformationsStepThree): self
    {
        $this->personalInformationsStepThree = $personalInformationsStepThree;

        return $this;
    }

    public function getBasketStepOne(): ?string
    {
        return $this->basketStepOne;
    }

    public function setBasketStepOne(string $basketStepOne): self
    {
        $this->basketStepOne = $basketStepOne;

        return $this;
    }

    public function getBasketStepTwo(): ?string
    {
        return $this->basketStepTwo;
    }

    public function setBasketStepTwo(string $basketStepTwo): self
    {
        $this->basketStepTwo = $basketStepTwo;

        return $this;
    }

    public function getSubmissionStepOne(): ?string
    {
        return $this->submissionStepOne;
    }

    public function setSubmissionStepOne(string $submissionStepOne): self
    {
        $this->submissionStepOne = $submissionStepOne;

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
}
