<?php

namespace App\Form;

use App\Entity\IdentityCard;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class IdentityCardType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('document', ChoiceType::class, array(
                'label' => 'Документ, удостоверяющий личность',
                'required' => false,
                'choices' => [
                    '' => '',
                    'Временное удостоверение личности' => 'Временное удостоверение личности',
                    'Загранпаспорт других стран' => 'Загранпаспорт других стран',
                    'Загранпаспорт РФ' => 'Загранпаспорт РФ',
                    'Паспорт иностранного гражданина' => 'Паспорт иностранного гражданина',
                    'Паспорт РФ' => 'Паспорт РФ',
                    'Удостоверение личности другой страны' => 'Удостоверение личности другой страны',
                ]
            ))
            ->add('series', IntegerType::class, array(
                'label' => 'Серия',
            ))
            ->add('number', IntegerType::class, array(
                'label' => 'Номер',
            ))
            ->add('issueDate', DateType::class, array(
                'label' => 'Дата выдачи',
                'widget' => 'single_text',
            ))
            ->add('dapartmentCode', TextType::class, array(
                'label' => 'Код подразделения',
            ))
            ->add('issued', TextType::class, array(
                'label' => 'Кем выдан',
            ))
            ->add('documentFile', FileType::class, array(
                'label' => 'Вы можете прикрепить скан-копию документа, удостоверяющего личность',
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
            'data_class' => IdentityCard::class,
        ]);
    }
}
