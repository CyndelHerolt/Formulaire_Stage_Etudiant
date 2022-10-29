<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Entity\Etudiant;
use App\Entity\StageEtudiant;
use App\Form\AdresseType;
use App\Form\EtudiantType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
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
                ->add('etudiant', EtudiantType::class, ['label' => 'Vos informations', 'required' => false])

            ->add('suivant', SubmitType::class, ['label' => 'Etape suivante', 'attr'=>['data-action'=>"click->formulaire#formvous", "data-bs-toggle"=>"modal", "data-bs-target"=>"#exampleModal"]]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StageEtudiant::class,
        ]);
    }

}
