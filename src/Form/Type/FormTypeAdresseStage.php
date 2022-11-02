<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Entity\StageEtudiant;
use App\Form\AdresseType;
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
            ->add('recup_informations', SubmitType::class, ['label' => 'Récupérer informations', 'attr' => ['class' => 'btn btn-primary'], 'validate' => false])
            ->add('adresse_stage', AdresseType::class, ['label' => 'Adresse du stage', 'required' => false, 'constraints' => [new NotBlank(['message' => 'Veuillez renseigner une adresse'])]])
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