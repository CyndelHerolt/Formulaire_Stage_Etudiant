<?php

namespace App\Entity;

use App\Repository\EtudiantRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EtudiantRepository::class)]
class Etudiant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\OneToOne(inversedBy: 'etudiant', cascade: ['persist', 'remove'])]
    private ?Adresse $adresseEtudiant = null;

    #[ORM\OneToMany(mappedBy: 'etudiant', targetEntity: StageEtudiant::class)]
    private Collection $stageEtudiants;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $intituleSecuriteSociale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $adresseSecuriteSociale = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $mail_perso = null;

    #[ORM\Column(length: 20, nullable: true)]
    private ?string $tel2 = null;


    public function __construct()
    {
        $this->stageEtudiants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @param Collection $stageEtudiants
     */
    public function setStageEtudiants(Collection $stageEtudiants): void
    {
        $this->stageEtudiants = $stageEtudiants;
    }

    public function getIntituleSecuriteSociale(): ?string
    {
        return $this->intituleSecuriteSociale;
    }

    public function setIntituleSecuriteSociale(?string $intituleSecuriteSociale): self
    {
        $this->intituleSecuriteSociale = $intituleSecuriteSociale;

        return $this;
    }

    public function getAdresseSecuriteSociale(): ?string
    {
        return $this->adresseSecuriteSociale;
    }

    public function setAdresseSecuriteSociale(?string $adresseSecuriteSociale): self
    {
        $this->adresse_securite_sociale = $adresseSecuriteSociale;

        return $this;
    }

    public function getMailPerso(): ?string
    {
        return $this->mail_perso;
    }

    public function setMailPerso(?string $mail_perso): self
    {
        $this->mail_perso = $mail_perso;

        return $this;
    }

    public function getTel2(): ?string
    {
        return $this->tel2;
    }

    public function setTel2(?string $tel2): self
    {
        $this->tel2 = $tel2;

        return $this;
    }

    public function getAdresseEtudiant(): ?adresse
    {
        return $this->adresseEtudiant;
    }

    public function setAdresseEtudiant(?adresse $adresseEtudiant): self
    {
        $this->adresseEtudiant = $adresseEtudiant;

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
            $stageEtudiant->setEtudiant($this);
        }

        return $this;
    }

    public function removeStageEtudiant(StageEtudiant $stageEtudiant): self
    {
        if ($this->stageEtudiants->removeElement($stageEtudiant)) {
            // set the owning side to null (unless already changed)
            if ($stageEtudiant->getEtudiant() === $this) {
                $stageEtudiant->setEtudiant(null);
            }
        }

        return $this;
    }
}
