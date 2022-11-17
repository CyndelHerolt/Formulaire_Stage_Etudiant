<?php

namespace App\Form;

use App\Entity\Entreprise;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('siret', NumberType::class, ['label' => 'N° SIRET :', 'help' => 'Le siret est obligatoire pour toutes les entreprises, sauf pour les organismes publics.', 'attr' => ['autocomplete'=>'off'], 'required' => false])

            ->add('raison_sociale', TextType::class, ['label' => 'Raison Sociale :', 'help'=>'La raison sociale est le nom de l’entreprise ou de l’organisme',
                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')],
                'attr' => ['autocomplete'=>'off']])

            ->add('adresse', AdresseType::class, ['label' => 'Récapitulatif', 'required' => false]);

//            ->add('responsable', ResponsableType::class, ['label' => 'responsable', 'required' => false]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }
}
