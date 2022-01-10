<?php

namespace App\DTO;

class ScrapingDTO
{
    private $etatInfosPerso;
    private $identifiantsetPhotos;
    private $monEmail;
    private $monIdentifiantEtudesenFrance;
    private $photoIdentite;

    private $etatCoordonnees;
    private $contactDetails = [];

    private $statutParcoursDiplomes;
    private $statutCV;
    private $etudes = [];

    private $statutLangues;
    private $testLangueFr;
    private $statutNiveauFr;
    private $scolariteFrance;
    private $etudeduFrancais;
    private $sejourEnFrance;
    private $statutNiveauAnglais;
    private $scolaritenglais;
    private $examenAnglais;
    private $autreLangue;

    private $statutPanierFormation;
    private $panierFormation = [];

    private $listeSoumissionDossier;
    private $statutDossier;

    public function __construct(array $params)
    {
        $this->etatInfosPerso = $params['etatInfosPerso'];
        $this->identifiantsetPhotos = $params['identifiantetPhotos'];
        $this->monEmail = $params['monEmail'];
        $this->monIdentifiantEtudesenFrance = $params['monIdentifiantEtudesenFrance'];
        $this->photoIdentite = $params['photoIdentite'];
        $this->etatCoordonnees = $params['etatCoordonnees'];
        $this->contactDetails = $params['contactDetails'];
        $this->statutParcoursDiplomes = $params['statutParcoursDiplomes'];
        $this->etudes = $params['etudes'];
        $this->statutLangues = $params['statutLangues'];
        $this->testLangueFr = $params['testLangueFr'];
        $this->statutNiveauFr = $params['statutNiveauFr'];
        $this->scolariteFrance = $params['scolariteFrance'];
        $this->etudeduFrancais = $params['etudeduFrancais'];
        $this->sejourEnFrance = $params['sejourEnFrance'];
        $this->statutNiveauAnglais = $params['statutNiveauAnglais'];
        $this->scolaritenglais = $params['scolaritenglais'];
        $this->examenAnglais = $params['examenAnglais'];
        $this->autreLangue = $params['autreLangue'];
        $this->statutPanierFormation = $params['statutPanierFormation'];
        $this->panierFormation = $params['panierFormation'];
        $this->listeSoumissionDossier = $params['listeSoumissionDossier'];
        $this->statutDossier = $params['statutDossier'];
    }

    /**
     * @return mixed
     */
    public function getEtatInfosPerso()
    {
        return $this->etatInfosPerso;
    }

    /**
     * @param mixed $etatInfosPerso
     */
    public function setEtatInfosPerso($etatInfosPerso): void
    {
        $this->etatInfosPerso = $etatInfosPerso;
    }

    /**
     * @return mixed
     */
    public function getIdentifiantsetPhotos()
    {
        return $this->identifiantsetPhotos;
    }

    /**
     * @param mixed $identifiantsetPhotos
     */
    public function setIdentifiantsetPhotos($identifiantsetPhotos): void
    {
        $this->identifiantsetPhotos = $identifiantsetPhotos;
    }

    /**
     * @return mixed
     */
    public function getMonEmail()
    {
        return $this->monEmail;
    }

    /**
     * @param mixed $monEmail
     */
    public function setMonEmail($monEmail): void
    {
        $this->monEmail = $monEmail;
    }

    /**
     * @return mixed
     */
    public function getMonIdentifiantEtudesenFrance()
    {
        return $this->monIdentifiantEtudesenFrance;
    }

    /**
     * @param mixed $monIdentifiantEtudesenFrance
     */
    public function setMonIdentifiantEtudesenFrance($monIdentifiantEtudesenFrance): void
    {
        $this->monIdentifiantEtudesenFrance = $monIdentifiantEtudesenFrance;
    }

    /**
     * @return mixed
     */
    public function getPhotoIdentite()
    {
        return $this->photoIdentite;
    }

    /**
     * @param mixed $photoIdentite
     */
    public function setPhotoIdentite($photoIdentite): void
    {
        $this->photoIdentite = $photoIdentite;
    }

    /**
     * @return mixed
     */
    public function getEtatCoordonnees()
    {
        return $this->etatCoordonnees;
    }

    /**
     * @param mixed $etatCoordonnees
     */
    public function setEtatCoordonnees($etatCoordonnees): void
    {
        $this->etatCoordonnees = $etatCoordonnees;
    }

    /**
     * @return array
     */
    public function getContactDetails(): array
    {
        return $this->contactDetails;
    }

    /**
     * @param array $contactDetails
     */
    public function setContactDetails(array $contactDetails): void
    {
        $this->contactDetails = $contactDetails;
    }

    /**
     * @return mixed
     */
    public function getStatutParcoursDiplomes()
    {
        return $this->statutParcoursDiplomes;
    }

    /**
     * @param mixed $statutParcoursDiplomes
     */
    public function setStatutParcoursDiplomes($statutParcoursDiplomes): void
    {
        $this->statutParcoursDiplomes = $statutParcoursDiplomes;
    }

    /**
     * @return mixed
     */
    public function getStatutCV()
    {
        return $this->statutCV;
    }

    /**
     * @param mixed $statutCV
     */
    public function setStatutCV($statutCV): void
    {
        $this->statutCV = $statutCV;
    }

    /**
     * @return array
     */
    public function getEtudes(): array
    {
        return $this->etudes;
    }

    /**
     * @param array $etudes
     */
    public function setEtudes(array $etudes): void
    {
        $this->etudes = $etudes;
    }

    /**
     * @return mixed
     */
    public function getStatutLangues()
    {
        return $this->statutLangues;
    }

    /**
     * @param mixed $statutLangues
     */
    public function setStatutLangues($statutLangues): void
    {
        $this->statutLangues = $statutLangues;
    }

    /**
     * @return mixed
     */
    public function getTestLangueFr()
    {
        return $this->testLangueFr;
    }

    /**
     * @param mixed $testLangueFr
     */
    public function setTestLangueFr($testLangueFr): void
    {
        $this->testLangueFr = $testLangueFr;
    }

    /**
     * @return mixed
     */
    public function getStatutNiveauFr()
    {
        return $this->statutNiveauFr;
    }

    /**
     * @param mixed $statutNiveauFr
     */
    public function setStatutNiveauFr($statutNiveauFr): void
    {
        $this->statutNiveauFr = $statutNiveauFr;
    }

    /**
     * @return mixed
     */
    public function getScolariteFrance()
    {
        return $this->scolariteFrance;
    }

    /**
     * @param mixed $scolariteFrance
     */
    public function setScolariteFrance($scolariteFrance): void
    {
        $this->scolariteFrance = $scolariteFrance;
    }

    /**
     * @return mixed
     */
    public function getEtudeduFrancais()
    {
        return $this->etudeduFrancais;
    }

    /**
     * @param mixed $etudeduFrancais
     */
    public function setEtudeduFrancais($etudeduFrancais): void
    {
        $this->etudeduFrancais = $etudeduFrancais;
    }

    /**
     * @return mixed
     */
    public function getSejourEnFrance()
    {
        return $this->sejourEnFrance;
    }

    /**
     * @param mixed $sejourEnFrance
     */
    public function setSejourEnFrance($sejourEnFrance): void
    {
        $this->sejourEnFrance = $sejourEnFrance;
    }

    /**
     * @return mixed
     */
    public function getStatutNiveauAnglais()
    {
        return $this->statutNiveauAnglais;
    }

    /**
     * @param mixed $statutNiveauAnglais
     */
    public function setStatutNiveauAnglais($statutNiveauAnglais): void
    {
        $this->statutNiveauAnglais = $statutNiveauAnglais;
    }

    /**
     * @return mixed
     */
    public function getScolaritenglais()
    {
        return $this->scolaritenglais;
    }

    /**
     * @param mixed $scolaritenglais
     */
    public function setScolaritenglais($scolaritenglais): void
    {
        $this->scolaritenglais = $scolaritenglais;
    }

    /**
     * @return mixed
     */
    public function getExamenAnglais()
    {
        return $this->examenAnglais;
    }

    /**
     * @param mixed $examenAnglais
     */
    public function setExamenAnglais($examenAnglais): void
    {
        $this->examenAnglais = $examenAnglais;
    }

    /**
     * @return mixed
     */
    public function getAutreLangue()
    {
        return $this->autreLangue;
    }

    /**
     * @param mixed $autreLangue
     */
    public function setAutreLangue($autreLangue): void
    {
        $this->autreLangue = $autreLangue;
    }

    /**
     * @return mixed
     */
    public function getStatutPanierFormation()
    {
        return $this->statutPanierFormation;
    }

    /**
     * @param mixed $statutPanierFormation
     */
    public function setStatutPanierFormation($statutPanierFormation): void
    {
        $this->statutPanierFormation = $statutPanierFormation;
    }

    /**
     * @return array
     */
    public function getPanierFormation(): array
    {
        return $this->panierFormation;
    }

    /**
     * @param array $panierFormation
     */
    public function setPanierFormation(array $panierFormation): void
    {
        $this->panierFormation = $panierFormation;
    }

    /**
     * @return mixed
     */
    public function getListeSoumissionDossier()
    {
        return $this->listeSoumissionDossier;
    }

    /**
     * @param mixed $listeSoumissionDossier
     */
    public function setListeSoumissionDossier($listeSoumissionDossier): void
    {
        $this->listeSoumissionDossier = $listeSoumissionDossier;
    }

    /**
     * @return mixed
     */
    public function getStatutDossier()
    {
        return $this->statutDossier;
    }

    /**
     * @param mixed $statutDossier
     */
    public function setStatutDossier($statutDossier): void
    {
        $this->statutDossier = $statutDossier;
    }
}
