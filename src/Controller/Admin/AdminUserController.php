<?php

namespace App\Controller\Admin;

use App\Entity\Education;
use App\Entity\IdentityCard;
use App\Entity\PersonalData;
use App\Entity\RegistrationPlace;
use App\Entity\Right;
use App\Entity\User;
use App\Form\EducationType;
use App\Form\IdentityCardType;
use App\Form\PersonalDataType;
use App\Form\RegistrationPlaceType;
use App\Form\RightType;
use App\Form\UserType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminUserController extends AdminBaseController
{
    public static $forms = array(
         [
             'name' => 'Персональные данные',
             'type' => 'data',
             'type_id' => 0,
             'class' => PersonalData::class,
             'form_class' => PersonalDataType::class,
             'construct' => 'App\Entity\PersonalData',
         ],
         [
            'name' => 'Место регистрации',
            'type' => 'place',
            'type_id' => 1,
            'class' => RegistrationPlace::class,
            'form_class' => RegistrationPlaceType::class,
            'construct' => 'App\Entity\RegistrationPlace',
         ],
         [
            'name' => 'Удостоверение личности',
            'type' => 'person',
            'type_id' => 2,
            'class' => IdentityCard::class,
            'form_class' => IdentityCardType::class,
            'construct' => 'App\Entity\IdentityCard',
         ],
         [
            'name' => 'Образование',
            'type' => 'education',
            'type_id' => 3,
            'class' => Education::class,
            'form_class' => EducationType::class,
            'construct' => 'App\Entity\Education',
         ],
         [
            'name' => 'Особое право',
            'type' => 'right',
            'type_id' => 4,
            'class' => Right::class,
            'form_class' => RightType::class,
            'construct' => 'App\Entity\Right',
         ],
         [
            'name' => 'Вступительные испытания',
            'type' => 'challenge',
            'type_id' => 5,
            'class' => PersonalData::class,
            'form_class' => PersonalDataType::class,
            'construct' => 'App\Entity\PersonalData',
         ],
         [
            'name' => 'Направления',
            'type' => 'course',
            'type_id' => 6,
            'class' => PersonalData::class,
            'form_class' => PersonalDataType::class,
            'construct' => 'App\Entity\PersonalData',
         ],
         [
            'name' => 'Подача заявления',
            'type' => 'submission',
            'type_id' => 7,
            'class' => PersonalData::class,
            'form_class' => PersonalDataType::class,
            'construct' => 'App\Entity\PersonalData',
         ],
    );

    /**
     * @Route("/apex/form", name="admin_user")
     * @return Response
     */
    public function index() {
        $forRender = [
            'forms' => AdminUserController::$forms,
        ];
        return $this->render('admin/user/index.html.twig', $forRender);
    }

}