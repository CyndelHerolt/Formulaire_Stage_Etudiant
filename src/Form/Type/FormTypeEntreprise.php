<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Entity\Formulaire;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

Class FormTypeEntreprise extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_entreprise
            ->add('raison_sociale', TextType::class, ['label' => 'Raison Sociale * :', 'help'=>'La raison sociale est le nom de l’entreprise ou de l’organisme', 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])
            ->add('siret', NumberType::class, ['label' => 'N° SIRET :', 'help' => 'Le siret est obligatoire pour toutes les entreprises, sauf pour les organismes publics.' ,'required' => false])
            ->add('adresse_entreprise', TextType::class, ['label' => 'Adresse (rue,numéro) * :', 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])
            ->add('suite_adresse_entreprise', TextType::class, ['label' => 'Suite Adresse (étage, bâtiment...) :', 'required' => false])
            ->add('complement_adresse_entreprise', TextType::class, ['label' => 'Complément d\'adressse :', 'required' => false])
            ->add('cp_entreprise', ChoiceType::class, ['label' => 'Code Postal * :', 'choices' => ['API' => 'API'], 'constraints' => [new NotNull(message: 'Veuillez renseigner ce champ')]])
            ->add('ville_entreprise', TextType::class, ['label' => 'Ville * :', 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])
            ->add('pays_entreprise', CountryType::class, ['label' => 'Pays * :', 'constraints' => [new NotNull(message: 'Veuillez renseigner ce champ')]])
            ->add('retour', SubmitType::class, ['label' => 'Etape précédente', ])
            ->add('suivant', SubmitType::class, ['label' => 'Etape suivante']);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formulaire::class,
        ]);
    }
}