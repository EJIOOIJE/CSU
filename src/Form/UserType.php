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
                'label' => 'Email',
                'attr' => array('class'=> 'form-control')
            ))
            ->add('plainPassword', RepeatedType::class, array(
                'type' => PasswordType::class,
                'first_options' => array(
                    'label' => 'Пароль',
                    'attr' => array('class'=> 'form-control')
                ),
                'second_options' => array(
                    'label' => 'Повторите пароль',
                    'attr' => array('class'=> 'form-control')
                ),
            ))
            ->add('save', SubmitType::class, array(
                'label' => 'Зарегестрироваться',
                'attr' => array('class'=> 'btn btn-block btn-primary mt-5')
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
