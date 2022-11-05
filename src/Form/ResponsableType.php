<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ResponsableType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, ['label' => 'Prénom * :', 'required' => false, 'attr' => ['autocomplete' => 'off']])
            ->add('nom', TextType::class, ['label' => 'Nom * :', 'required' => false, 'attr' => ['autocomplete' => 'off']])
            ->add('fonction', TextType::class, ['label' => 'Fonction dans l\'entreprise * :', 'required' => false, 'attr' => ['autocomplete' => 'off']])
            ->add('email', EmailType::class, ['label' => 'Email :', 'required' => false, 'attr' => ['autocomplete' => 'off']])
            ->add('telephone', IntegerType::class, ['label' => 'Téléphone :', 'required' => false, 'attr' => ['autocomplete' => 'off']])
            ->add('portable', IntegerType::class, ['label' => 'Portable * :', 'required' => false, 'attr' => ['autocomplete' => 'off']])
            ->add('retour', SubmitType::class, ['label' => 'Etape précédente', 'attr' => ['class' => 'btn-precedent']])
            ->add('suivant', SubmitType::class, ['label' => 'Etape suivante', 'attr' => ['class' => 'btn-suivant']]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}