<?php

// src/Controller/FormulaireController.php
namespace App\Controller;

use App\Repository\FormulaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class StimulusController extends AbstractController
{
    #[Route('/formulaire-test/vous/{formulaire}', name: 'app_stimulus')]
    public function modal_vous(FormulaireRepository $FormulaireRepository, $formulaire)
    {

            $formulaire=$FormulaireRepository->find($formulaire);


        return $this->render('formulaire/modal_vous.html.twig', ['test'=>$formulaire]);
    }

    //---------------------------------------------------------------------------
    //-----------------------------MODAL ENTREPRISE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/entreprise/{formulaire}', name: 'app_stimulus_modal_entreprise')]
    public function modal_entreprise(FormulaireRepository $FormulaireRepository, $formulaire)
    {

            $formulaire=$FormulaireRepository->find($formulaire);


        return $this->render('formulaire/modal_entreprise.html.twig', ['test'=>$formulaire]);
    }

    //---------------------------------------------------------------------------
    //-----------------------------MODAL RESPONSABLE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/responsable/{formulaire}', name: 'app_stimulus_modal_responsable')]
    public function modal_responsable(FormulaireRepository $FormulaireRepository, $formulaire)
    {

            $formulaire=$FormulaireRepository->find($formulaire);


        return $this->render('formulaire/modal_responsable.html.twig', ['test'=>$formulaire]);
    }

//---------------------------------------------------------------------------
    //-----------------------------MODAL TUTEUR------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/tuteur/{formulaire}', name: 'app_stimulus_modal_tuteur')]
    public function modal_tuteur(FormulaireRepository $FormulaireRepository, $formulaire)
    {

            $formulaire=$FormulaireRepository->find($formulaire);


        return $this->render('formulaire/modal_tuteur.html.twig', ['test'=>$formulaire]);
    }
//---------------------------------------------------------------------------
    //-----------------------------MODAL ADRESSE STAGE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/adresse-stage/{formulaire}', name: 'app_stimulus_modal_adss_stage')]
    public function modal_adresse_stage(FormulaireRepository $FormulaireRepository, $formulaire)
    {

            $formulaire=$FormulaireRepository->find($formulaire);


        return $this->render('formulaire/modal_adss_stage.html.twig', ['test'=>$formulaire]);
    }
    //---------------------------------------------------------------------------
    //-----------------------------MODAL STAGE------------------------------
    //---------------------------------------------------------------------------

    #[Route('/formulaire-test/stage/{formulaire}', name: 'app_stimulus_modal_stage')]
    public function modal_stage(FormulaireRepository $FormulaireRepository, $formulaire)
    {

            $formulaire=$FormulaireRepository->find($formulaire);


        return $this->render('formulaire/modal_stage.html.twig', ['test'=>$formulaire]);
    }

}