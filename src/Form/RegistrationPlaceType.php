<?php

namespace App\Form;

use App\Entity\RegistrationPlace;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RegistrationPlaceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('ind', IntegerType::class, array(
                'label' => 'Индекс',
                'required' => false,
            ))
            ->add('region', TextType::class, array(
                'label' => 'Регион',
            ))
            ->add('district', TextType::class, array(
                'label' => 'Район',
                'required' => false,
            ))
            ->add('city', TextType::class, array(
                'label' => 'Город',
            ))
            ->add('street', TextType::class, array(
                'label' => 'Улица',
            ))
            ->add('house', IntegerType::class, array(
                'label' => 'Дом',
            ))
            ->add('apartment', IntegerType::class, array(
                'label' => 'Квартира',
                'required' => false,
            ))
            ->add('nationality', ChoiceType::class, array(
                'label' => 'Гражданство',
                'choices' => [
                    '' => '',
                    "АБХАЗИЯ" => 'АБХАЗИЯ',
                    "АЗЕРБАЙДЖАН" => 'АЗЕРБАЙДЖАН',
                    "АЛЖИР" => 'АЛЖИР',
                    "АРМЕНИЯ" => 'АРМЕНИЯ',
                    "БЕЛАРУСЬ" => 'БЕЛАРУСЬ',
                    "БРАЗИЛИЯ" => 'БРАЗИЛИЯ',
                    "ГАБОН" => 'ГАБОН',
                    "ГВИНЕЯ" => 'ГВИНЕЯ',
                    "ГРЕЦИЯ" => 'ГРЕЦИЯ',
                    "ЕГИПЕТ" => 'ЕГИПЕТ',
                    "ЗАМБИЯ" => 'ЗАМБИЯ',
                    "ИЗРАИЛЬ" => 'ИЗРАИЛЬ',
                    "ИРАК" => 'ИРАК',
                    "ИРАН, ИСЛАМСКАЯ РЕСПУБЛИКА" => 'ИРАН, ИСЛАМСКАЯ РЕСПУБЛИКА',
                    "КАЗАХСТАН" => 'КАЗАХСТАН',
                    "КАМЕРУН" => 'КАМЕРУН',
                    "КИРГИЗИЯ" => 'КИРГИЗИЯ',
                    "КИТАЙ" => 'КИТАЙ',
                    "КОНГО" => 'КОНГО',
                    "КОНГО, ДЕМОКРАТИЧЕСКАЯ РЕСПУБЛИКА" => 'КОНГО, ДЕМОКРАТИЧЕСКАЯ РЕСПУБЛИКА',
                    "КОРЕЯ, НАРОДНО-ДЕМОКРАТИЧЕСКАЯ РЕСПУБЛИКА" => 'КОРЕЯ, НАРОДНО-ДЕМОКРАТИЧЕСКАЯ РЕСПУБЛИКА',
                    "КОТ ДИВУАР" => 'КОТ ДИВУАР',
                    "МАЛИ" => 'МАЛИ',
                    "МАРОККО" => 'МАРОККО',
                    "МОЛДОВА, РЕСПУБЛИКА" => 'МОЛДОВА, РЕСПУБЛИКА',
                    "НИГЕРИЯ" => 'НИГЕРИЯ',
                    "ПАЛАУ" => 'ПАЛАУ',
                    "ПАЛЕСТИНА, ГОСУДАРСТВО" => 'ПАЛЕСТИНА, ГОСУДАРСТВО',
                    "РОССИЯ" => 'РОССИЯ',
                    "СЕНЕГАЛ" => 'СЕНЕГАЛ',
                    "ТАДЖИКИСТАН" => 'ТАДЖИКИСТАН',
                    "ТОГО" => 'ТОГО',
                    "ТУРКМЕНИЯ" => 'ТУРКМЕНИЯ',
                    "ТУРЦИЯ" => 'ТУРЦИЯ',
                    "УЗБЕКИСТАН" => 'УЗБЕКИСТАН',
                    "УКРАИНА" => 'УКРАИНА',
                    "ЧАД" => 'ЧАД',
                ]
            ));
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => RegistrationPlace::class,
        ]);
    }
}
