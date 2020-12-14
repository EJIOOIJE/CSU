<?php

namespace App\Form;

use App\Entity\Right;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RightType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('rights', ChoiceType::class, array(
                'label' => 'Сообщаю, что имею особые права',
                'required' => false,
                'choices' => [
                    'Не применяется' => 'Нет',
                    'Дети, оставшиеся без попечения родителей' => 'Дети, оставшиеся без попечения родителей',
                    'Дети-инвалиды' => 'Дети-инвалиды',
                    'Дети-сироты' => 'Дети-сироты',
                    'Инвалид детства' => 'Инвалид детства',
                    'Инвалид 1-ой группы' => 'Инвалид 1-ой группы',
                    'Инвалид 2-ой группы' => 'Инвалид 2-ой группы',
                    'Инвалиды' => 'Инвалиды',
                    'Прием без вступительных испытаний' => 'Прием без вступительных испытаний',
                    'Прием на целевое обучение' => 'Прием на целевое обучение',
                    'Участник боевых действий' => 'Участник боевых действий',
                ]
            ))
            ->add('document', TextType::class, array(
                'label' => 'Укажите реквизиты документа, подтверждающего особое право (серия, номер, дата выдачи документа)',
                'required' => false,
            ))
            ->add('olympiads', TextType::class, array(
                'label' => 'Прошу рассмотреть возможность зачесть результаты олимпиады для получения максимального балла по предметам вступительных испытаний:',
                'required' => false,
                'attr' => [
                    'class' => 'hide'
                ]
            ))
            ->add('informed', CheckboxType::class, array(
                'label' => 'Я проинформирован(а), что особые права, не указанные в данном заявлении, в дальнейшем не будут рассматриваться Приемной комиссией ФГБОУ ВО «ЧелГУ».',
                'required' => false,
                'attr' => [
                    'class' => 'form-check-input'
                ]
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Right::class,
        ]);
    }
}
