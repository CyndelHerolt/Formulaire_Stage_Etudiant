<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Entity\StageEtudiant;
use App\Form\AdresseType;
use App\Form\EntrepriseType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;

Class FormTypeAdresseStage extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_adresse_stage
            ->add('recup_informations', ButtonType::class, ['label' => 'Récupérer informations'])
            ->add('adresse_stage', AdresseType::class, ['label' => 'Adresse du stage', 'required' => false, 'constraints' => [new NotBlank(['message' => 'Veuillez renseigner une adresse'])]])

            ->add('entreprise', EntrepriseType::class)

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