<?php

namespace App\Form;

use App\Entity\PersonalData;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PersonalDataType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('surname', TextType::class, array(
                'label' => 'Фамилия',
            ))
            ->add('name', TextType::class, array(
                'label' => 'Имя',
            ))
            ->add('middleName', TextType::class, array(
                'label' => 'Отчество',
            ))
            ->add('gender', ChoiceType::class, array(
                'label' => 'Пол',
                'choices' => [
                    'Мужской' => true,
                    'Женский' => false,
                ]
            ))
            ->add('birthday', BirthdayType::class, array(
                'label' => 'Дата рождения',
                'required' => true,
                'widget' => 'single_text',
            ))
            ->add('place', TextType::class, array(
                'label' => 'Место рождения',
            ))
            ->add('phone', TelType::class, array(
                'label' => 'Телефон',
            ))
            ->add('email', EmailType::class, array(
                'label' => 'Электронная почта'
            ))
            ->add('agreement', FileType::class, array(
                'label' => false,
                'label_attr' => [
                    'class' => 'text-truncate',
                    'lang' => 'ru',
                ],
                'required' => false,
                'mapped' => false,
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PersonalData::class,
        ]);
    }
}
