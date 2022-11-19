<?php

namespace App\Form;

use App\Entity\Etudiant;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\NotNull;

/**
 * Class EtudiantType.
 */
class EtudiantType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('intituleSecuriteSociale', TextType::class, [
                'label' => 'Organisme de sécurité sociale * :',
                'attr' => ['for' => 'nom de l\'organisme de sécurité soiale'],
//                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')],
                'help' => 'Indiquer "CPAM" pour le régime de sécurité social général ou le nom de votre régime spécial (ou celui de vos parents).'
            ])
            ->add('adresseSecuriteSociale', TextType::class, ['label' => 'Adresse de l\'organisme :', 'attr' => ['for' => 'adresse de l\'organisme de sécurité soiale'], 'help' => 'Uniquement si vous n\'êtes pas au régime général de la sécurité sociale.', 'required' => false])
            ->add('adresseEtudiant', AdresseType::class, ['label' => 'Récapitulatif'])
            ->add('mailPerso', EmailType::class, ['label' => 'Votre email personnel :', 'help' => 'l\'email doit être saisi sous la forme : xxxxxx@xxx.xxx.',
//                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ'), new Email(message: 'Veuillez renseigner un email valide')]
            ])
            ->add('tel2', TextType::class, ['label' => 'Votre numéro de téléphone :', 'help' => 'le numéro de téléphone doit comporter 10 chiffres.',
//                'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ'), new Length(['min' => 10, 'max' => 10, 'exactMessage' => 'Le numéro de téléphone doit comporter 10 chiffres'])]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Etudiant::class,
            'translation_domain' => 'form',
        ]);
    }
}