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
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

class TuteurType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('prenom', TextType::class, ['label' => 'Prénom * :'])

            ->add('nom', TextType::class, ['label' => 'Nom * :'])

            ->add('fonction', TextType::class, ['label' => 'Fonction dans l\'entreprise * :'])

            ->add('email', EmailType::class, ['label' => 'Email :', 'required' => false, 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ'), new Email(message: 'Veuiilez renseigner un email valide')]])

            ->add('telephone', IntegerType::class, ['label' => 'Téléphone :', 'required' => false])

            ->add('portable', IntegerType::class, ['label' => 'Portable * :']);

    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}