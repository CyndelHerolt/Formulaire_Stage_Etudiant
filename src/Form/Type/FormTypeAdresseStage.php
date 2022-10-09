<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Entity\Formulaire;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

Class FormTypeAdresseStage extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_adresse_stage
            ->add('recup_informations', SubmitType::class, ['label' => 'Récupérer informations', 'validate'=>false])
            ->add('adresse_stage', TextType::class, ['label' => 'Adresse (numéro, rue) * :'])
            ->add('suite_adresse_stage', TextType::class, ['label' => 'Suite adresse (étage, bâtiment, ...) :', 'required' => false])
            ->add('complement_adresse_stage', TextType::class, ['label' => 'Complément d’adresse :', 'required' => false])
            ->add('cp_stage', ChoiceType::class, ['label' => 'Code Postal * :', 'choices' => ['API' => 'API']])
            ->add('ville_stage', TextType::class, ['label' => 'Ville * :'])
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