<?php


namespace app\models;


use yii\db\ActiveRecord;

class CheckBox extends ActiveRecord
{
    public function rules()
    {
        return [
            [
                [
                    'Полная занятость',
                    'Частичная занятость',
                    'Проектная/Временная работа',
                    'Волонтёрство',
                    'Стажировка',
                    'Полный день',
                    'Сменный график',
                    'Гибкий график',
                    'Удалённая работа',
                    'Вахтовый метод'
                ],
                'default',
                'value' => ' '
            ],
        ];
    }
}