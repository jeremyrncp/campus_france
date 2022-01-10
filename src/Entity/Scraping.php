<?php

namespace App\Entity;

use App\DTO\ScrapingDTO;
use App\Repository\ScrapingRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ScrapingRepository::class)
 */
class Scraping
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatInfosPerso;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifiantEtPhotos;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $monEmail;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $identifiantEtudesEnFrance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $photoIdentite;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etatCoordoonnees;

    /**
     * @ORM\Column(type="array")
     */
    private $contactDetails = [];

    /**
     * @ORM\Column(type="json")
     */
    private $etatCivil = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutParcoursDiplomes;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutCV;

    /**
     * @ORM\Column(type="array")
     */
    private $etudes = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutLangues;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $testLanguesFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutNiveauFr;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $etudeDuFrancais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $sejourEnFrance;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutNiveauAnglais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $scolariteANglais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $examenAnglais;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $autreLangue;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutPanierFormation;

    /**
     * @ORM\Column(type="array")
     */
    private $panierFormation = [];

    /**
     * @ORM\Column(type="json")
     */
    private $listeSoumissionDossier = [];

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $statutDossier;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $scolariteFrance;

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

    public function getEtatInfosPerso(): ?string
    {
        return $this->etatInfosPerso;
    }

    public function setEtatInfosPerso(string $etatInfosPerso): self
    {
        $this->etatInfosPerso = $etatInfosPerso;

        return $this;
    }

    public function getIdentifiantEtPhotos(): ?string
    {
        return $this->identifiantEtPhotos;
    }

    public function setIdentifiantEtPhotos(string $identifiantEtPhotos): self
    {
        $this->identifiantEtPhotos = $identifiantEtPhotos;

        return $this;
    }

    public function getMonEmail(): ?string
    {
        return $this->monEmail;
    }

    public function setMonEmail(string $monEmail): self
    {
        $this->monEmail = $monEmail;

        return $this;
    }

    public function getIdentifiantEtudesEnFrance(): ?string
    {
        return $this->identifiantEtudesEnFrance;
    }

    public function setIdentifiantEtudesEnFrance(string $identifiantEtudesEnFrance): self
    {
        $this->identifiantEtudesEnFrance = $identifiantEtudesEnFrance;

        return $this;
    }

    public function getPhotoIdentite(): ?string
    {
        return $this->photoIdentite;
    }

    public function setPhotoIdentite(string $photoIdentite): self
    {
        $this->photoIdentite = $photoIdentite;

        return $this;
    }

    public function getEtatCoordoonnees(): ?string
    {
        return $this->etatCoordoonnees;
    }

    public function setEtatCoordoonnees(string $etatCoordoonnees): self
    {
        $this->etatCoordoonnees = $etatCoordoonnees;

        return $this;
    }

    public function getContactDetails(): ?array
    {
        return $this->contactDetails;
    }

    public function setContactDetails(array $contactDetails): self
    {
        $this->contactDetails = $contactDetails;

        return $this;
    }

    public function getEtatCivil(): ?array
    {
        return $this->etatCivil;
    }

    public function setEtatCivil(array $etatCivil): self
    {
        $this->etatCivil = $etatCivil;

        return $this;
    }

    public function getStatutParcoursDiplomes(): ?string
    {
        return $this->statutParcoursDiplomes;
    }

    public function setStatutParcoursDiplomes(string $statutParcoursDiplomes): self
    {
        $this->statutParcoursDiplomes = $statutParcoursDiplomes;

        return $this;
    }

    public function getStatutCV(): ?string
    {
        return $this->statutCV;
    }

    public function setStatutCV(string $statutCV): self
    {
        $this->statutCV = $statutCV;

        return $this;
    }

    public function getEtudes(): ?array
    {
        return $this->etudes;
    }

    public function setEtudes(array $etudes): self
    {
        $this->etudes = $etudes;

        return $this;
    }

    public function getStatutLangues(): ?string
    {
        return $this->statutLangues;
    }

    public function setStatutLangues(string $statutLangues): self
    {
        $this->statutLangues = $statutLangues;

        return $this;
    }

    public function getTestLanguesFr(): ?string
    {
        return $this->testLanguesFr;
    }

    public function setTestLanguesFr(string $testLanguesFr): self
    {
        $this->testLanguesFr = $testLanguesFr;

        return $this;
    }

    public function getStatutNiveauFr(): ?string
    {
        return $this->statutNiveauFr;
    }

    public function setStatutNiveauFr(string $statutNiveauFr): self
    {
        $this->statutNiveauFr = $statutNiveauFr;

        return $this;
    }

    public function getEtudeDuFrancais(): ?string
    {
        return $this->etudeDuFrancais;
    }

    public function setEtudeDuFrancais(string $etudeDuFrancais): self
    {
        $this->etudeDuFrancais = $etudeDuFrancais;

        return $this;
    }

    public function getSejourEnFrance(): ?string
    {
        return $this->sejourEnFrance;
    }

    public function setSejourEnFrance(string $sejourEnFrance): self
    {
        $this->sejourEnFrance = $sejourEnFrance;

        return $this;
    }

    public function getStatutNiveauAnglais(): ?string
    {
        return $this->statutNiveauAnglais;
    }

    public function setStatutNiveauAnglais(string $statutNiveauAnglais): self
    {
        $this->statutNiveauAnglais = $statutNiveauAnglais;

        return $this;
    }

    public function getScolariteANglais(): ?string
    {
        return $this->scolariteANglais;
    }

    public function setScolariteANglais(string $scolariteANglais): self
    {
        $this->scolariteANglais = $scolariteANglais;

        return $this;
    }

    public function getExamenAnglais(): ?string
    {
        return $this->examenAnglais;
    }

    public function setExamenAnglais(string $examenAnglais): self
    {
        $this->examenAnglais = $examenAnglais;

        return $this;
    }

    public function getAutreLangue(): ?string
    {
        return $this->autreLangue;
    }

    public function setAutreLangue(string $autreLangue): self
    {
        $this->autreLangue = $autreLangue;

        return $this;
    }

    public function getStatutPanierFormation(): ?string
    {
        return $this->statutPanierFormation;
    }

    public function setStatutPanierFormation(string $statutPanierFormation): self
    {
        $this->statutPanierFormation = $statutPanierFormation;

        return $this;
    }

    public function getPanierFormation(): ?array
    {
        return $this->panierFormation;
    }

    public function setPanierFormation(array $panierFormation): self
    {
        $this->panierFormation = $panierFormation;

        return $this;
    }

    public function getListeSoumissionDossier(): ?array
    {
        return $this->listeSoumissionDossier;
    }

    public function setListeSoumissionDossier(array $listeSoumissionDossier): self
    {
        $this->listeSoumissionDossier = $listeSoumissionDossier;

        return $this;
    }

    public function getStatutDossier(): ?string
    {
        return $this->statutDossier;
    }

    public function setStatutDossier(string $statutDossier): self
    {
        $this->statutDossier = $statutDossier;

        return $this;
    }

    public function hydrate(ScrapingDTO $scrapingDTO)
    {
        $this->date = new \DateTime();
        $this->etatInfosPerso = $scrapingDTO->getEtatInfosPerso();
        $this->identifiantEtPhotos = $scrapingDTO->getIdentifiantsetPhotos();
        $this->monEmail = $scrapingDTO->getMonEmail();
        $this->identifiantEtudesEnFrance= $scrapingDTO->getMonIdentifiantEtudesenFrance();
        $this->photoIdentite = $scrapingDTO->getPhotoIdentite();
        $this->etatCoordoonnees = $scrapingDTO->getEtatCoordonnees();
        $this->contactDetails = $scrapingDTO->getContactDetails();
        $this->statutParcoursDiplomes = $scrapingDTO->getStatutParcoursDiplomes();
        $this->etudes = $scrapingDTO->getEtudes();
        $this->statutLangues = $scrapingDTO->getStatutLangues();
        $this->testLanguesFr = $scrapingDTO->getTestLangueFr();
        $this->statutNiveauFr = $scrapingDTO->getStatutNiveauFr();
        $this->etudeDuFrancais = $scrapingDTO->getEtudeduFrancais();
        $this->sejourEnFrance = $scrapingDTO->getSejourEnFrance();
        $this->statutNiveauAnglais = $scrapingDTO->getStatutNiveauAnglais();
        $this->scolariteANglais = $scrapingDTO->getScolaritenglais();
        $this->examenAnglais = $scrapingDTO->getExamenAnglais();
        $this->autreLangue = $scrapingDTO->getAutreLangue();
        $this->statutPanierFormation = $scrapingDTO->getStatutPanierFormation();
        $this->panierFormation = $scrapingDTO->getPanierFormation();
        $this->listeSoumissionDossier = $scrapingDTO->getListeSoumissionDossier();
        $this->statutDossier = $scrapingDTO->getStatutDossier();
    }

    public function getScolariteFrance(): ?string
    {
        return $this->scolariteFrance;
    }

    public function setScolariteFrance(string $scolariteFrance): self
    {
        $this->scolariteFrance = $scolariteFrance;

        return $this;
    }
}
