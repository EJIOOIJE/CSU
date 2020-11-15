<?php

namespace App\Controller\Main;


use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BaseController extends AbstractController
{
    public function renderDefault() {
        return [
            'title' => 'Главная страница',
            'faculties' => array(
                array(
                    'faculty' => 'Биологический факультет',
                    'img' => '001.png',
                    'link' => '27',
                ),
                array(
                    'faculty' => 'Математический факультет',
                    'img' => '002.png',
                    'link' => '2',
                ),
                array(
                    'faculty' => 'Физический факультет',
                    'img' => '003.png',
                    'link' => '16',
                ),
                array(
                    'faculty' => 'Химический факультет',
                    'img' => '004.png',
                    'link' => '18',
                ),
                array(
                    'faculty' => 'Факультет экологии',
                    'img' => '014.png',
                    'link' => '23',
                ),
                array(
                    'faculty' => 'Факультет фундаментальной медицины',
                    'img' => '017.png',
                    'link' => '50',
                ),
                array(
                    'faculty' => 'Институт информационных технологий',
                    'img' => '016.png',
                    'link' => '25',
                ),
                array(
                    'faculty' => 'Экономический факультет',
                    'img' => '005.png',
                    'link' => '11',
                ),
                array(
                    'faculty' => 'Факультет управления',
                    'img' => '012.png',
                    'link' => '20',
                ),
                array(
                    'faculty' => 'Институт экономических отраслей бизнеса и администрирования',
                    'img' => '019.png',
                    'link' => '22',
                ),
                array(
                    'faculty' => 'Институт права',
                    'img' => '006.png',
                    'link' => '7',
                ),
                array(
                    'faculty' => 'Факультет евразии и востока',
                    'img' => '007.png',
                    'link' => '26',
                ),
                array(
                    'faculty' => 'Историко-филологичекий факультет',
                    'img' => '009.png',
                    'link' => '40',
                ),
                array(
                    'faculty' => 'Факультет лингвистики и перевода',
                    'img' => '011.png',
                    'link' => '19',
                ),
                array(
                    'faculty' => 'Факультет психологии и педагогики',
                    'img' => '013.png',
                    'link' => '21',
                ),
                array(
                    'faculty' => 'Институт образования и практической психологии',
                    'img' => '022.png',
                    'link' => '54',
                ),
                array(
                    'faculty' => 'Факультет журналистики',
                    'img' => '010.png',
                    'link' => '41',
                ),
                array(
                    'faculty' => 'Факультет заочного и дистанционного обучения',
                    'img' => '008.png',
                    'link' => '13',
                ),
                array(
                    'faculty' => 'Институт повышения квалификации и переподготовки кадров',
                    'img' => '018.png',
                    'link' => '51',
                ),
                array(
                    'faculty' => 'Институт довузовского образования',
                    'img' => '015.png',
                    'link' => '4',
                ),
                array(
                    'faculty' => 'Кафедра физвоспитания и спорта',
                    'img' => '021.png',
                    'link' => '25',
                ),
            )
        ];
    }
}