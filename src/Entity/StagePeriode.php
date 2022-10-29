<?php

namespace App\Entity;

use App\Repository\StagePeriodeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StagePeriodeRepository::class)]
class StagePeriode
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::BINARY)]
    private $uuid = null;

    #[ORM\Column(length: 50)]
    private ?string $document_name = null;

    #[ORM\Column]
    private ?int $numero_periode = null;

    #[ORM\Column(length: 100)]
    private ?string $libelle = null;

    #[ORM\Column]
    private ?int $nb_semaines = null;

    #[ORM\Column]
    private ?int $nb_jours = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_debut = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date_fin = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $competences_visees = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modalite_evaluation = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modalite_evaluation_pedagogique = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $modalite_encadrement = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $document_rendre = null;

    #[ORM\Column]
    private ?int $nb_ects = null;

    #[ORM\Column]
    private ?bool $dates_flexibles = null;

    #[ORM\Column]
    private ?bool $copie_assistant = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $texte_libre = null;

    #[ORM\OneToMany(mappedBy: 'stage_periode', targetEntity: StageEtudiant::class)]
    private Collection $stageEtudiants;

    public function __construct()
    {
        $this->stageEtudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUuid()
    {
        return $this->uuid;
    }

    public function setUuid($uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }

    public function getDocumentName(): ?string
    {
        return $this->document_name;
    }

    public function setDocumentName(string $document_name): self
    {
        $this->document_name = $document_name;

        return $this;
    }

    public function getNumeroPeriode(): ?int
    {
        return $this->numero_periode;
    }

    public function setNumeroPeriode(int $numero_periode): self
    {
        $this->numero_periode = $numero_periode;

        return $this;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getNbSemaines(): ?int
    {
        return $this->nb_semaines;
    }

    public function setNbSemaines(int $nb_semaines): self
    {
        $this->nb_semaines = $nb_semaines;

        return $this;
    }

    public function getNbJours(): ?int
    {
        return $this->nb_jours;
    }

    public function setNbJours(int $nb_jours): self
    {
        $this->nb_jours = $nb_jours;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->date_debut;
    }

    public function setDateDebut(\DateTimeInterface $date_debut): self
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->date_fin;
    }

    public function setDateFin(\DateTimeInterface $date_fin): self
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    public function getCompetencesVisees(): ?string
    {
        return $this->competences_visees;
    }

    public function setCompetencesVisees(?string $competences_visees): self
    {
        $this->competences_visees = $competences_visees;

        return $this;
    }

    public function getModaliteEvaluation(): ?string
    {
        return $this->modalite_evaluation;
    }

    public function setModaliteEvaluation(?string $modalite_evaluation): self
    {
        $this->modalite_evaluation = $modalite_evaluation;

        return $this;
    }

    public function getModaliteEvaluationPedagogique(): ?string
    {
        return $this->modalite_evaluation_pedagogique;
    }

    public function setModaliteEvaluationPedagogique(?string $modalite_evaluation_pedagogique): self
    {
        $this->modalite_evaluation_pedagogique = $modalite_evaluation_pedagogique;

        return $this;
    }

    public function getModaliteEncadrement(): ?string
    {
        return $this->modalite_encadrement;
    }

    public function setModaliteEncadrement(?string $modalite_encadrement): self
    {
        $this->modalite_encadrement = $modalite_encadrement;

        return $this;
    }

    public function getDocumentRendre(): ?string
    {
        return $this->document_rendre;
    }

    public function setDocumentRendre(?string $document_rendre): self
    {
        $this->document_rendre = $document_rendre;

        return $this;
    }

    public function getNbEcts(): ?int
    {
        return $this->nb_ects;
    }

    public function setNbEcts(int $nb_ects): self
    {
        $this->nb_ects = $nb_ects;

        return $this;
    }

    public function isDatesFlexibles(): ?bool
    {
        return $this->dates_flexibles;
    }

    public function setDatesFlexibles(bool $dates_flexibles): self
    {
        $this->dates_flexibles = $dates_flexibles;

        return $this;
    }

    public function isCopieAssistant(): ?bool
    {
        return $this->copie_assistant;
    }

    public function setCopieAssistant(bool $copie_assistant): self
    {
        $this->copie_assistant = $copie_assistant;

        return $this;
    }

    public function getTexteLibre(): ?string
    {
        return $this->texte_libre;
    }

    public function setTexteLibre(?string $texte_libre): self
    {
        $this->texte_libre = $texte_libre;

        return $this;
    }

    /**
     * @return Collection<int, StageEtudiant>
     */
    public function getStageEtudiants(): Collection
    {
        return $this->stageEtudiants;
    }

    public function addStageEtudiant(StageEtudiant $stageEtudiant): self
    {
        if (!$this->stageEtudiants->contains($stageEtudiant)) {
            $this->stageEtudiants->add($stageEtudiant);
            $stageEtudiant->setStagePeriode($this);
        }

        return $this;
    }

    public function removeStageEtudiant(StageEtudiant $stageEtudiant): self
    {
        if ($this->stageEtudiants->removeElement($stageEtudiant)) {
            // set the owning side to null (unless already changed)
            if ($stageEtudiant->getStagePeriode() === $this) {
                $stageEtudiant->setStagePeriode(null);
            }
        }

        return $this;
    }
}
