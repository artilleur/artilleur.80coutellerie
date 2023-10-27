<?php

namespace App\Form;

use App\Entity\Utilisateur;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;

//  use App\Entity\Utilisateur;
//  use Symfony\Component\Form\AbstractType;
//  use Symfony\Component\Form\FormBuilderInterface;
//  use Symfony\Component\OptionsResolver\OptionsResolver;

 class Utilisateur1Type extends AbstractType
{
   public function buildForm(FormBuilderInterface $builder, array $options): void
   {
       $builder
             ->add('email')
//             ->add('roles')
            // 
            ->add('plainPassword', RepeatedType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'type' => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
    'options' => ['attr' => ['class' => 'password-field']],
    'required' => true,
    'first_options'  => ['label' => 'Password'],
    'second_options' => ['label' => 'Repeat Password'],
                'mapped' => false,
                'attr' => ['autocomplete' => 'new-password'],
                'constraints' => [
                    new NotBlank([
                        'message' => 'Please enter a password',
                    ]),
                    new Length([
                        'min' => 6,
                        'minMessage' => 'Your password should be at least {{ limit }} characters',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
            ->add('nom')
            ->add('prenom')
            ->add('adresse')
            ->add('cp')
            ->add('ville')
            ->add('pays')
            ->add('telephone')
           // ->add('monCul')
         ;
     }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Utilisateur::class,
         ]);
     }
 }
