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

Class FormTypeEntreprise extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_entreprise
            ->add('raison_sociale', TextType::class, ['label' => 'Raison Sociale * :'])
            ->add('siret', NumberType::class, ['label' => 'N° SIRET :', 'required' => false])
            ->add('adresse_entreprise', TextType::class, ['label' => 'Adresse (rue,numéro) * :'])
            ->add('suite_adresse_entreprise', TextType::class, ['label' => 'Suite Adresse (étage, bâtiment...) * :', 'required' => false])
            ->add('complement_adresse_entreprise', TextType::class, ['label' => 'Complément d\'adressse :', 'required' => false])
            ->add('cp_entreprise', ChoiceType::class, ['label' => 'Code Postal * :', 'choices' => ['API' => 'API']])
            ->add('ville_entreprise', TextType::class, ['label' => 'Ville * :'])
            ->add('pays_entreprise', CountryType::class, ['label' => 'Pays * :'])
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