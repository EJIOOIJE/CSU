<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdminUserController extends AdminBaseController
{
    /**
     * @Route("/admin/user", name="admin_user")
     * @return Response
     */
    public function index() {
        $users = $this->getDoctrine()->getRepository(User::class)->findAll();

        $forRender = parent::renderDefault();
        $forRender['message'] = 'Пользователи';
        $forRender['users'] = $users;
        return $this->render('admin/user/index.html.twig', $forRender);
    }

}