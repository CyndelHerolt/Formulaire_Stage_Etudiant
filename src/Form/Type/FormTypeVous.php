<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Entity\Formulaire;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotNull;
use Symfony\Component\Validator\Constraints\NotBlank;

class FormTypeVous extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_vous
            ->add('nom_secu', TextType::class, ['label' => 'Organisme de sécurité sociale * :','help' => 'Indiquer "CPAM" pour le régime de sécurité social général ou le nom de votre régime spécial (ou celui de vos parents).', 'required'=>false,
                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])
            ->add('adss_secu', TextType::class, ['label' => 'Adresse de l\'organisme :', 'help' => 'Uniquement si vous n\'êtes pas au régime général de la sécurité sociale.', 'required' => false])
            ->add('adresse_vous', TextType::class, ['label' => 'Votre adresse (numéro, rue) * :', 'required'=>false,
                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])
            ->add('suite_adresse_vous', TextType::class, ['label' => 'Suite adresse (étage, bâtiment, ...) :', 'required' => false])
            ->add('complement_adresse_vous', TextType::class, ['label' => 'Complément d’adresse :', 'required' => false])
            ->add('cp_vous', ChoiceType::class, ['label' => 'Code Postal * :', 'choices' => ['API' => 'API'], 'required'=>false,
                'constraints' => [new NotNull(message: 'Veuillez renseigner ce champ')]])
            ->add('ville_vous', TextType::class, ['label' => 'Ville * :', 'required'=>false,
                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])
            ->add('pays_vous', CountryType::class, ['label' => 'Pays * :', 'required'=>false,
                'constraints' => [new NotNull(message: 'Veuillez renseigner ce champ')]])
            ->add('email_vous', EmailType::class, ['label' => 'Votre email personnel * :', 'required'=>false,
                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ'), new Email(message: 'Veuiilez renseigner un email valide')]])
            ->add('tel_vous', NumberType::class, ['label' => 'Votre numéro de téléphone * :', 'required'=>false,
                'constraints' => [new NotNull(message: 'Veuillez renseigner ce champ'), new Length(['min' => 10, 'max' => 10, 'exactMessage' => 'Le numéro de téléphone doit comporter 10 chiffres'])]])
            ->add('suivant', SubmitType::class, ['label' => 'Etape suivante', 'attr'=>['data-action'=>"click->formulaire#formvous", "data-bs-toggle"=>"modal", "data-bs-target"=>"#exampleModal"]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formulaire::class,
        ]);
    }

}
