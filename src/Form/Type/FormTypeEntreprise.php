<?php

// src/Form/Type/Formype.php
namespace App\Form\Type;

use App\Entity\StageEtudiant;
use App\Form\EntrepriseType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class FormTypeEntreprise extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            //form_entreprise
            ->add('entreprise', EntrepriseType::class,
                [
                    'label' => 'Entreprise',
                    'required' => false
                ]
            )
            ->add('retour', SubmitType::class, [
                    'label' => 'Etape précédente',
                    'attr' => ['class' => 'btn-precedent']
                ]
            )
            ->add('suivant', SubmitType::class,
                [
                    'label' => 'Etape suivante',
                    'attr' => ['class' => 'btn-suivant']
                ]
            );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => StageEtudiant::class,
        ]);
    }
}