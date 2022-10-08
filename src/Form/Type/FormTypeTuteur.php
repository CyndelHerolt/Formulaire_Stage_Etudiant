<?php

// src/Form/Type/FormTypeTuteur.php
namespace App\Form\Type;

use App\Entity\Formulaire;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

Class FormTypeTuteur extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_responsable
            ->add('recup_informations', SubmitType::class, ['label' => 'Récupérer informations', 'validate'=>false])
            ->add('prenom_tuteur', TextType::class, ['label' => 'Prénom * :'])
            ->add('nom_tuteur', TextType::class, ['label' => 'Nom * :'])
            ->add('fonction_tuteur', TextType::class, ['label' => 'Fonction dans l\'entreprise * :'])
            ->add('email_tuteur', EmailType::class, ['label' => 'Email :', 'required' => false])
            ->add('tel_tuteur', IntegerType::class, ['label' => 'Téléphone :', 'required' => false])
            ->add('portable_tuteur', IntegerType::class, ['label' => 'Portable * :'])
            ->add('fax_tuteur', TextType::class, ['label' => 'Fax :'])
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