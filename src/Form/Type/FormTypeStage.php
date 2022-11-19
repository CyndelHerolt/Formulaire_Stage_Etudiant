<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

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
            ->add('date_debut_stage', DateType::class, ['label' => 'Date de début :', 'attr' => ['class' => 'flatdatepicker'], 'widget' => 'single_text', 'html5' => false, 'format' => 'dd/MM/yyyy'
//                , 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]
            ])
            ->add('date_fin_stage', DateType::class, ['label' => 'Date de fin  :', 'attr' => ['class' => 'flatdatepicker'],
//                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')],
                'widget' => 'single_text', 'html5' => false, 'format' => 'dd/MM/yyyy'])
            ->add('duree_jours_stage', IntegerType::class, ['label' => 'Nombre de jours de stage :', 'help' => 'En jours ouvrés (hors week-end et jours fériés)'
//                , 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]
            ])
            ->add('service_stage_entreprise', TextType::class, ['label' => 'Service dans l\'entreprise :', 'help' => 'Service dans lequel vous effectuerez votre stage', 'required' => false])
            ->add('sujet_stage', TextareaType::class, ['label' => 'Mission principale :',
//                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]
            ])
            ->add('activites', TextareaType::class, ['label' => 'Activités à réaliser :', 'help' => 'Décrivez les missions qui vous seront confiées'])
            ->add('periodes_interruptions', TextType::class, ['label' => 'Périodes d\'interruptions :', 'help' => 'En complément des périodes déjà prévues',
//                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')],
                'required' => false])

            ->add('duree_hebdomadaire', NumberType::class, ['label' => 'Durée de travail hebdomadaire :', 'attr' => ['placeholder' => '35']
//                ,'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]
            ])
            ->add('commentaire_duree_hebdomadaire', TextareaType::class, ['label' => 'Commentaires sur la durée du travail :', 'help' => 'Toutes précisions nécessaires sur la durée de travail', 'required' => false])
            ->add('amenagement_stage', TextareaType::class, ['label' => 'Aménagement du stage :', 'help' => 'Aménagement du temps de travail par exemple (travail de nuit, déplacements, télétravail...)', 'required' => false])
            ->add('gratification', ChoiceType::class, ['label' => 'Gratification :', 'choices' => ['oui' => 'oui', 'non' => 'non'],
//                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')],
                'expanded' => true, 'help' => 'Le stage sera-t-il rémunéré ?'])
            ->add('gratification_periode', ChoiceType::class, ['label' => 'Période de gratification :', 'choices' => ['Heure' => 'h', 'Jour' => 'j', 'Mois' => 'm'], 'expanded' => true, 'help' => 'Choisissez la période de calcul de la gratification',
//                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]
            ])
            ->add('gratification_montant', NumberType::class, ['label' => 'Montant de la gratification :', 'help' => 'En fonction de la période sélectionnée',
//                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')],
                'attr' => ['placeholder' => '3.9']])
            ->add('avantages', TextareaType::class, ['label' => 'Avantages :', 'help' => 'Autres avantages (frais de transports, ...)', 'required' => false])
            ->add('retour', SubmitType::class, ['label' => 'Etape précédente', 'attr' => ['class' => 'btn-precedent']])
            ->add('suivant', SubmitType::class, ['label' => 'Etape suivante', 'attr' => ['class' => 'btn-success']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StageEtudiant::class,
        ]);
    }
}
