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
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

Class FormTypeTuteur extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_responsable
            ->add('recup_informations', SubmitType::class, ['label' => 'Récupérer informations', 'validate'=>false])
            ->add('prenom_tuteur', TextType::class, ['label' => 'Prénom * :', 'constraints' => [new NotBlank(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('nom_tuteur', TextType::class, ['label' => 'Nom * :', 'constraints' => [new NotBlank(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('fonction_tuteur', TextType::class, ['label' => 'Fonction dans l\'entreprise * :', 'constraints' => [new NotBlank(['message' => 'Veuillez renseigner ce champ'])]])
            ->add('email_tuteur', EmailType::class, ['label' => 'Email :', 'required' => false, 'constraints' => [new NotBlank(['message' => 'Veuillez renseigner ce champ']), new Email(['message' => 'Veuillez renseigner un email valide'])]])
            ->add('tel_tuteur', IntegerType::class, ['label' => 'Téléphone :', 'required' => false, 'constraints' => [new Length(['min' => 10, 'max' => 10, 'exactMessage' => 'Le numéro de téléphone doit contenir 10 chiffres'])]])
            ->add('portable_tuteur', IntegerType::class, ['label' => 'Portable * :', 'constraints' => [new NotNull(['message' => 'Veuillez renseigner ce champ']), new Length(['min' => 10, 'max' => 10, 'exactMessage' => 'Le numéro de téléphone doit contenir 10 chiffres'])]])
            ->add('fax_tuteur', TextType::class, ['label' => 'Fax :', 'required' => false])
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