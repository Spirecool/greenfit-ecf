<?php

namespace App\Form;

use App\Entity\RolesUsers;
use App\Entity\Users;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Validator\Constraints\Length;
// use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\NotBlank;

class UsersType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email', EmailType::class, [
                'required' => true,
                'constraints' => [
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Votre adresse mail doit contenir au moins {{ limit }} caractères',
                        'max' => 255,
                    ]),
                ],
                'label' => 'Adresse Email'
                ])
    
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Le mot de passe et la confirmation doivent être identiques',
                'label' => false,
                'required' => true,
             
                'first_options' => [
                    'label' => 'Mot de passe',
                    'attr' => [
                        'placeholder' => 'Merci de saisir votre mot de passe'
                    ],
                
                ],
                'second_options' => [
                    'label' => 'Confirmez votre mot de passe',
                    'attr' => [
                        'placeholder' => 'Merci de saisir à nouveau votre mot de passe'
                    ]
                ],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Veuillez entrer un mot de passe',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Votre mot de passe doit être au moins de {{ limit }} caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])

            ->add('lastname', TextType::class, [
                'required' => true,
                'label' => 'Nom de famille'
            ])

            ->add('firstname', TextType::class, [
                'required' => true,
                'label' => 'Prénom'
            ])

            ->add('address', TextType::class, [
                'required' => true,
                'label' => 'Adresse'
            ])
            
            ->add('zipcode', TextType::class, [
                'required' => true,
                'label' => 'Code postal',
            ])

            ->add('city', TextType::class, [
                'required' => true,
                'label' => 'Ville'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Users::class,
        ]);
    }
}
