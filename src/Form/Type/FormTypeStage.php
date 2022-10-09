<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Entity\Formulaire;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;


Class FormTypeStage extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_adresse_stage
            ->add('debut_stage', DateType::class, ['label' => 'Date de début * :', 'widget' => 'single_text','format' => 'yyyy-MM-dd  HH:mm','html5' => false, 'constraints' => [new NotBlank(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('fin_stage', DateType::class, ['label' => 'Date de fin  * :',  'widget' => 'single_text','format' => 'yyyy-MM-dd  HH:mm','html5' => false, 'constraints' => [new NotBlank(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('nbjour_stage', IntegerType::class, ['label' => 'Nombre de jour de stage * :', 'help' => 'En jours ouvrés (hors week-end et jours fériés)' ,'constraints' => [new NotNull(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('service_stage', TextType::class, ['label' => 'Service dans l\'entreprise :', 'help' => 'Service dans lequel vous effectuerez votre stage' ,'required' => false])
            ->add('mission_stage', TextareaType::class, ['label' => 'Mission principale * :', 'constraints' => [new NotBlank(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('activites_stage', TextareaType::class, ['label' => 'Activités à réaliser * :', 'help' => 'Décrivez les missions qui vous seront confiées' ,'constraints' => [new NotBlank(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('interruptions_stage', TextType::class, ['label' => 'Périodes d\'interruptions :', 'help' => 'En complément des périodes déjà prévues' ,'required' => false])
            ->add('dth_stage', NumberType::class, ['label' => 'Durée de travail hebdomadaire * :', 'constraints' => [new NotNull(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('commdth_stage', TextareaType::class, ['label' => 'Commentaires sur la durée du travail :', 'help' => 'Toutes précisions nécessaires sur la durée de travail' ,'required' => false])
            ->add('amenagement_stage', TextareaType::class, ['label' => 'Aménagement du stage :', 'help' => 'Aménagement du temps de travail par exemple (travail de nuit, déplacements, télétravail...)' ,'required' => false])
            ->add('gratif_stage', ChoiceType::class, ['label' => 'Gratification * :', 'choices' => ['oui' => 'oui', 'non' => 'non'], 'expanded'=>true, 'help' => 'Le stage sera-t-il rémunéré ?' ,'constraints' => [new NotNull(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('periodegratif_stage', ChoiceType::class, ['label' => 'Période de gratification * :','choices' => ['Heure' => 'heure','Jour' => 'jour', 'Mois' => 'mois'], 'expanded'=>true, 'help' => 'Choisissez la période de calcul de la gratification','constraints' => [new NotNull(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('montantgratif_stage', NumberType::class, ['label' => 'Montant de la gratification * :', 'help' => 'En fonction de la période sélectionnée' ,'constraints' => [new NotNull(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('avantages_stage', TextareaType::class, ['label' => 'Avantages :', 'help' => 'Autres avantages (frais de transports, ...)' ,'required' => false])
            ->add('retour', SubmitType::class, ['label' => 'Etape précédente'])
            ->add('suivant', SubmitType::class, ['label' => 'Etape suivante']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formulaire::class,
        ]);
    }
}
