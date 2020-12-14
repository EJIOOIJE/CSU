<?php

namespace App\Form;

use App\Entity\Education;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EducationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('education', ChoiceType::class, array(
                'label' => 'Образование',
                'choices' => [
                    '' => '',
                    'Высшее' => 'Высшее',
                    'Основное общее' => 'Основное общее',
                    'Среднее общее' => 'Среднее общее',
                    'Среднее специальное' => 'Среднее специальное',
                ]
            ))
            ->add('educationDocument', ChoiceType::class, array(
                'label' => 'Документ об образовании',
                'choices' => [
                    '' => '',
                    'Аттестат' => 'Аттестат',
                    'Диплом бакалавра' => 'Диплом бакалавра',
                    'Диплом дипломированного специалиста' => 'Диплом дипломированного специалиста',
                    'Диплом магистра' => 'Диплом магистра',
                    'Диплом о начальном профессиональном образовании' => 'Диплом о начальном профессиональном образовании',
                    'Диплом о среднем профессиональном образовании' => 'Диплом о среднем профессиональном образовании',
                    'Диплом специалиста' => 'Диплом специалиста',
                ]
            ))
            ->add('series', IntegerType::class, array(
                'label' => 'Серия документа об образовании',
            ))
            ->add('number', IntegerType::class, array(
                'label' => 'Номер документа об образовании',
            ))
            ->add('issueDate', DateType::class, array(
                'label' => 'Дата выдачи',
                'widget' => 'single_text',
            ))
            ->add('region', TextType::class, array(
                'label' => 'Регион учебного заведения',
            ))
            ->add('name', TextType::class, array(
                'label' => 'Наименование учебного заведения',
            ))
            ->add('document', FileType::class, array(
                'label' => 'Прикрепите скан-копию документа об образовании с приложениями',
                'label_attr' => [
                    'class' => 'text-truncate',
                    'lang' => 'ru',
                ],
                'required' => false,
                'mapped' => false,
            ))
            ->add('language', ChoiceType::class, array(
                'label' => 'Укажите иностранный язык, который вы изучали',
                'required' => false,
                'choices' => [
                    '' => '',
                    'Английский' => 'Английский',
                    'Итальянский' => 'Итальянский',
                    'Немецкий' => 'Немецкий',
                    'Русский' => 'Русский',
                    'Французский' => 'Французский',
                ]
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Education::class,
        ]);
    }
}
