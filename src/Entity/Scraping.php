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
    const FIELD_NAME = ['etatCivil' => 'Etat civil',
        'etatInfosPerso' => 'Etat informations personnelles',
        'identifiantEtPhotos' => 'Identifiant et photos',
        '>monEmail' => 'Mon email',
        'identifiantEtudesEnFrance' => 'Identifiant Etudes en France',
        'photoIdentite' => 'Photo identité',
        'etatCoordoonnees' => 'Etat coordonnées',
        'contactDetails' => 'Détails de contact',
        'statutParcoursDiplomes' => 'Statut parcours diplômes',
        'etudes' => 'Etudes',
        'statutLangues' => 'Statut langues',
        'testLanguesFr' => 'Test langues française',
        'statutNiveauFr' => 'Statut niveau français',
        'etudeDuFrancais' => 'Etude du français',
        'sejourEnFrance' => 'Séjour en France',
        'statutNiveauAnglais' => 'Statut niveau Anglais',
        'scolariteANglais' => 'Scolarité anglais',
        'examenAnglais' => 'Examen anglais',
        'autreLangue' => 'Autre langue',
        'statutPanierFormation' => 'Statut panier formation',
        'panierFormation' => 'Panier formation',
        'listeSoumissionDossier' => 'Liste soumission dossier',
        'statutDossier' => 'Statut dossier'];

    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    public $id;

    /**
     * @ORM\Column(type="date")
     */
    public $date;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $etatInfosPerso;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $identifiantEtPhotos;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $monEmail;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $identifiantEtudesEnFrance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $photoIdentite;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $etatCoordoonnees;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    public $contactDetails = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    public $etatCivil = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $statutParcoursDiplomes;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $statutCV;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    public $etudes = [];

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $statutLangues;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $testLanguesFr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $statutNiveauFr;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $etudeDuFrancais;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $sejourEnFrance;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $statutNiveauAnglais;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $scolariteANglais;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $examenAnglais;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $autreLangue;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $statutPanierFormation;

    /**
     * @ORM\Column(type="array", nullable=true)
     */
    public $panierFormation = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    public $listeSoumissionDossier = [];

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    public $statutDossier;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $scolariteFrance;

    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="scrapings")
     */
    public $user;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $etatIdentity;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    public $statutStatutParticulier;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    public $statutParticulier = [];



    public  function getId(): ?int
    {
        return $this->id;
    }

    public  function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public  function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public  function getEtatInfosPerso(): ?string
    {
        return $this->etatInfosPerso;
    }

    public  function setEtatInfosPerso(?string $etatInfosPerso): self
    {
        $this->etatInfosPerso = $etatInfosPerso;

        return $this;
    }

    public  function getIdentifiantEtPhotos(): ?string
    {
        return $this->identifiantEtPhotos;
    }

    public  function setIdentifiantEtPhotos(?string $identifiantEtPhotos): self
    {
        $this->identifiantEtPhotos = $identifiantEtPhotos;

        return $this;
    }

    public  function getMonEmail(): ?string
    {
        return $this->monEmail;
    }

    public  function setMonEmail(?string $monEmail): self
    {
        $this->monEmail = $monEmail;

        return $this;
    }

    public  function getIdentifiantEtudesEnFrance(): ?string
    {
        return $this->identifiantEtudesEnFrance;
    }

    public  function setIdentifiantEtudesEnFrance(?string $identifiantEtudesEnFrance): self
    {
        $this->identifiantEtudesEnFrance = $identifiantEtudesEnFrance;

        return $this;
    }

    public  function getPhotoIdentite(): ?string
    {
        return $this->photoIdentite;
    }

    public  function setPhotoIdentite(?string $photoIdentite): self
    {
        $this->photoIdentite = $photoIdentite;

        return $this;
    }

    public  function getEtatCoordoonnees(): ?string
    {
        return $this->etatCoordoonnees;
    }

    public  function setEtatCoordoonnees(?string $etatCoordoonnees): self
    {
        $this->etatCoordoonnees = $etatCoordoonnees;

        return $this;
    }

    public  function getContactDetails(): ?array
    {
        return $this->contactDetails;
    }

    public  function setContactDetails(?array $contactDetails): self
    {
        $this->contactDetails = $contactDetails;

        return $this;
    }

    public  function getEtatCivil(): ?array
    {
        return $this->etatCivil;
    }

    public  function setEtatCivil(?array $etatCivil): self
    {
        $this->etatCivil = $etatCivil;

        return $this;
    }

    public  function getStatutParcoursDiplomes(): ?string
    {
        return $this->statutParcoursDiplomes;
    }

    public  function setStatutParcoursDiplomes(?string $statutParcoursDiplomes): self
    {
        $this->statutParcoursDiplomes = $statutParcoursDiplomes;

        return $this;
    }

    public  function getStatutCV(): ?string
    {
        return $this->statutCV;
    }

    public  function setStatutCV(?string $statutCV): self
    {
        $this->statutCV = $statutCV;

        return $this;
    }

    public  function getEtudes(): ?array
    {
        return $this->etudes;
    }

    public  function setEtudes(?array $etudes): self
    {
        $this->etudes = $etudes;

        return $this;
    }

    public  function getStatutLangues(): ?string
    {
        return $this->statutLangues;
    }

    public  function setStatutLangues(?string $statutLangues): self
    {
        $this->statutLangues = $statutLangues;

        return $this;
    }

    public  function getTestLanguesFr(): ?string
    {
        return $this->testLanguesFr;
    }

    public  function setTestLanguesFr(?string $testLanguesFr): self
    {
        $this->testLanguesFr = $testLanguesFr;

        return $this;
    }

    public  function getStatutNiveauFr(): ?string
    {
        return $this->statutNiveauFr;
    }

    public  function setStatutNiveauFr(?string $statutNiveauFr): self
    {
        $this->statutNiveauFr = $statutNiveauFr;

        return $this;
    }

    public  function getEtudeDuFrancais(): ?string
    {
        return $this->etudeDuFrancais;
    }

    public  function setEtudeDuFrancais(?string $etudeDuFrancais): self
    {
        $this->etudeDuFrancais = $etudeDuFrancais;

        return $this;
    }

    public  function getSejourEnFrance(): ?string
    {
        return $this->sejourEnFrance;
    }

    public  function setSejourEnFrance(?string $sejourEnFrance): self
    {
        $this->sejourEnFrance = $sejourEnFrance;

        return $this;
    }

    public  function getStatutNiveauAnglais(): ?string
    {
        return $this->statutNiveauAnglais;
    }

    public  function setStatutNiveauAnglais(?string $statutNiveauAnglais): self
    {
        $this->statutNiveauAnglais = $statutNiveauAnglais;

        return $this;
    }

    public  function getScolariteANglais(): ?string
    {
        return $this->scolariteANglais;
    }

    public  function setScolariteANglais(?string $scolariteANglais): self
    {
        $this->scolariteANglais = $scolariteANglais;

        return $this;
    }

    public  function getExamenAnglais(): ?string
    {
        return $this->examenAnglais;
    }

    public  function setExamenAnglais(?string $examenAnglais): self
    {
        $this->examenAnglais = $examenAnglais;

        return $this;
    }

    public  function getAutreLangue(): ?string
    {
        return $this->autreLangue;
    }

    public  function setAutreLangue(?string $autreLangue): self
    {
        $this->autreLangue = $autreLangue;

        return $this;
    }

    public  function getStatutPanierFormation(): ?string
    {
        return $this->statutPanierFormation;
    }

    public  function setStatutPanierFormation(?string $statutPanierFormation): self
    {
        $this->statutPanierFormation = $statutPanierFormation;

        return $this;
    }

    public  function getPanierFormation(): ?array
    {
        return $this->panierFormation;
    }

    public  function setPanierFormation(?array $panierFormation): self
    {
        $this->panierFormation = $panierFormation;

        return $this;
    }

    public  function getListeSoumissionDossier(): ?array
    {
        return $this->listeSoumissionDossier;
    }

    public  function setListeSoumissionDossier(?array $listeSoumissionDossier): self
    {
        $this->listeSoumissionDossier = $listeSoumissionDossier;

        return $this;
    }

    public  function getStatutDossier(): ?array
    {
        return $this->statutDossier;
    }

    public  function setStatutDossier(?array $statutDossier): self
    {
        $this->statutDossier = $statutDossier;

        return $this;
    }

    public  function hydrate(ScrapingDTO $scrapingDTO)
    {
        $this->date = new \DateTime();
        $this->etatIdentity = $scrapingDTO->getEtatIdentity();
        $this->etatCivil = $scrapingDTO->getEtatCivil();
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

    public  function getScolariteFrance(): ?string
    {
        return $this->scolariteFrance;
    }

    public  function setScolariteFrance(?string $scolariteFrance): self
    {
        $this->scolariteFrance = $scolariteFrance;

        return $this;
    }

    public  function getUser(): User
    {
        return $this->user;
    }

    public  function setUser(User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public  function getEtatIdentity(): ?string
    {
        return $this->etatIdentity;
    }

    public  function setEtatIdentity(?string $etatIdentity): self
    {
        $this->etatIdentity = $etatIdentity;

        return $this;
    }

    public  function getStatutStatutParticulier(): ?string
    {
        return $this->statutStatutParticulier;
    }

    public  function setStatutStatutParticulier(?string $statutStatutParticulier): self
    {
        $this->statutStatutParticulier = $statutStatutParticulier;

        return $this;
    }

    public  function getStatutParticulier(): ?array
    {
        return $this->statutParticulier;
    }

    public  function setStatutParticulier(?array $statutParticulier): self
    {
        $this->statutParticulier = $statutParticulier;

        return $this;
    }

    public  function transformData(array $initialData)
    {
        $tbl = [];

        foreach ($initialData as $initial) {
            $data = explode('#', $initial);
            $tbl[$data[0]] = $tbl[$data[1]];
        }

        return $tbl;
    }

    /**
     * @return array
     */
    public  function getToFieldsNotFilled()
    {
        $emptyFields = [];
        $reflector = new \ReflectionClass($this);

        foreach ($reflector->getProperties() as $property) {
            if (empty($property->getValue($this))) {
                array_push($emptyFields, self::FIELD_NAME[$property->getName()]);
            }
        }

        return $emptyFields;
    }
}