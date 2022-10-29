<?php

namespace App\Entity;

use App\Repository\EntrepriseRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EntrepriseRepository::class)]
class Entreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 30, nullable: true)]
    private ?string $siret = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $raison_sociale = null;

    #[ORM\OneToMany(mappedBy: 'entreprise', targetEntity: StageEtudiant::class)]
    private Collection $stageEtudiants;

    #[ORM\OneToOne(inversedBy: 'entreprise', cascade: ['persist', 'remove'])]
    private ?Adresse $adresse = null;

    #[ORM\ManyToOne(targetEntity: Contact::class, cascade:['persist', 'remove'])]
    private ?Contact $responsable;

    public function __construct()
    {
        $this->stageEtudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSiret(): ?string
    {
        return $this->siret;
    }

    public function setSiret(?string $siret): self
    {
        $this->siret = $siret;

        return $this;
    }

    public function getRaisonSociale(): ?string
    {
        return $this->raison_sociale;
    }

    public function setRaisonSociale(?string $raison_sociale): self
    {
        $this->raison_sociale = $raison_sociale;

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
            $stageEtudiant->setEntreprise($this);
        }

        return $this;
    }

    public function removeStageEtudiant(StageEtudiant $stageEtudiant): self
    {
        if ($this->stageEtudiants->removeElement($stageEtudiant)) {
            // set the owning side to null (unless already changed)
            if ($stageEtudiant->getEntreprise() === $this) {
                $stageEtudiant->setEntreprise(null);
            }
        }

        return $this;
    }

    public function getAdresse(): ?Adresse
    {
        return $this->adresse;
    }

    public function setAdresse(?Adresse $adresse): self
    {
        $this->adresse = $adresse;

        return $this;
    }

    public function getResponsable(): ?Contact
    {
        return $this->responsable;
    }

    public function setResponsable(?Contact $responsable): self
    {
        $this->responsable = $responsable;

        return $this;
    }

}
