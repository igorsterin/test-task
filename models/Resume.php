<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii\web\UploadedFile;

/**
 * Class Resume
 * @package app\models
 * @property yii\web\UploadedFile $photo
 * @property string $lastname
 * @property string $name
 * @property string $middlename
 * @property string $email
 * @property string $mobile
 * @property string $birthdate
 * @property string $salary
 * @property string $specialization
 * @property string $city
 * @property string $sex
 * @property string|null $about_me
 */
class Resume extends ActiveRecord
{
    public function rules()
    {
        return [
            [
                ['lastname', 'name', 'middlename', 'email', 'mobile', 'birthdate', 'salary', 'specialization', 'city'],
                'required',
                'message' => 'Поле обязательно для заполнения'
            ],
            [['sex', 'about_me'], 'default', 'value' => null],
            ['email', 'email', 'message' => 'Поле заполнено неверно'],
            [
                'salary',
                'integer',
                'min' => '1',
                'tooSmall' => 'Поле заполнено неверно',
                'message' => 'Поле заполнено неверно'
            ],

            //пропускает только номера по шаблону +7 123 456 78 90, после 7 только 10 цифр, на месте пробелов так же могут быть тире, либо же пробелов может не быть (слитное написание допускается)
            [
                'mobile',
                'match',
                'pattern' => '/^(\+7)[ |-]?[0-9]{3}[ |-]?[0-9]{3}[ |-]?[0-9]{2}[ |-]?[0-9]{2}$/i',
                'message' => 'Поле заполнено неверно'
            ],

        ];
    }
}


?>