<?php

namespace App\Entity;

use App\Repository\FormulaireRepository;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: FormulaireRepository::class)]
class Formulaire
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: Types::INTEGER, nullable: false)]
    protected $id;

    //---------------------------DATA VOUS---------------------------
    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $nom_secu;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $adss_secu;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $adresse_vous;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $suite_adresse_vous;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $complement_adresse_vous;

    #[ORM\Column(type: Types::INTEGER, nullable: true,length: 100)]
    protected $cp_vous;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $ville_vous;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $pays_vous;

    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $email_vous;

    #[ORM\Column(type: Types::INTEGER, nullable: true,length: 100)]
    protected $tel_vous;

    //---------------------------DATA ENTREPRISE---------------------------
    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $raison_sociale;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    protected $siret;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $adresse_entreprise;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $suite_adresse_entreprise;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $complement_adresse_entreprise;

    #[ORM\Column(type: Types::INTEGER, nullable: true,length: 100)]
    protected $cp_entreprise;

    #[ORM\Column(type: Types::INTEGER, nullable: true,length: 100)]
    protected $ville_entreprise;

    #[ORM\Column(type: Types::INTEGER, nullable: true,length: 100)]
    protected $pays_entreprise;

    //---------------------------DATA RESPONSABLE---------------------------
    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $prenom_responsable;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $nom_responsable;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $fonction_responsable;

    #[Assert\Email(
        message: 'The email {{ value }} is not a valid email.',
    )]
    #[ORM\Column(type: Types::STRING, nullable: true)]
    protected $email_responsable;

    #[Assert\Length(
        min: 10,
        max: 10,
    )]
    #[ORM\Column(type: Types::INTEGER, nullable: true,length: 100)]
    protected $tel_responsable;

    #[Assert\Length(
        min: 10,
        max: 10,
    )]
    #[ORM\Column(type: Types::INTEGER, nullable: true,length: 100)]
    protected $portable_responsable;

    #[ORM\Column(type: Types::INTEGER, nullable: true,length: 100)]
    protected $fax_responsable;

    //---------------------------DATA TUTEUR---------------------------

        #[ORM\Column(type: Types::STRING, nullable: false,length: 100)]
    protected $prenom_tuteur;


        #[ORM\Column(type: Types::STRING, nullable: true)]
    protected $nom_tuteur;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    protected $fonction_tuteur;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    protected $email_tuteur;

    #[Assert\Length(
        min: 10,
        max: 10,
    )]
    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    protected $tel_tuteur;

    #[Assert\Length(
        min: 10,
        max: 10,
    )]
    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    protected $portable_tuteur;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    protected $fax_tuteur;

    //---------------------------DATA ADRESSE STAGE---------------------------

    #[ORM\Column(type: Types::STRING, nullable: true)]
    protected $adresse_stage;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    protected $suite_adresse_stage;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    protected $complement_adresse_stage;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    protected $cp_stage;

    #[ORM\Column(type: Types::STRING, nullable: true)]
    protected $ville_stage;

    //---------------------------DATA STAGE---------------------------
    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    protected $debut_stage;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    protected $fin_stage;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    protected $nbjour_stage;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $service_stage;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 500)]
    protected $mission_stage;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 500)]
    protected $activites_stage;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $interruptions_stage;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    protected $dth_stage;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 500)]
    protected $commdth_stage;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $amenagement_stage;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $gratif_stage;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $periodegratif_stage;

    #[ORM\Column(type: Types::INTEGER, nullable: true)]
    protected $montantgratif_stage;

    #[ORM\Column(type: Types::STRING, nullable: true,length: 100)]
    protected $avantages_stage;

    //----------------------------------GETTERS & SETTERS--------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------


    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getPortableResponsable()
    {
        return $this->portable_responsable;
    }

    /**
     * @param mixed $portable_responsable
     */
    public function setPortableResponsable($portable_responsable): void
    {
        $this->portable_responsable = $portable_responsable;
    }

    public function __toString()
    {
        return $this->nom_secu;
    }

    /**
     * @return mixed
     */
    public function getNomSecu()
    {
        return $this->nom_secu;
    }

    /**
     * @param mixed $nom_secu
     */
    public function setNomSecu($nom_secu): void
    {
        $this->nom_secu = $nom_secu;
    }

    /**
     * @return mixed
     */
    public function getAdssSecu()
    {
        return $this->adss_secu;
    }

    /**
     * @param mixed $adss_secu
     */
    public function setAdssSecu($adss_secu): void
    {
        $this->adss_secu = $adss_secu;
    }

    /**
     * @return mixed
     */
    public function getAdresseVous()
    {
        return $this->adresse_vous;
    }

    /**
     * @param mixed $adresse_vous
     */
    public function setAdresseVous($adresse_vous): void
    {
        $this->adresse_vous = $adresse_vous;
    }

    /**
     * @return mixed
     */
    public function getSuiteAdresseVous()
    {
        return $this->suite_adresse_vous;
    }

    /**
     * @param mixed $suite_adresse_vous
     */
    public function setSuiteAdresseVous($suite_adresse_vous): void
    {
        $this->suite_adresse_vous = $suite_adresse_vous;
    }

    /**
     * @return mixed
     */
    public function getComplementAdresseVous()
    {
        return $this->complement_adresse_vous;
    }

    /**
     * @param mixed $complement_adresse_vous
     */
    public function setComplementAdresseVous($complement_adresse_vous): void
    {
        $this->complement_adresse_vous = $complement_adresse_vous;
    }

    /**
     * @return mixed
     */
    public function getCpVous()
    {
        return $this->cp_vous;
    }

    /**
     * @param mixed $cp_vous
     */
    public function setCpVous($cp_vous): void
    {
        $this->cp_vous = $cp_vous;
    }

    /**
     * @return mixed
     */
    public function getVilleVous()
    {
        return $this->ville_vous;
    }

    /**
     * @param mixed $ville_vous
     */
    public function setVilleVous($ville_vous): void
    {
        $this->ville_vous = $ville_vous;
    }

    /**
     * @return mixed
     */
    public function getPaysVous()
    {
        return $this->pays_vous;
    }

    /**
     * @param mixed $pays_vous
     */
    public function setPaysVous($pays_vous): void
    {
        $this->pays_vous = $pays_vous;
    }

    /**
     * @return mixed
     */
    public function getEmailVous()
    {
        return $this->email_vous;
    }

    /**
     * @param mixed $email_vous
     */
    public function setEmailVous($email_vous): void
    {
        $this->email_vous = $email_vous;
    }

    /**
     * @return mixed
     */
    public function getTelVous()
    {
        return $this->tel_vous;
    }

    /**
     * @param mixed $tel_vous
     */
    public function setTelVous($tel_vous): void
    {
        $this->tel_vous = $tel_vous;
    }

    /**
     * @return mixed
     */
    public function getRaisonSociale()
    {
        return $this->raison_sociale;
    }

    /**
     * @param mixed $raison_sociale
     */
    public function setRaisonSociale($raison_sociale): void
    {
        $this->raison_sociale = $raison_sociale;
    }

    /**
     * @return mixed
     */
    public function getSiret()
    {
        return $this->siret;
    }

    /**
     * @param mixed $siret
     */
    public function setSiret($siret): void
    {
        $this->siret = $siret;
    }

    /**
     * @return mixed
     */
    public function getAdresseEntreprise()
    {
        return $this->adresse_entreprise;
    }

    /**
     * @param mixed $adresse_entreprise
     */
    public function setAdresseEntreprise($adresse_entreprise): void
    {
        $this->adresse_entreprise = $adresse_entreprise;
    }

    /**
     * @return mixed
     */
    public function getSuiteAdresseEntreprise()
    {
        return $this->suite_adresse_entreprise;
    }

    /**
     * @param mixed $suite_adresse_entreprise
     */
    public function setSuiteAdresseEntreprise($suite_adresse_entreprise): void
    {
        $this->suite_adresse_entreprise = $suite_adresse_entreprise;
    }

    /**
     * @return mixed
     */
    public function getComplementAdresseEntreprise()
    {
        return $this->complement_adresse_entreprise;
    }

    /**
     * @param mixed $complement_adresse_entreprise
     */
    public function setComplementAdresseEntreprise($complement_adresse_entreprise): void
    {
        $this->complement_adresse_entreprise = $complement_adresse_entreprise;
    }

    /**
     * @return mixed
     */
    public function getCpEntreprise()
    {
        return $this->cp_entreprise;
    }

    /**
     * @param mixed $cp_entreprise
     */
    public function setCpEntreprise($cp_entreprise): void
    {
        $this->cp_entreprise = $cp_entreprise;
    }

    /**
     * @return mixed
     */
    public function getVilleEntreprise()
    {
        return $this->ville_entreprise;
    }

    /**
     * @param mixed $ville_entreprise
     */
    public function setVilleEntreprise($ville_entreprise): void
    {
        $this->ville_entreprise = $ville_entreprise;
    }

    /**
     * @return mixed
     */
    public function getPaysEntreprise()
    {
        return $this->pays_entreprise;
    }

    /**
     * @param mixed $pays_entreprise
     */
    public function setPaysEntreprise($pays_entreprise): void
    {
        $this->pays_entreprise = $pays_entreprise;
    }

    /**
     * @return mixed
     */
    public function getPrenomResponsable()
    {
        return $this->prenom_responsable;
    }

    /**
     * @param mixed $prenom_responsable
     */
    public function setPrenomResponsable($prenom_responsable): void
    {
        $this->prenom_responsable = $prenom_responsable;
    }

    /**
     * @return mixed
     */
    public function getNomResponsable()
    {
        return $this->nom_responsable;
    }

    /**
     * @param mixed $nom_responsable
     */
    public function setNomResponsable($nom_responsable): void
    {
        $this->nom_responsable = $nom_responsable;
    }

    /**
     * @return mixed
     */
    public function getFonctionResponsable()
    {
        return $this->fonction_responsable;
    }

    /**
     * @param mixed $fonction_responsable
     */
    public function setFonctionResponsable($fonction_responsable): void
    {
        $this->fonction_responsable = $fonction_responsable;
    }

    /**
     * @return mixed
     */
    public function getEmailResponsable()
    {
        return $this->email_responsable;
    }

    /**
     * @param mixed $email_responsable
     */
    public function setEmailResponsable($email_responsable): void
    {
        $this->email_responsable = $email_responsable;
    }

    /**
     * @return mixed
     */
    public function getTelResponsable()
    {
        return $this->tel_responsable;
    }

    /**
     * @param mixed $tel_responsable
     */
    public function setTelResponsable($tel_responsable): void
    {
        $this->tel_responsable = $tel_responsable;
    }

    /**
     * @return mixed
     */
    public function getFaxResponsable()
    {
        return $this->fax_responsable;
    }

    /**
     * @param mixed $fax_responsable
     */
    public function setFaxResponsable($fax_responsable): void
    {
        $this->fax_responsable = $fax_responsable;
    }

    /**
     * @return mixed
     */
    public function getPrenomTuteur()
    {
        return $this->prenom_tuteur;
    }

    /**
     * @param mixed $prenom_tuteur
     */
    public function setPrenomTuteur($prenom_tuteur): void
    {
        $this->prenom_tuteur = $prenom_tuteur;
    }

    /**
     * @return mixed
     */
    public function getNomTuteur()
    {
        return $this->nom_tuteur;
    }

    /**
     * @param mixed $nom_tuteur
     */
    public function setNomTuteur($nom_tuteur): void
    {
        $this->nom_tuteur = $nom_tuteur;
    }

    /**
     * @return mixed
     */
    public function getFonctionTuteur()
    {
        return $this->fonction_tuteur;
    }

    /**
     * @param mixed $fonction_tuteur
     */
    public function setFonctionTuteur($fonction_tuteur): void
    {
        $this->fonction_tuteur = $fonction_tuteur;
    }

    /**
     * @return mixed
     */
    public function getEmailTuteur()
    {
        return $this->email_tuteur;
    }

    /**
     * @param mixed $email_tuteur
     */
    public function setEmailTuteur($email_tuteur): void
    {
        $this->email_tuteur = $email_tuteur;
    }

    /**
     * @return mixed
     */
    public function getTelTuteur()
    {
        return $this->tel_tuteur;
    }

    /**
     * @param mixed $tel_tuteur
     */
    public function setTelTuteur($tel_tuteur): void
    {
        $this->tel_tuteur = $tel_tuteur;
    }

    /**
     * @return mixed
     */
    public function getPortableTuteur()
    {
        return $this->portable_tuteur;
    }

    /**
     * @param mixed $portable_tuteur
     */
    public function setPortableTuteur($portable_tuteur): void
    {
        $this->portable_tuteur = $portable_tuteur;
    }

    /**
     * @return mixed
     */
    public function getFaxTuteur()
    {
        return $this->fax_tuteur;
    }

    /**
     * @param mixed $fax_tuteur
     */
    public function setFaxTuteur($fax_tuteur): void
    {
        $this->fax_tuteur = $fax_tuteur;
    }

    /**
     * @return mixed
     */
    public function getAdresseStage()
    {
        return $this->adresse_stage;
    }

    /**
     * @param mixed $adresse_stage
     */
    public function setAdresseStage($adresse_stage): void
    {
        $this->adresse_stage = $adresse_stage;
    }

    /**
     * @return mixed
     */
    public function getSuiteAdresseStage()
    {
        return $this->suite_adresse_stage;
    }

    /**
     * @param mixed $suite_adresse_stage
     */
    public function setSuiteAdresseStage($suite_adresse_stage): void
    {
        $this->suite_adresse_stage = $suite_adresse_stage;
    }

    /**
     * @return mixed
     */
    public function getComplementAdresseStage()
    {
        return $this->complement_adresse_stage;
    }

    /**
     * @param mixed $complement_adresse_stage
     */
    public function setComplementAdresseStage($complement_adresse_stage): void
    {
        $this->complement_adresse_stage = $complement_adresse_stage;
    }

    /**
     * @return mixed
     */
    public function getCpStage()
    {
        return $this->cp_stage;
    }

    /**
     * @param mixed $cp_stage
     */
    public function setCpStage($cp_stage): void
    {
        $this->cp_stage = $cp_stage;
    }

    /**
     * @return mixed
     */
    public function getVilleStage()
    {
        return $this->ville_stage;
    }

    /**
     * @param mixed $ville_stage
     */
    public function setVilleStage($ville_stage): void
    {
        $this->ville_stage = $ville_stage;
    }

    /**
     * @return mixed
     */
    public function getDebutStage()
    {
        return $this->debut_stage;
    }

    /**
     * @param mixed $debut_stage
     */
    public function setDebutStage($debut_stage): void
    {
        $this->debut_stage = $debut_stage;
    }

    /**
     * @return mixed
     */
    public function getFinStage()
    {
        return $this->fin_stage;
    }

    /**
     * @param mixed $fin_stage
     */
    public function setFinStage($fin_stage): void
    {
        $this->fin_stage = $fin_stage;
    }

    /**
     * @return mixed
     */
    public function getNbjourStage()
    {
        return $this->nbjour_stage;
    }

    /**
     * @param mixed $nbjour_stage
     */
    public function setNbjourStage($nbjour_stage): void
    {
        $this->nbjour_stage = $nbjour_stage;
    }

    /**
     * @return mixed
     */
    public function getServiceStage()
    {
        return $this->service_stage;
    }

    /**
     * @param mixed $service_stage
     */
    public function setServiceStage($service_stage): void
    {
        $this->service_stage = $service_stage;
    }

    /**
     * @return mixed
     */
    public function getMissionStage()
    {
        return $this->mission_stage;
    }

    /**
     * @param mixed $mission_stage
     */
    public function setMissionStage($mission_stage): void
    {
        $this->mission_stage = $mission_stage;
    }

    /**
     * @return mixed
     */
    public function getActivitesStage()
    {
        return $this->activites_stage;
    }

    /**
     * @param mixed $activites_stage
     */
    public function setActivitesStage($activites_stage): void
    {
        $this->activites_stage = $activites_stage;
    }

    /**
     * @return mixed
     */
    public function getInterruptionsStage()
    {
        return $this->interruptions_stage;
    }

    /**
     * @param mixed $interruptions_stage
     */
    public function setInterruptionsStage($interruptions_stage): void
    {
        $this->interruptions_stage = $interruptions_stage;
    }

    /**
     * @return mixed
     */
    public function getDthStage()
    {
        return $this->dth_stage;
    }

    /**
     * @param mixed $dth_stage
     */
    public function setDthStage($dth_stage): void
    {
        $this->dth_stage = $dth_stage;
    }

    /**
     * @return mixed
     */
    public function getCommdthStage()
    {
        return $this->commdth_stage;
    }

    /**
     * @param mixed $commdth_stage
     */
    public function setCommdthStage($commdth_stage): void
    {
        $this->commdth_stage = $commdth_stage;
    }

    /**
     * @return mixed
     */
    public function getAmenagementStage()
    {
        return $this->amenagement_stage;
    }

    /**
     * @param mixed $amenagement_stage
     */
    public function setAmenagementStage($amenagement_stage): void
    {
        $this->amenagement_stage = $amenagement_stage;
    }

    /**
     * @return mixed
     */
    public function getGratifStage()
    {
        return $this->gratif_stage;
    }

    /**
     * @param mixed $gratif_stage
     */
    public function setGratifStage($gratif_stage): void
    {
        $this->gratif_stage = $gratif_stage;
    }

    /**
     * @return mixed
     */
    public function getPeriodegratifStage()
    {
        return $this->periodegratif_stage;
    }

    /**
     * @param mixed $periodegratif_stage
     */
    public function setPeriodegratifStage($periodegratif_stage): void
    {
        $this->periodegratif_stage = $periodegratif_stage;
    }

    /**
     * @return mixed
     */
    public function getMontantgratifStage()
    {
        return $this->montantgratif_stage;
    }

    /**
     * @param mixed $montantgratif_stage
     */
    public function setMontantgratifStage($montantgratif_stage): void
    {
        $this->montantgratif_stage = $montantgratif_stage;
    }

    /**
     * @return mixed
     */
    public function getAvantagesStage()
    {
        return $this->avantages_stage;
    }

    /**
     * @param mixed $avantages_stage
     */
    public function setAvantagesStage($avantages_stage): void
    {
        $this->avantages_stage = $avantages_stage;
    }

}
