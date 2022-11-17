<?php

namespace App\Form;

use App\Entity\Adresse;
use App\Entity\StageEtudiant;
use App\Repository\AdresseRepository;
use App\Repository\StageEtudiantRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ButtonType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\HttpFoundation\Request;
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
            ->add('adresse1', TextType::class, ['label' => 'Adresse (numéro, rue) * :', 'disabled' => true, 'attr' => ['autocomplete' => 'off'], 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])
            ->add('adresse2', TextType::class, ['label' => 'Suite adresse (étage, bâtiment, ...) :','disabled' => true, 'required' => false, 'attr' => ['autocomplete' => 'off']])
            ->add('adresse3', TextType::class, ['label' => 'Complément d’adresse :','disabled' => true, 'required' => false, 'attr' => ['autocomplete' => 'off']])
            ->add('code_postal', TextType::class, ['label' => 'Code Postal * :', 'disabled' => true, 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')], 'attr' => ['autocomplete' => 'off']])
            ->add('ville', ChoiceType::class, ['label' => 'Ville * :', 'disabled' => true, 'attr' => ['autocomplete' => 'off'], 'constraints' => [new NotBlank(message: 'Veuillez renseigner ce champ')]])
            ->addEventListener(
                FormEvents::PRE_SUBMIT,
                [$this, 'onPreSubmit']
            )
            ->addEventListener(
                FormEvents::PRE_SET_DATA,
                [$this, 'onPreSetData']
            )
            ->add('modif_adresse', ButtonType::class, ['label' => 'Modifier l\'adresse', 'attr' => ['class' => 'btn']]);

//            ->add('pays', TextType::class, ['label' => 'label.pays', 'required' => false, 'data' => 'France', 'attr' => ['maxlength' => 100]]);
    }

    public function onPreSubmit(FormEvent $event)
    {
        if (null === $event->getData()) {
            return;
        }
        if (array_key_exists('adresse1', $event->getData())) {
            $input = $event->getData()['adresse1'];
            $event->getForm()->add('adresse1', TextType::class, ['empty_data' => $input]);
        }
        if (array_key_exists('adresse2', $event->getData())) {
            $input = $event->getData()['adresse2'];
            $event->getForm()->add('adresse2', TextType::class, ['empty_data' => $input]);
        }
        if (array_key_exists('adresse3', $event->getData())) {
            $input = $event->getData()['adresse3'];
            $event->getForm()->add('adresse3', TextType::class, ['empty_data' => $input]);
        }
        if (array_key_exists('code_postal', $event->getData())) {
            $input = $event->getData()['code_postal'];
            $event->getForm()->add('code_postal', TextType::class, ['empty_data' => $input]);
        }
        if (array_key_exists('ville', $event->getData())) {
            $input = $event->getData()['ville'];
            $event->getForm()->add('ville', ChoiceType::class, ['choices' => [$input]]);
        }
    }

    public function onPreSetData(FormEvent $event)
    {
        $ville = $event->getData();
        $form = $event->getForm();
        if (null !== $ville) {
            $form->add('ville', ChoiceType::class, [
                'choices' => [$ville->getVille() => $ville->getVille()],
                'disabled' => true
            ]);
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