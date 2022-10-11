<?php

// src/Controller/FormulaireController.php
namespace App\Controller;

use App\Form\Type\FormTypeAdresseStage;
use App\Form\Type\FormTypeVous;
use App\Form\Type\FormTypeEntreprise;
use App\Form\Type\FormTypeResponsable;
use App\Form\Type\FormTypeStage;
use App\Form\Type\FormTypeTuteur;
use App\Entity\Formulaire;
use App\Repository\FormulaireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireController extends AbstractController
{

    // -------------------------------------------1ERE ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------


    #[Route('/formulaire/vous', name: 'app_formulaire')]
    public function new_form_vous(Request $request, FormulaireRepository $FormulaireRepository): Response
    {
        // creates the objects and initializes some data
        $task = new Formulaire();

        $form = $this->createForm(FormTypeVous::class, $task);

        //var_dump($task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

//            dump($task);
//            die();

            //(obligatoire 1ere fois) $entityManager->persist( $task ); // on déclare une modification de type persist et la génération des différents liens entre entité
            //$entityManager->flush(); // on effectue les différentes modifications sur la base de données
            //Autre manière de procéder

            $FormulaireRepository->save($task);

            return $this->redirectToRoute('app_formulaireEntreprise', ['formulaire' => $task->getId()]);
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_vous' => $form, 'step' => 1]);
    }


    // -------------------------------------------2EME ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------

    #[Route('/formulaire/entreprise/{formulaire}', name: 'app_formulaireEntreprise')]
    public function new_form_entreprise(Request $request, FormulaireRepository $FormulaireRepository, $formulaire): Response
    {
        $formulaire = $FormulaireRepository->find($formulaire);

        $form2 = $this->createForm(FormTypeEntreprise::class, $formulaire);

        $form2->handleRequest($request);
        if ($form2->isSubmitted()) {
//            dump($form2 -> get('retour') -> isClicked());
//            die();
            if ($form2->get('suivant')->isClicked() && $form2->isValid()) {
                $FormulaireRepository->save($formulaire);
                return $this->redirectToRoute('app_formulaireResponsable', ['formulaire' => $formulaire->getId()]);
            } else {
                return $this->redirectToRoute('app_formulaire', ['formulaire' => $formulaire->getId()]);
            }
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_entreprise' => $form2, 'step' => 2, 'formulaire' => $formulaire]);
    }

    // -------------------------------------------3EME ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------

    #[Route('/formulaire/responsable/{formulaire}', name: 'app_formulaireResponsable')]
    public function new_form_responsable(Request $request, FormulaireRepository $FormulaireRepository, $formulaire): Response
    {
        $formulaire = $FormulaireRepository->find($formulaire);

        $form3 = $this->createForm(FormTypeResponsable::class, $formulaire);

        $form3->handleRequest($request);
        if ($form3->isSubmitted()) {
//            dump($form2 -> get('retour') -> isClicked());
//            die();

            //Si clic sur "retour"
            if ($form3->get('retour')->isClicked()) {
                //Alors location->formulaire/entreprise
                return $this->redirectToRoute('app_formulaireEntreprise', ['formulaire' => $formulaire->getId()]);
            } //Si clic sur "suivant"
            else {
                $FormulaireRepository->save($formulaire);
                return $this->redirectToRoute('app_formulaireTuteur', ['formulaire' => $formulaire->getId()]);
            }
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_responsable' => $form3, 'step' => 3, 'formulaire' => $formulaire]);
    }

    // -------------------------------------------4EME ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------

    #[Route('/formulaire/tuteur/{formulaire}', name: 'app_formulaireTuteur')]
    public function new_form_tuteur(Request $request, FormulaireRepository $FormulaireRepository, $formulaire): Response
    {
        $formulaire = $FormulaireRepository->find($formulaire);


        $form4 = $this->createForm(FormTypeTuteur::class, $formulaire);

        $form4->handleRequest($request);

        if ($form4->isSubmitted()) {
//            dump($form2 -> get('retour') -> isClicked());
//            die();
            if ($form4->get('suivant')->isClicked()) {
                $FormulaireRepository->save($formulaire);
                return $this->redirectToRoute('app_formulaireAdresseStage', ['formulaire' => $formulaire->getId()]);
            } elseif ($form4->get('retour')->isClicked()) {
                return $this->redirectToRoute('app_formulaireResponsable', ['formulaire' => $formulaire->getId()]);
            } elseif ($form4->get('recup_informations')->isClicked()) {
                $formulaire->setPrenomTuteur($formulaire->getPrenomResponsable());
                $formulaire->setNomTuteur($formulaire->getNomResponsable());
                $formulaire->setFonctionTuteur($formulaire->getFonctionResponsable());
                $formulaire->setEmailTuteur($formulaire->getEmailResponsable());
                $formulaire->setTelTuteur($formulaire->getTelResponsable());
                $formulaire->setPortableTuteur($formulaire->getPortableResponsable());
                $formulaire->setFaxTuteur($formulaire->getFaxResponsable());
                $form4 = $this->createForm(FormTypeTuteur::class, $formulaire);
            }
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_tuteur' => $form4, 'step' => 4, 'formulaire' => $formulaire]);
    }

    // -------------------------------------------5EME ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------


    #[Route('/formulaire/adresse_stage/{formulaire}', name: 'app_formulaireAdresseStage')]
    public function new_form_adresse_stage(Request $request, FormulaireRepository $FormulaireRepository, $formulaire): Response
    {
        $formulaire = $FormulaireRepository->find($formulaire);

        $form5 = $this->createForm(FormTypeAdresseStage::class, $formulaire);

        $form5->handleRequest($request);
        if ($form5->isSubmitted() && $form5->isValid()) {

            //Si clic sur "retour"
            if ($form5->get('suivant')->isClicked()) {
                //Alors location->formulaire/entreprise
                $FormulaireRepository->save($formulaire);
                return $this->redirectToRoute('app_formulaireStage', ['formulaire' => $formulaire->getId()]);
            } //Si clic sur "suivant"
            elseif ($form5->get('retour')->isClicked()) {
                return $this->redirectToRoute('app_formulaireTuteur', ['formulaire' => $formulaire->getId()]);
            } elseif ($form5->get('recup_informations')->isClicked()) {
                $formulaire->setAdresseStage($formulaire->getAdresseEntreprise());
                $formulaire->setSuiteAdresseStage($formulaire->getSuiteAdresseEntreprise());
                $formulaire->setComplementAdresseStage($formulaire->getComplementAdresseEntreprise());
                $formulaire->setCpStage($formulaire->getCpEntreprise());
                $formulaire->setVilleStage($formulaire->getVilleEntreprise());
                $form5 = $this->createForm(FormTypeAdresseStage::class, $formulaire);
            }


        }

        return $this->renderForm('formulaire/index.html.twig', ['form_adss_stage' => $form5, 'step' => 5, 'formulaire' => $formulaire]);
    }


    #[Route('/formulaire/stage/{formulaire}', name: 'app_formulaireStage')]
    public function new_form_stage(Request $request, FormulaireRepository $FormulaireRepository, $formulaire): Response
    {
        $formulaire = $FormulaireRepository->find($formulaire);

        $form6 = $this->createForm(FormTypeStage::class, $formulaire);

        $form6->handleRequest($request);
        if ($form6->isSubmitted() && $form6->isValid()) {

            //Si clic sur "retour"
            if ($form6->get('retour')->isClicked()) {
                //Alors location->formulaire/entreprise
                return $this->redirectToRoute('app_formulaireAdresseStage', ['formulaire' => $formulaire->getId()]);
            } //Si clic sur "suivant"
            else {
                $FormulaireRepository->save($formulaire);
                return $this->redirectToRoute('final', ['formulaire' => $formulaire->getId()]);
            }
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_stage' => $form6, 'step' => 6, 'formulaire' => $formulaire]);
    }


    #[Route('/formulaire/final/{formulaire}', name: 'final')]
    public function index(Request $request, FormulaireRepository $FormulaireRepository, $formulaire): Response
    {
        $formulaire = $FormulaireRepository->find($formulaire);

        $form6 = $this->createForm(FormTypeStage::class, $formulaire);

        $form6->handleRequest($request);
        if ($form6->isSubmitted() && $form6->isValid()) {

            //Si clic sur "retour"
            if ($form6->get('retour')->isClicked()) {
                //Alors location->formulaire/entreprise
                return $this->redirectToRoute('app_formulaireAdresseStage', ['formulaire' => $formulaire->getId()]);
            } //Si clic sur "suivant"
            else {
                $FormulaireRepository->save($formulaire);
                return $this->redirectToRoute('app_formulaire', ['formulaire' => $formulaire->getId()]);
            }
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_stage' => $form6, 'step' => 7, 'formulaire' => $formulaire]);
    }
}



