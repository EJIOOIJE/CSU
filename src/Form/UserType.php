<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('email',  EmailType::class, array(
                'label' => false,
                'attr' => array(
                    'class'=> 'form-control mt-5',
                    'placeholder' => 'Email'
                )
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array(
                    'label' => false,
                    'attr' => array(
                        'class'=> 'form-control mt-3',
                        'placeholder' => 'Пароль'
                    )
                ),
                'second_options' => array(
                    'label' => false,
                    'attr' => array(
                        'class'=> 'form-control mt-3',
                        'placeholder' => 'Повторите пароль'
                    )
                ),
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Зарегестрироваться',
                'attr' => array(
                    'class'=> 'btn btn-block btn-primary mt-5'
                )
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
