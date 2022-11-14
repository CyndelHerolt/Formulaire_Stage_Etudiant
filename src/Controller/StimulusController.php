<?php

// src/Controller/FormulaireController.php
namespace App\Controller;

use App\Repository\StageEtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StimulusController extends AbstractController
{

    //---------------------------------------------------------------------------
    //-----------------------------MODAL ETUDIANT--------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire/vous_modal/{id}', name: 'app_stimulus_modal_vous')]
    public function modal_vous(StageEtudiantRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_vous.html.twig', ['id' => $id]);
    }

    //---------------------------------------------------------------------------
    //-----------------------------MODAL ENTREPRISE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire/entreprise_modal/{id}', name: 'app_stimulus_modal_entreprise')]
    public function modal_entreprise(StageEtudiantRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_entreprise.html.twig', ['id' => $id]);
    }

    //---------------------------------------------------------------------------
    //-----------------------------MODAL RESPONSABLE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire/responsable_modal/{id}', name: 'app_stimulus_modal_responsable')]
    public function modal_responsable(StageEtudiantRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_responsable.html.twig', ['id' => $id]);
    }

//---------------------------------------------------------------------------
    //-----------------------------MODAL TUTEUR------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire/tuteur_modal/{id}', name: 'app_stimulus_modal_tuteur')]
    public function modal_tuteur(StageEtudiantRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_tuteur.html.twig', ['id' => $id]);
    }
//---------------------------------------------------------------------------
    //-----------------------------MODAL ADRESSE STAGE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire/adresse-stage_modal/{id}', name: 'app_stimulus_modal_adss_stage')]
    public function modal_adresse_stage(StageEtudiantRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_adss_stage.html.twig', ['id' => $id]);
    }
    //---------------------------------------------------------------------------
    //-----------------------------MODAL STAGE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire/stage_modal/{id}', name: 'app_stimulus_modal_stage')]
    public function modal_stage(StageEtudiantRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_stage.html.twig', ['id' => $id]);
    }

}