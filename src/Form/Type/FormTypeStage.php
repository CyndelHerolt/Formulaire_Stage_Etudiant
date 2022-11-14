<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Controller\FormulaireController;
use App\Entity\StageEtudiant;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Form;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;


class FormTypeStage extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_adresse_stage
            ->add('date_debtut_stage', DateType::class, ['label' => 'Date de début :','help' => 'La date doit être saisie au format "jj/mm/aaaa"','attr' => ['autocomplete'=>'off', 'class' => 'flatdatepicker'], 'widget' => 'single_text', 'html5' => false, 'format' => 'dd/MM/yyyy'])

            ->add('date_fin_stage', DateType::class, ['label' => 'Date de fin  :', 'help' => 'La date doit être saisie au format "jj/mm/aaaa"','attr' => ['autocomplete'=>'off', 'class' => 'flatdatepicker'] ,'widget' => 'single_text', 'html5' => false, 'format' => 'dd/MM/yyyy'])

            ->add('duree_jours_stage', IntegerType::class, ['label' => 'Nombre de jours de stage :', 'help' => 'En jours ouvrés (hors week-end et jours fériés)', 'attr' => ['autocomplete'=>'off']])

            ->add('service_stage_entreprise', TextType::class, ['label' => 'Service dans l\'entreprise :', 'help' => 'Service dans lequel vous effectuerez votre stage','attr' => ['autocomplete'=>'off'] ,'required' => false])

            ->add('sujet_stage', TextareaType::class, ['label' => 'Mission principale :', 'attr' => ['autocomplete'=>'off']])

            ->add('activites', TextareaType::class, ['label' => 'Activités à réaliser :', 'help' => 'Décrivez les missions qui vous seront confiées', 'attr' => ['autocomplete'=>'off']])

            ->add('periodes_interruptions', TextType::class, ['label' => 'Périodes d\'interruptions :', 'help' => 'En complément des périodes déjà prévues', 'attr' => ['autocomplete'=>'off'],'required' => false])

            //todo: changer en nbr décimal
            ->add('duree_hebdomadaire', NumberType::class, ['label' => 'Durée de travail hebdomadaire :', 'attr' => ['autocomplete'=>'off'],'constraints' => [new NotNull(['message' => 'Veuillez renseigner ce champ'])]])

            ->add('commentaire_duree_hebdomadaire', TextareaType::class, ['label' => 'Commentaires sur la durée du travail :', 'help' => 'Toutes précisions nécessaires sur la durée de travail', 'attr' => ['autocomplete'=>'off'],'required' => false])

            ->add('amenagement_stagec', TextareaType::class, ['label' => 'Aménagement du stage :', 'help' => 'Aménagement du temps de travail par exemple (travail de nuit, déplacements, télétravail...)','attr' => ['autocomplete'=>'off'], 'required' => false])

            ->add('gratification', ChoiceType::class, ['label' => 'Gratification :', 'choices' => ['oui' => 'oui', 'non' => 'non'], 'expanded' => true, 'help' => 'Le stage sera-t-il rémunéré ?'])

            ->add('gratification_periode', ChoiceType::class, ['label' => 'Période de gratification :', 'choices' => ['Heure' => 'h', 'Jour' => 'j', 'Mois' => 'm'], 'expanded' => true, 'help' => 'Choisissez la période de calcul de la gratification', 'attr' => ['autocomplete'=>'off']])

            ->add('gratification_montant', NumberType::class, ['label' => 'Montant de la gratification :', 'help' => 'En fonction de la période sélectionnée', 'attr' => ['autocomplete'=>'off']])

            ->add('avantages', TextareaType::class, ['label' => 'Avantages :', 'help' => 'Autres avantages (frais de transports, ...)', 'attr' => ['autocomplete'=>'off'],'required' => false])

            ->add('retour', SubmitType::class, ['label' => 'Etape précédente'])

            ->add('suivant', SubmitType::class, ['label' => 'Etape suivante']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StageEtudiant::class,
        ]);
    }
}
