<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
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
                        'message' => 'Le format est incorrect'
                    ])
                ]
            ])
            ->add('sujet', TextType::class, [
                'label' => 'Sujet',
                'label_attr' => ['class' => 'formulaire-label',],

                'attr' => [
                    'class' => 'form-control',

                ]
            ])
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'label_attr' => ['class' => 'formulaire-label',],

                'attr' => [
                    'class' => 'form-control',

                ]
                //'config' => ['toolbar' => 'basic']
            ])

            ->add('Envoyer', SubmitType::class, [

                'attr' => [
                    'class' => 'btn btn-primary mt-2 rounded-0 py-2 px-4',

                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
