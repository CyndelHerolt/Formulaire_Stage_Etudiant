<?php

// src/Controller/FormulaireController.php
namespace App\Controller;

use App\Entity\Contact;
use App\Entity\StageEtudiant;
use App\Form\EntrepriseType;
use App\Form\ResponsableType;
use App\Form\TuteurType;
use App\Form\Type\FormTypeAdresseStage;
use App\Form\Type\FormTypeEntreprise;
use App\Form\Type\FormTypeVosInformations;
use App\Form\Type\FormTypeResponsable;
use App\Form\Type\FormTypeStage;
use App\Form\Type\FormTypeTuteur;
use App\Repository\ContactRepository;
use App\Repository\FormulaireRepository;
use App\Repository\StageEtudiantRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormulaireController extends AbstractController
{

    // -------------------------------------------1ERE ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------


    #[Route('/formulaire/vous', name: 'app_formulaire')]
    public function new_form_vous(Request $request, StageEtudiantRepository $stageEtudiantRepository): Response
    {
        // creates the objects and initializes some data
        $task = new StageEtudiant();

        $form = $this->createForm(FormTypeVosInformations::class, $task, [
            'action' => $this->generateUrl('app_formulaire')
        ]);

        //var_dump($task);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

//            dump($task);
//            die();

            //(obligatoire 1ere fois) $entityManager->persist( $task ); // on déclare une modification de type persist et la génération des différents liens entre entité
            //$entityManager->flush(); // on effectue les différentes modifications sur la base de données
            //Autre manière de procéder


            $stageEtudiantRepository->save($task, true);

            return $this->json(['route' => $this->generateUrl('app_formulaireEntreprise', ['id' => $task->getId()])]);
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_vous' => $form, 'step' => 1, 'id' => $task->getId()]);
    }


    // -------------------------------------------2EME ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------

    #[Route('/formulaire/entreprise/{id}', name: 'app_formulaireEntreprise')]
    public function new_form_entreprise(Request $request, StageEtudiantRepository $StageEtudiantRepository, $id): Response
    {
        $id = $StageEtudiantRepository->find($id);

        $form2 = $this->createForm(FormTypeEntreprise::class, $id, [
            'action' => $this->generateUrl('app_formulaireEntreprise', ['id' => $id->getId()])
        ]);

        $form2->handleRequest($request);
        if ($form2->isSubmitted()) {

//            dump($form2);
//            dump($request->request);
//            dump($request->request->get('button'));

            if ($form2->isValid()) {
                $StageEtudiantRepository->save($id, true);

                if ($request->request->get('button') == 'form_type_entreprise_suivant') {
                    return $this->json(['route' => $this->generateUrl('app_formulaireResponsable', ['id' => $id->getId()])]);
                } else {
                    return $this->json(['route' => $this->generateUrl('app_formulaire', ['id' => $id->getId()])]);
                }
            }
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_entreprise' => $form2, 'step' => 2, 'id' => $id]);
    }

    // -------------------------------------------3EME ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------

    #[Route('/formulaire/responsable/{id}', name: 'app_formulaireResponsable')]
    public function new_form_responsable(Request $request, StageEtudiantRepository $StageEtudiantRepository, ContactRepository $contactRepository, $id): Response
    {
        $id = $StageEtudiantRepository->find($id);

//        $responsable = $id->getEntreprise() -> getResponsable();
        $responsable = new Contact();

        $form3 = $this->createForm(ResponsableType::class, $responsable);

        $form3->handleRequest($request);
        if ($form3->isSubmitted()) {
//            dump($form2 -> get('retour') -> isClicked());
//            die();

            if ($form3->isValid()) {
                $contactRepository->save($responsable, true);
                $id->getEntreprise()->setResponsable($responsable);
                $StageEtudiantRepository->save($id, true);

                if ($request->request->get('button') == 'responsable_suivant') {
                    return $this->json(['route' => $this->generateUrl('app_formulaireTuteur', ['id' => $id->getId()])]);
                } else {
                    return $this->json(['route' => $this->generateUrl('app_formulaireEntreprise', ['id' => $id->getId()])]);
                }
            }
        }
        return $this->renderForm('formulaire/index.html.twig', ['form_responsable' => $form3, 'step' => 3, 'id' => $id]);
    }

    // -------------------------------------------4EME ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------

    #[Route('/formulaire/tuteur/{id}', name: 'app_formulaireTuteur')]
    public function new_form_tuteur(Request $request, StageEtudiantRepository $StageEtudiantRepository, ContactRepository $contactRepository, $id): Response
    {
        $id = $StageEtudiantRepository->find($id);

        $form4 = $this->createForm(FormTypeTuteur::class, $id);

        $form4->handleRequest($request);

        if ($form4->isSubmitted()) {

            if ($form4->get('suivant')->isClicked()) {

//                dump($form4);
//                dump($request->request);
//                die();

                $StageEtudiantRepository->save($id, true);
                return $this->redirectToRoute('app_formulaireAdresseStage', ['id' => $id->getId()]);
            } elseif ($form4->get('retour')->isClicked()) {
                return $this->redirectToRoute('app_formulaireResponsable', ['id' => $id->getId()]);
            } elseif ($form4->get('recup_informations')->isClicked()) {
                $id->setTuteur($id->getEntreprise()->getResponsable());
                $form4 = $this->createForm(FormTypeTuteur::class, $id);
            }
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_tuteur' => $form4, 'step' => 4, 'id' => $id]);
    }

    // -------------------------------------------5EME ETAPE-------------------------------------------------
    // ------------------------------------------------------------------------------------------------------
    // ------------------------------------------------------------------------------------------------------


    #[Route('/formulaire/adresse_stage/{id}', name: 'app_formulaireAdresseStage')]
    public function new_form_adresse_stage(Request $request, StageEtudiantRepository $StageEtudiantRepository, $id): Response
    {
        $id = $StageEtudiantRepository->find($id);

        $form5 = $this->createForm(FormTypeAdresseStage::class, $id);

//        if ($request->request->get('button') == 'form_type_adresse_stage_recup_informations') {
//            $id->setAdresseStage($id->getEntreprise()->getAdresse());
//        }

        $form5->handleRequest($request);
        if ($form5->isSubmitted()) {

            if ($form5->isValid()) {
                $StageEtudiantRepository->save($id, true);

                if ($request->request->get('button') == 'form_type_adresse_stage_suivant') {
                    return $this->json(['route' => $this->generateUrl('app_formulaireStage', ['id' => $id->getId()])]);
                } elseif ($request->request->get('button') == 'form_type_adresse_stage_retour') {
                    return $this->json(['route' => $this->generateUrl('app_formulaireTuteur', ['id' => $id->getId()])]);
                }
            }
        }
        return $this->renderForm('formulaire/index.html.twig', ['form_adss_stage' => $form5, 'step' => 5, 'id' => $id]);
    }


    #[Route('/formulaire/stage/{id}', name: 'app_formulaireStage')]
    public function new_form_stage(Request $request, StageEtudiantRepository $StageEtudiantRepository, $id): Response
    {
        $id = $StageEtudiantRepository->find($id);

        $form6 = $this->createForm(FormTypeStage::class, $id);

        $form6->handleRequest($request);
        if ($form6->isSubmitted() && $form6->isValid()) {

            //Si clic sur "retour"
            if ($form6->get('retour')->isClicked()) {
                //Alors location->formulaire/entreprise
                return $this->redirectToRoute('app_formulaireAdresseStage', ['id' => $id->getId()]);
            } //Si clic sur "suivant"
            else {
                $StageEtudiantRepository->save($id, true);
                return $this->redirectToRoute('app_formulaire');
            }
        }

        return $this->renderForm('formulaire/index.html.twig', ['form_stage' => $form6, 'step' => 6, 'id' => $id]);
    }


    #[Route('/calendar', name: 'calendar')]
    public function calculJoursDeStage(Request $request)
    {
        $tab = json_decode($request->getContent(), true);
//        $date_debut = $request->request->get('date1');
//        $date_fin = $request->request->get('date2');
        $date_debut = new \DateTime($tab['date1']);
        $date_fin = new \DateTime($tab['date2']);
        $interval = $date_debut->diff($date_fin);

        $interval = $interval->format('%y') * 365 + $interval->format('%m') * 30 + $interval->format('%d');

//        dump($date_debut);
//            dump($date_fin);
//                dump($interval);

        $annee1 = $date_debut->format('Y');
        $annee2 = $date_fin->format('Y');

        $tab = [];
        for ($i = $annee1; $i <= $annee2; $i++) {
            $easter = easter_date($annee1, CAL_FRENCH); // paque (dimanche)
            $easterDay = (int)date('d', $easter);
            $easterMonth = (int)date('m', $easter);
            $easterYear = (int)date('Y', $easter);

            $lundiPaque = mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear);
            $jeudiAscension = mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear);
            $lundiPentecote = mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear);

            $tabJoursFeries = [
                $i . '-11-01', // toussaints
                $i . '-11-11', // armistice
                $i . '-12-25', // noel
                $i . '-01-01', // jour de l'an
                $i . '-05-01', // fete du travail
                $i . '-05-08', // victoire
                $i . '-07-14', // fete nationale
                $i . '-08-15', // assomption
                date('Y-m-d', $easter), // dimanche de pâque
                date('Y-m-d', $lundiPaque), // lundi de pâque
                date('Y-m-d', $jeudiAscension), // jeudi ascension
                date('Y-m-d', $lundiPentecote), // lundi de pentecote
            ];
            $tab [] = $tabJoursFeries;
        }
        $tabFeries = array_merge(...$tab);

//        dump($tabFeries);

        while ($date_debut <= $date_fin) {
            if (in_array($date_debut->format('Y-m-d'), $tabFeries, true)) {
                $interval--;
            } elseif ($date_debut->format('l') == 'Saturday' || $date_debut->format('l') == 'Sunday') {
                $interval--;
            }
            $date_debut->add(new \DateInterval('P1D'));
        }
        return $this->json(['duree' => $interval]);
    }

}



