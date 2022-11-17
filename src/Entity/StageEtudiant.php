<?php

namespace App\Entity;

use App\Repository\StageEtudiantRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @method find($id)
 * @method save($id)
 */

#[ORM\Entity(repositoryClass: StageEtudiantRepository::class)]
class StageEtudiant
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER, nullable: false)]
    protected $id;

    #[ORM\ManyToOne(inversedBy: 'stageEtudiants', cascade:['persist', 'remove'])]
    private ?Etudiant $etudiant = null;

    #[ORM\ManyToOne(inversedBy: 'stageEtudiants', cascade:['persist', 'remove'])]
    private ?StagePeriode $stage_periode = null;

    #[ORM\ManyToOne(inversedBy: 'stageEtudiants', cascade:['persist', 'remove'])]
    private ?Entreprise $entreprise = null;

    #[ORM\ManyToOne(inversedBy: 'stageEtudiants', cascade:['persist', 'remove'])]
    private ?Contact $tuteur = null;

    #[ORM\OneToOne(inversedBy: 'stageEtudiant', cascade: ['persist', 'remove'])]
    private ?Adresse $adresse_stage = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
//    #[Assert\NotBlank]
    private ?\DateTimeInterface $date_debtut_stage = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
//    #[Assert\NotBlank]
    private ?\DateTimeInterface $date_fin_stage = null;

    #[ORM\Column]
    private ?int $duree_jours_stage = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $service_stage_entreprise = null;

    #[ORM\Column(length: 255, nullable: true)]
//    #[Assert\NotBlank]
    private ?string $sujet_stage = null;

    #[ORM\Column(length: 255, nullable: true)]
//    #[Assert\NotBlank]
    private ?string $activites = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $periodes_interruptions = null;

    #[ORM\Column]
//    #[Assert\NotBlank]
    private ?int $duree_hebdomadaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $commentaire_duree_hebdomadaire = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $amenagement_stagec = null;

    #[ORM\Column]
//    #[Assert\NotNull]
    private ?bool $gratification = null;

    #[ORM\Column(length: 1, nullable: true)]
//    #[Assert\NotBlank]
    private ?string $gratification_periode = null;

    #[ORM\Column(nullable: true)]
//    #[Assert\NotBlank]
    private ?int $gratification_montant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $avantages = null;


    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getDateDebtutStage(): ?\DateTimeInterface
    {
        return $this->date_debtut_stage;
    }

    public function setDateDebtutStage(\DateTimeInterface $date_debtut_stage): self
    {
        $this->date_debtut_stage = $date_debtut_stage;

        return $this;
    }

    public function getDateFinStage(): ?\DateTimeInterface
    {
        return $this->date_fin_stage;
    }

    public function setDateFinStage(\DateTimeInterface $date_fin_stage): self
    {
        $this->date_fin_stage = $date_fin_stage;

        return $this;
    }

    public function getDureeJoursStage(): ?int
    {
        return $this->duree_jours_stage;
    }

    public function setDureeJoursStage(int $duree_jours_stage): self
    {
        $this->duree_jours_stage = $duree_jours_stage;

        return $this;
    }

    public function getEtudiant(): ?etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?etudiant $etudiant): self
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    public function getServiceStageEntreprise(): ?string
    {
        return $this->service_stage_entreprise;
    }

    public function setServiceStageEntreprise(?string $service_stage_entreprise): self
    {
        $this->service_stage_entreprise = $service_stage_entreprise;

        return $this;
    }

    public function getSujetStage(): ?string
    {
        return $this->sujet_stage;
    }

    public function setSujetStage(?string $sujet_stage): self
    {
        $this->sujet_stage = $sujet_stage;

        return $this;
    }

    public function getActivites(): ?string
    {
        return $this->activites;
    }

    public function setActivites(?string $activites): self
    {
        $this->activites = $activites;

        return $this;
    }

    public function getPeriodesInterruptions(): ?string
    {
        return $this->periodes_interruptions;
    }

    public function setPeriodesInterruptions(?string $periodes_interruptions): self
    {
        $this->periodes_interruptions = $periodes_interruptions;

        return $this;
    }

    public function getDureeHebdomadaire(): ?int
    {
        return $this->duree_hebdomadaire;
    }

    public function setDureeHebdomadaire(int $duree_hebdomadaire): self
    {
        $this->duree_hebdomadaire = $duree_hebdomadaire;

        return $this;
    }

    public function getCommentaireDureeHebdomadaire(): ?string
    {
        return $this->commentaire_duree_hebdomadaire;
    }

    public function setCommentaireDureeHebdomadaire(?string $commentaire_duree_hebdomadaire): self
    {
        $this->commentaire_duree_hebdomadaire = $commentaire_duree_hebdomadaire;

        return $this;
    }

    public function getAmenagementStagec(): ?string
    {
        return $this->amenagement_stagec;
    }

    public function setAmenagementStagec(?string $amenagement_stagec): self
    {
        $this->amenagement_stagec = $amenagement_stagec;

        return $this;
    }

    public function isGratification(): ?bool
    {
        return $this->gratification;
    }

    public function setGratification(bool $gratification): self
    {
        $this->gratification = $gratification;

        return $this;
    }

    public function getGratificationPeriode(): ?string
    {
        return $this->gratification_periode;
    }

    public function setGratificationPeriode(?string $gratification_periode): self
    {
        $this->gratification_periode = $gratification_periode;

        return $this;
    }

    public function getGratificationMontant(): ?int
    {
        return $this->gratification_montant;
    }

    public function setGratificationMontant(?int $gratification_montant): self
    {
        $this->gratification_montant = $gratification_montant;

        return $this;
    }

    public function getAvantages(): ?string
    {
        return $this->avantages;
    }

    public function setAvantages(?string $avantages): self
    {
        $this->avantages = $avantages;

        return $this;
    }

    public function getStagePeriode(): ?StagePeriode
    {
        return $this->stage_periode;
    }

    public function setStagePeriode(?StagePeriode $stage_periode): self
    {
        $this->stage_periode = $stage_periode;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        $this->entreprise = $entreprise;

        return $this;
    }

    public function getTuteur(): ?contact
    {
        return $this->tuteur;
    }

    public function setTuteur(?contact $tuteur): self
    {
        $this->tuteur = $tuteur;

        return $this;
    }

    public function getAdresseStage(): ?Adresse
    {
        return $this->adresse_stage;
    }

    public function setAdresseStage(?Adresse $adresse_stage): self
    {
        $this->adresse_stage = $adresse_stage;

        return $this;
    }

}
