<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

//@deprecated

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom * :', 'attr' => ['autocomplete'=>'off']])

            ->add('prenom', TextType::class, ['label' => 'Prénom * :', 'attr' => ['autocomplete'=>'off']])

            ->add('fonction', TextType::class, ['label' => 'Fonction dans l\'entreprise * :', 'attr' => ['autocomplete'=>'off']])

            ->add('telephone', IntegerType::class, ['label' => 'Téléphone :', 'required' => false, 'attr' => ['autocomplete'=>'off']])

            ->add('email', EmailType::class, ['label' => 'Email :', 'required' => false, 'attr' => ['autocomplete'=>'off']])

            ->add('portable', IntegerType::class, ['label' => 'Portable * :', 'attr' => ['autocomplete'=>'off']])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
