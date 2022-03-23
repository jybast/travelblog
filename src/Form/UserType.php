<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'label' => 'Votre adresse e-mail',
                'label_attr' => ['class' => 'formulaire-label',],

                'attr' => [
                    'class' => 'form-control',
                    'placeholder' =>  'Votre adresse e-mail'
                ],
                'constraints' => [
                    new Regex([
                        'pattern' => "#^[a-zA-Z0-9.!$\#%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$#",
                        'message' => 'Le format de l\'adresse est incorrect'
                    ])
                ]
            ])
            ->add('roles', ChoiceType::class, [
                'choices'  => [
                    'ADMIN' => null,
                    'MANAGER' => false,
                    'USER' => false,
                ],
            ])

            ->add('nom', TextType::class, [
                'label' => 'Nom',
                'label_attr' => ['class' => 'form-label',],

                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre nom'
                ]
            ])
            ->add('prenom', TextType::class, [
                'label' => 'Préom',
                'label_attr' => ['class' => 'form-label',],

                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre prénom'
                ]
            ])
            ->add('telephone', TextType::class, [
                'label' => 'Téléphone',
                'label_attr' => ['class' => 'form-label',],

                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre téléphone'
                ]
            ])
            ->add('adresse', TextType::class, [
                'label' => 'Adresse',
                'label_attr' => ['class' => 'form-label',],

                'attr' => [
                    'class' => 'form-control',
                    'placeholder' => 'Votre adresse'
                ]
            ])
            ->add('cp', TextType::class, [
                'label' => 'Code postal',
                'label_attr' => ['class' => 'form-label',],

                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('ville', TextType::class, [
                'label' => 'Ville',
                'label_attr' => ['class' => 'form-label',],
                'attr' => [
                    'class' => 'form-control',
                ]
            ])
            ->add('Valider', SubmitType::class, [
                'attr' => [
                    'class' => 'btn btn-info mt-2',
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
