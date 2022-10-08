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


Class FormTypeStage extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_adresse_stage
            ->add('debut_stage', DateType::class, ['label' => 'Date de début * :'])
            ->add('fin_stage', DateType::class, ['label' => 'Date de fin  * :'])
            ->add('nbjour_stage', IntegerType::class, ['label' => 'Nombre de jour de stage * :'])
            ->add('service_stage', TextType::class, ['label' => 'Service dans l\'entreprise :', 'required' => false])
            ->add('mission_stage', TextareaType::class, ['label' => 'Mission principale * :'])
            ->add('activites_stage', TextareaType::class, ['label' => 'Activités à réaliser * :'])
            ->add('interruptions_stage', TextType::class, ['label' => 'Périodes d\'interruptions :', 'required' => false])
            ->add('dth_stage', NumberType::class, ['label' => 'Durée de travail hebdomadaire * :'])
            ->add('commdth_stage', TextareaType::class, ['label' => 'Commentaires sur la durée du travail :', 'required' => false])
            ->add('amenagement_stage', TextareaType::class, ['label' => 'Aménagement du stage :', 'required' => false])
            ->add('gratif_stage', ChoiceType::class, ['label' => 'Gratification * :', 'choices' => ['oui' => 'oui', 'non' => 'non'], 'expanded'=>true])
            ->add('periodegratif_stage', ChoiceType::class, ['label' => 'Période de gratification * :','choices' => ['h' => 'Heure','j' => 'Jour', 'm' => 'Mois']])
            ->add('montantgratif_stage', NumberType::class, ['label' => 'Montant de la gratification * :'])
            ->add('avantages_stage', TextareaType::class, ['label' => 'Avantages :', 'required' => false])
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
