<?php

namespace App\Controller\Admin;

use App\Entity\PersonalData;
use App\Entity\User;
use App\Form\PersonalDataType;
use App\Service\FileManagerServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;


class AdminDataController extends AdminBaseController
{
    private $forRender;

    /**
     * @Route("/apex/form/data/{form_id}", name="admin_data")
     * @param int $form_id
     * @param Request $request
     * @param FileManagerServiceInterface $fileManagerService
     * @return RedirectResponse|Response
     */
    public function data(int $form_id, Request $request, FileManagerServiceInterface $fileManagerService) {//, methods={"POST"}

        $user_id = $this->getUser()->getId();
        $em = $this->getDoctrine()->getManager();
        $forms = AdminUserController::$forms;

        if ( !((0 <= $form_id) && ($form_id <= count($forms) - 1)) )
            throw $this->createNotFoundException('Данной страницы не существует');

        $form_obj = new $forms[$form_id]['construct']();
        $user = $this->getDoctrine()->getRepository(User::class)
            ->find($user_id);
        $form_obj_existing = $this->getDoctrine()->getRepository($forms[$form_id]['class'])
            ->findOneBy(['user' => $user_id]);

        $form = $this->createForm($forms[$form_id]['form_class'], $form_obj);
        $form->handleRequest($request);


        if ($form->isSubmitted()) {

            if ( (bool)$form_obj_existing ) {

                $form = $this->createForm($forms[$form_id]['form_class'], $form_obj_existing);
                $form->handleRequest($request);
                if ($form->isValid()) {//обновление дынных

                    $form_obj_existing->setUpdateAtValue();
                    $form_obj_existing->setUser($user);

                    if ($forms[$form_id]['type'] == 'data') {
                        if ($file = $form->get('agreement')->getData()) {

                            if ($fileNameOld = $form_obj_existing->getAgreement()) {
                                $fileManagerService->removeFile($fileNameOld, $user->getDir());
                            }

                            $fileName = $fileManagerService->uploadFile($file, $user->getDir());
                            $form_obj_existing->setAgreement($fileName);
                        }
                    } elseif ($forms[$form_id]['type'] == 'person') {
                        if ($file = $form->get('documentFile')->getData()) {

                            if ($fileNameOld = $form_obj_existing->getDocumentFile()) {
                                $fileManagerService->removeFile($fileNameOld, $user->getDir());
                            }

                            $fileName = $fileManagerService->uploadFile($file, $user->getDir());
                            $form_obj_existing->setDocumentFile($fileName);
                        }
                    } elseif ($forms[$form_id]['type'] == 'education') {
                        if ($file = $form->get('document')->getData()) {

                            if ($fileNameOld = $form_obj_existing->getDocument()) {
                                $fileManagerService->removeFile($fileNameOld, $user->getDir());
                            }

                            $fileName = $fileManagerService->uploadFile($file, $user->getDir());
                            $form_obj_existing->setDocument($fileName);
                        }
                    }

                    $em->flush();
                    $this->addFlash('success', 'Данные успешно сохранены');

                    if ( $form_id < count($forms) - 1 )
                        return $this->redirectToRoute('admin_data', ['form_id' => $form_id + 1]);

                } else
                    $this->addFlash('fail', 'Форма заполнена неверно');

            } else {
                if ($form->isValid()) {//добавление дынных

                    $form_obj->setCreateAtValue();
                    $form_obj->setUpdateAtValue();
                    $form_obj->setUser($user);

                    if ($forms[$form_id]['type'] == 'data') {
                        if ($file = $form->get('agreement')->getData()) {
                            $fileName = $fileManagerService->uploadFile($file, $user->getDir());
                            $form_obj->setAgreement($fileName);
                        }
                    } elseif ($forms[$form_id]['type'] == 'person') {
                        if ($file = $form->get('documentFile')->getData()) {
                            $fileName = $fileManagerService->uploadFile($file, $user->getDir());
                            $form_obj->setDocumentFile($fileName);
                        }
                    } elseif ($forms[$form_id]['type'] == 'education') {
                        if ($file = $form->get('document')->getData()) {
                            $fileName = $fileManagerService->uploadFile($file, $user->getDir());
                            $form_obj->setDocument($fileName);
                        }
                    }

                    $em->persist($form_obj);
                    $em->flush();
                    $this->addFlash('success', 'Данные успешно сохранены');

                    if ( $form_id < count($forms) - 1 )
                        return $this->redirectToRoute('admin_data', ['form_id' => $form_id + 1]);

                } else
                    $this->addFlash('fail', 'Форма заполнена неверно');
            }

        } elseif ( (bool)$form_obj_existing )
            $form = $this->createForm($forms[$form_id]['form_class'], $form_obj_existing);


        $this->forRender['form'] = $form->createView();
        $this->forRender['type'] = $forms[$form_id]['type'];
        $this->forRender['type_id'] = $form_id;


        return $this->render('admin/user/forms_template.html.twig', $this->forRender);
    }
}