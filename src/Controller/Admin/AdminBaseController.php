<?php

namespace App\Controller\Admin;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AdminBaseController extends AbstractController
{
    private function  getCurrentYear() {
        $today = date("m.d");
        $breakDate = '01.06';
        if ($breakDate <= $today)
            return date('Y');
        else
            return date('Y', strtotime('-1 year'));
    }

    public function renderDefault() {
        $currentYear = $this->getCurrentYear();

        return [
            'message' => 'Уважаемый абитуриент!',
            'info' => array(
                'message' => 'Перед началом работы в личном кабинете рекомендуем ознакомиться со следующими документами:',
                'list' => array(
                    'Правила приема в колледж ФГБОУ ВО ЧелГУ '.$currentYear.' год' =>
                        'https://www.csu.ru/roles/prospective-students/'.$currentYear.'/spo/pravila_priema.aspx',
                    'Правила приёма в бакалавриат, специалитет и магистратуру ФГБОУ ВО «ЧелГУ» в '.$currentYear.' году' =>
                        'https://www.csu.ru/roles/prospective-students/'.$currentYear.'/rules.aspx',
                    'Правила приема на обучение по образовательным программам высшего образования - программам подготовки научно-педагогических кадров в аспирантуре' =>
                        'https://www.csu.ru/roles/prospective-students/'.$currentYear.'/aspirant/rules_'.$currentYear.'.aspx',
                    'Положение о комиссии по учёту индивидуальных достижений абитуриентов' =>
                        'https://www.csu.ru/roles/prospective-students/'.$currentYear.'/bachelor/bakid'.$currentYear.'.aspx',
                )
            ),
            'required' => array(
                'message' => 'Внимание! Для подачи заявления через личный кабинет вам понадобятся:',
                'list' => array(
                    'Документ удостоверяющий личность (Паспорт)',
                    'Документ об образовании',
                    'Скан-копия вашего документа об образовании (с приложениями)'
                )
            )
        ];
    }
}