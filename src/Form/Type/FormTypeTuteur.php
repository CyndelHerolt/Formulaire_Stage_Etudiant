<?php

// src/Form/Type/FormTypeTuteur.php
namespace App\Form\Type;

use App\Entity\StageEtudiant;
use App\Form\TuteurType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FormTypeTuteur extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_responsable
            ->add('recup_informations', SubmitType::class, ['label' => 'Récupérer informations', 'validate' => false])
            ->add('tuteur', TuteurType::class, ['label' => 'Tuteur', 'required' => false])
            ->add('retour', SubmitType::class, ['label' => 'Etape précédente', 'attr' => ['class' => 'btn-precedent']])
            ->add('suivant', SubmitType::class, ['label' => 'Etape suivante', 'attr' => ['class' => 'btn-suivant']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StageEtudiant::class,
        ]);
    }
}