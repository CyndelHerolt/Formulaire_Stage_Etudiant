<?php

namespace App\Form;

use App\Entity\Adresse;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\Exception\AccessException;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\NotBlank;

/**
 * Class AdresseType.
 */
class AdresseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('adresse1', TextType::class, ['label' => 'Adresse (numéro, rue) * :', 'required' => false])

            ->add('adresse2', TextType::class, ['label' => 'Suite adresse (étage, bâtiment, ...) :', 'required' => false])

            ->add('adresse3', TextType::class, ['label' => 'Complément d’adresse :', 'required' => false])

            ->add('code_postal', TextType::class, ['label' => 'Code Postal * :', 'help' => 'Uniquement le code postal, sans autre mention (cedex, ...)', 'required' => false])

            ->add('ville', ChoiceType::class, ['label' => 'Ville * :'])
            ->addEventListener(
                FormEvents::PRE_SUBMIT,
                [$this, 'onPreSubmit']
            )

            ->add('verif_adresse', ButtonType::class, ['label' => 'Vérifier l\'adresse', 'attr' => ['class' => 'btn btn-warning']]);

//            ->add('pays', TextType::class, ['label' => 'label.pays', 'required' => false, 'data' => 'France', 'attr' => ['maxlength' => 100]]);
    }

    public function onPreSubmit(FormEvent $event)
    {
        if (null === $event->getData()) {
            return;
        }
        if (array_key_exists('ville', $event -> getData())) {
            $input = $event->getData()['ville'];
            $event->getForm()->add('ville', ChoiceType::class, ['choices' => [$input]]);
        }
    }

    /**
     * @throws AccessException
     */
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Adresse::class,
            'translation_domain' => 'form',
        ]);
    }
}