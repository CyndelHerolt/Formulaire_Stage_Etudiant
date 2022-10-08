<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Entity\Formulaire;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

Class FormTypeResponsable extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_responsable
            ->add('prenom_responsable', TextType::class, ['label' => 'Prénom * :'])
            ->add('nom_responsable', TextType::class, ['label' => 'Nom * :'])
            ->add('fonction_responsable', TextType::class, ['label' => 'Fonction dans l\'entreprise * :'])
            ->add('email_responsable', EmailType::class, ['label' => 'Email :', 'required' => false])
            ->add('tel_responsable', IntegerType::class, ['label' => 'Téléphone :', 'required' => false])
            ->add('portable_responsable', IntegerType::class, ['label' => 'Portable * :'])
            ->add('fax_responsable', TextType::class, ['label' => 'Fax :'])
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