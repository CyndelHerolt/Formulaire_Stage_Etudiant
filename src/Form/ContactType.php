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

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom', TextType::class, ['label' => 'Nom * :', 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])

            ->add('prenom', TextType::class, ['label' => 'Prénom * :', 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])

            ->add('fonction', TextType::class, ['label' => 'Fonction dans l\'entreprise * :', 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])

            ->add('telephone', IntegerType::class, ['label' => 'Téléphone :', 'required' => false, 'constraints' => [new Length(min: 10, max: 10, exactMessage: 'Le numéro de téléphone doit contenir 10 chiffres')]])

            ->add('email', EmailType::class, ['label' => 'Email :', 'required' => false, 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ'), new Email(message: 'Veuiilez renseigner un email valide')]])

            ->add('portable', IntegerType::class, ['label' => 'Portable * :', 'constraints' => [new NotNull(message: 'Veuillez renseigner ce champ'), new Length(min: 10, max: 10, exactMessage: 'Le numéro de téléphone doit contenir 10 chiffres')]])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
