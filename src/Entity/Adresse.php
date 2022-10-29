<?php

namespace App\Entity;

use App\Repository\AdresseRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AdresseRepository::class)]
class Adresse
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse1 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse2 = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresse3 = null;

    #[ORM\Column(length: 10, nullable: true)]
    private ?string $code_postal = null;

    #[ORM\Column(length: 100, nullable: true)]
    private ?string $ville = null;

    #[ORM\OneToOne(mappedBy: 'adresseEtudiant', cascade: ['persist', 'remove'])]
    private ?Etudiant $etudiant = null;

    #[ORM\OneToOne(mappedBy: 'adresse_stage', cascade: ['persist', 'remove'])]
    private ?StageEtudiant $stageEtudiant = null;

    #[ORM\OneToOne(mappedBy: 'adresse', cascade: ['persist', 'remove'])]
    private ?Entreprise $entreprise = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAdresse1(): ?string
    {
        return $this->adresse1;
    }

    public function setAdresse1(?string $adresse1): self
    {
        $this->adresse1 = $adresse1;

        return $this;
    }

    public function getAdresse2(): ?string
    {
        return $this->adresse2;
    }

    public function setAdresse2(?string $adresse2): self
    {
        $this->adresse2 = $adresse2;

        return $this;
    }

    public function getAdresse3(): ?string
    {
        return $this->adresse3;
    }

    public function setAdresse3(?string $adresse3): self
    {
        $this->adresse3 = $adresse3;

        return $this;
    }

    public function getCodePostal(): ?string
    {
        return $this->code_postal;
    }

    public function setCodePostal(?string $code_postal): self
    {
        $this->code_postal = $code_postal;

        return $this;
    }

    public function getVille(): ?string
    {
        return $this->ville;
    }

    public function setVille(?string $ville): self
    {
        $this->ville = $ville;

        return $this;
    }

    public function getEtudiant(): ?Etudiant
    {
        return $this->etudiant;
    }

    public function setEtudiant(?Etudiant $etudiant): self
    {
        // unset the owning side of the relation if necessary
        if ($etudiant === null && $this->etudiant !== null) {
            $this->etudiant->setAdresseEtudiant(null);
        }

        // set the owning side of the relation if necessary
        if ($etudiant !== null && $etudiant->getAdresseEtudiant() !== $this) {
            $etudiant->setAdresseEtudiant($this);
        }

        $this->etudiant = $etudiant;

        return $this;
    }

    public function getStageEtudiant(): ?StageEtudiant
    {
        return $this->stageEtudiant;
    }

    public function setStageEtudiant(?StageEtudiant $stageEtudiant): self
    {
        // unset the owning side of the relation if necessary
        if ($stageEtudiant === null && $this->stageEtudiant !== null) {
            $this->stageEtudiant->setAdresseStage(null);
        }

        // set the owning side of the relation if necessary
        if ($stageEtudiant !== null && $stageEtudiant->getAdresseStage() !== $this) {
            $stageEtudiant->setAdresseStage($this);
        }

        $this->stageEtudiant = $stageEtudiant;

        return $this;
    }

    public function getEntreprise(): ?Entreprise
    {
        return $this->entreprise;
    }

    public function setEntreprise(?Entreprise $entreprise): self
    {
        // unset the owning side of the relation if necessary
        if ($entreprise === null && $this->entreprise !== null) {
            $this->entreprise->setAdresse(null);
        }

        // set the owning side of the relation if necessary
        if ($entreprise !== null && $entreprise->getAdresse() !== $this) {
            $entreprise->setAdresse($this);
        }

        $this->entreprise = $entreprise;

        return $this;
    }
}
