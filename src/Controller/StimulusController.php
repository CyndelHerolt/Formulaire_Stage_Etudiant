<?php

// src/Controller/FormulaireController.php
namespace App\Controller;

use App\Repository\FormulaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StimulusController extends AbstractController
{
    #[Route('/formulaire-test/vous/{id}', name: 'app_stimulus')]
    public function modal_vous(FormulaireRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_vous.html.twig', ['id' => $id]);
    }

    //---------------------------------------------------------------------------
    //-----------------------------MODAL ENTREPRISE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/entreprise/{id}', name: 'app_stimulus_modal_entreprise')]
    public function modal_entreprise(FormulaireRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_entreprise.html.twig', ['id' => $id]);
    }

    //---------------------------------------------------------------------------
    //-----------------------------MODAL RESPONSABLE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/responsable/{id}', name: 'app_stimulus_modal_responsable')]
    public function modal_responsable(FormulaireRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_responsable.html.twig', ['id' => $id]);
    }

//---------------------------------------------------------------------------
    //-----------------------------MODAL TUTEUR------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/tuteur/{id}', name: 'app_stimulus_modal_tuteur')]
    public function modal_tuteur(FormulaireRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_tuteur.html.twig', ['id' => $id]);
    }
//---------------------------------------------------------------------------
    //-----------------------------MODAL ADRESSE STAGE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/adresse-stage/{id}', name: 'app_stimulus_modal_adss_stage')]
    public function modal_adresse_stage(FormulaireRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_adss_stage.html.twig', ['id' => $id]);
    }
    //---------------------------------------------------------------------------
    //-----------------------------MODAL STAGE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/stage/{id}', name: 'app_stimulus_modal_stage')]
    public function modal_stage(FormulaireRepository $StageEtudiantRepository, $id)
    {

        $id = $StageEtudiantRepository->find($id);


        return $this->render('formulaire/modal_stage.html.twig', ['id' => $id]);
    }

}