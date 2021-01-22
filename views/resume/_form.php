<?php

/**
 * @var $this yii\web\View
 * @var $form yii\bootstrap\ActiveForm
 * @var $image app\models\Image
 * @var $checkbox app\models\Checkbox
 * @var $resume app\models\Resume
 * @var $photo string
 * @var $vls string
 * @var $data array
 * @var $data1 array
 */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

extract($data1, EXTR_OVERWRITE);
extract($data, EXTR_OVERWRITE);

//стиль сообщения об ошибке заполнения поля формы
$css = <<<CSS
.help-block {    
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    color: #a94442;
    }
CSS;

$this->registerCss($css);

$js = <<<JS
    function changeimg(input) {
    let fReader = new FileReader();
 fReader.readAsDataURL(input.files[0]);
    fReader.onload = function() {
document.getElementById("img1").innerHTML='<img  src="' + fReader.result + '" alt="foto">';}}
JS;

$this->registerJs($js, 3);

?>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="mt8 mb40"><a href="index.php"><img src="images/blue-left-arrow.svg" alt="arrow"> Вернуться без
                    сохранения</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="main-title mb24"><?= $this->title ?></div>
        </div>
    </div>
    <div class="col-12">
        <?php
        $form = ActiveForm::begin(); ?>
        <div class="row mb32">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Фото</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <div id="img1" class="profile-foto-upload mb8"><img src=<?= '"' . $photo . '"' ?> alt="foto">
                </div>
                <?= $form->field(
                    $image,
                    'imageFile',
                    ['options' => ['tag' => 'label', 'class' => 'custom-file-upload']]
                )->fileInput(['onchange' => 'changeimg(this)'])->label('Изменить фото') ?>
            </div>
        </div>
        <div class="row mb16">
            <div id="1" class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Фамилия</div>
            </div>
            <?= $form->field($resume, 'lastname', ['options' => ['class' => 'col-lg-3 col-md-4 col-11']])->label(
                false
            )->input('text', ['class' => 'dor-input w100', 'value' => $resume['lastname']]) ?>
        </div>
        <div class="row mb16">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Имя</div>
            </div>
            <?= $form->field($resume, 'name', ['options' => ['class' => 'col-lg-3 col-md-4 col-11']])->label(
                false
            )->input('text', ['class' => 'dor-input w100', 'value' => $resume['name']]) ?>
        </div>
        <div class="row mb16">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Отчество</div>
            </div>
            <?= $form->field($resume, 'middlename', ['options' => ['class' => 'col-lg-3 col-md-4 col-11']])->label(
                false
            )->input('text', ['class' => 'dor-input w100', 'value' => $resume['middlename']]) ?>
        </div>
        <div class="row mb24">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Дата рождения</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <div class="datepicker-wrap input-group date">
                    <?= $form->field(
                        $resume,
                        'birthdate',
                        ['options' => ['class' => 'datepicker-wrap input-group date']]
                    )->label(false)->input(
                        'text',
                        [
                            'class' => 'dor-input dpicker datepicker-input',
                            'autocomplete' => 'off',
                            'value' => $resume['birthdate']
                        ]
                    ) ?>
                    <img src="images/mdi_calendar_today.svg" alt="">
                </div>
            </div>
        </div>
        <div class="row mb16">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Пол</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <?= $form->field($resume, 'sex', ['options' => ['class' => 'card-ul-radio profile-radio-list']])->label(
                    false
                )->RadioList(
                    ['Мужской' => 'Мужской', 'Женский' => 'Женский'],
                    [
                        'value' => $vls,
                        'item' => function ($index, $label, $name, $checked, $value) {
                            return '<li>' .
                                Html::radio(
                                    $name,
                                    $checked,
                                    ['id' => $value, 'value' => $value]
                                ) . '<label for="' . $value . '">' . $label . '</label></li>';
                        }
                    ]
                ) ?>
            </div>
        </div>
        <div class="row mb16">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Город проживания</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <?= $form->field($resume, 'city', ['options' => ['class' => 'citizenship-select']])->label(
                    false
                )->dropDownList(
                    [
                        'Кемерово' => 'Кемерово',
                        'Новосибирск' => 'Новосибирск',
                        'Иркутск' => 'Иркутск',
                        'Красноярск' => 'Красноярск',
                        'Барнаул' => 'Барнаул'
                    ],
                    ['class' => 'nselect-1', 'value' => $resume['city']]
                ) ?>
            </div>
        </div>
        <div class="row mb16">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="heading">Способы связи</div>
            </div>
            <div class="col-lg-7 col-10"></div>
        </div>
        <div class="row mb24">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Электронная почта</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <?= $form->field($resume, 'email', ['options' => ['class' => 'p-rel']])->label(false)->input(
                    'text',
                    [
                        'class' => 'dor-input w100',
                        'value' => $resume['email']
                    ]
                ) ?>
            </div>
        </div>
        <div class="row mb32">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Телефон</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <?= $form->field(
                    $resume,
                    'mobile',
                    ['options' => ['style' => 'width: 140px', 'class' => 'p-rel mobile-w100']]
                )->label(false)->input(
                    'text',
                    [
                        'class' => 'dor-input w100',
                        'placeholder' => '+7 ___ ___-__-__',
                        'value' => $resume['mobile']
                    ]
                ) ?>
            </div>
        </div>
        <div class="row mb24">
            <div class="col-12">
                <div class="heading">Желаемая должность</div>
            </div>
        </div>
        <div class="row mb16">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Специализация</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <?= $form->field($resume, 'specialization', ['options' => ['class' => 'citizenship-select']])->label(
                    false
                )->dropDownList(
                    [
                        'Программирование, Разработка' => 'Программирование, Разработка',
                        'Web инженер' => 'Web инженер',
                        'Web мастер' => 'Web мастер',
                        'Оптимизация сайта (SEO)' => 'Оптимизация сайта (SEO)',
                        'Администратор баз данных' => 'Администратор баз данных',
                        'Системный администратор' => 'Системный администратор',
                        'Компьютерная безопасность' => 'Компьютерная безопасность'
                    ],
                    ['class' => 'nselect-1', 'value' => $resume['specialization']]
                ) ?>
            </div>
        </div>
        <div class="row mb16">
            <div class="col-lg-2 col-md-3 dflex-acenter">
                <div class="paragraph">Зарплата</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <div class="p-rel">
                    <?= $form->field($resume, 'salary')->label(false)->input(
                        'text',
                        [
                            'placeholder' => 'От',
                            'class' => 'dor-input w100',
                            'value' => $resume['salary']
                        ]
                    ) ?>
                    <img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon">
                </div>
            </div>
        </div>
        <div class="row mb32">
            <div class="col-lg-2 col-md-3">
                <div class="paragraph">Занятость</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <div class="profile-info">
                    <div class="form-check d-flex">
                        <input type="hidden" name="Checkbox[zaglushka]" value="">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1"
                               name="Checkbox[Полная занятость]"
                               value="Checked" <?= $checkbox['Полная занятость'] ?>>
                        <label class="form-check-label" for="exampleCheck1"></label>
                        <label for="exampleCheck1" class="profile-info__check-text job-resolution-checkbox">Полная
                            занятость</label>
                    </div>
                    <div class="form-check d-flex">
                        <input type="checkbox" class="form-check-input" id="exampleCheck2"
                               name="Checkbox[Частичная занятость]"
                               value="Checked" <?= $checkbox['Частичная занятость'] ?>>
                        <label class="form-check-label" for="exampleCheck2"></label>
                        <label for="exampleCheck2" class="profile-info__check-text job-resolution-checkbox">Частичная
                            занятость</label>
                    </div>
                    <div class="form-check d-flex">
                        <input type="checkbox" class="form-check-input" id="exampleCheck3"
                               name="Checkbox[Проектная/Временная работа]"
                               value="Checked" <?= $checkbox['Проектная/Временная работа'] ?>>
                        <label class="form-check-label" for="exampleCheck3"></label>
                        <label for="exampleCheck3" class="profile-info__check-text job-resolution-checkbox">Проектная/Временная
                            работа</label>
                    </div>
                    <div class="form-check d-flex">
                        <input type="checkbox" class="form-check-input" id="exampleCheck4" name="Checkbox[Волонтёрство]"
                               value="Checked" <?= $checkbox['Волонтёрство'] ?>>
                        <label class="form-check-label" for="exampleCheck4"></label>
                        <label for="exampleCheck4"
                               class="profile-info__check-text job-resolution-checkbox">Волонтёрство</label>
                    </div>
                    <div class="form-check d-flex">
                        <input type="checkbox" class="form-check-input" id="exampleCheck5" name="Checkbox[Стажировка]"
                               value="Checked" <?= $checkbox['Стажировка'] ?>>
                        <label class="form-check-label" for="exampleCheck5"></label>
                        <label for="exampleCheck5"
                               class="profile-info__check-text job-resolution-checkbox">Стажировка</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb32">
            <div class="col-lg-2 col-md-3">
                <div class="paragraph">График работы</div>
            </div>
            <div class="col-lg-3 col-md-4 col-11">
                <div class="profile-info">
                    <div class="form-check d-flex">
                        <input type="checkbox" class="form-check-input" id="exampleCheck6" name="Checkbox[Полный день]"
                               value="Checked" <?= $checkbox['Полный день'] ?>>
                        <label class="form-check-label" for="exampleCheck6"></label>
                        <label for="exampleCheck6" class="profile-info__check-text job-resolution-checkbox">Полный
                            день</label>
                    </div>
                    <div class="form-check d-flex">
                        <input type="checkbox" class="form-check-input" id="exampleCheck7"
                               name="Checkbox[Сменный график]"
                               value="Checked" <?= $checkbox['Сменный график'] ?>>
                        <label class="form-check-label" for="exampleCheck7"></label>
                        <label for="exampleCheck7" class="profile-info__check-text job-resolution-checkbox">Сменный
                            график</label>
                    </div>
                    <div class="form-check d-flex">
                        <input type="checkbox" class="form-check-input" id="exampleCheck8"
                               name="Checkbox[Гибкий график]"
                               value="Checked" <?= $checkbox['Гибкий график'] ?>>
                        <label class="form-check-label" for="exampleCheck8"></label>
                        <label for="exampleCheck8" class="profile-info__check-text job-resolution-checkbox">Гибкий
                            график</label>
                    </div>
                    <div class="form-check d-flex">
                        <input type="checkbox" class="form-check-input" id="exampleCheck9"
                               name="Checkbox[Удалённая работа]"
                               value="Checked" <?= $checkbox['Удалённая работа'] ?>>
                        <label class="form-check-label" for="exampleCheck9"></label>
                        <label for="exampleCheck9" class="profile-info__check-text job-resolution-checkbox">Удалённая
                            работа</label>
                    </div>
                    <div class="form-check d-flex">
                        <input type="checkbox" class="form-check-input" id="exampleCheck10"
                               name="Checkbox[Вахтовый метод]"
                               value="Checked" <?= $checkbox['Вахтовый метод'] ?>>
                        <label class="form-check-label" for="exampleCheck10"></label>
                        <label for="exampleCheck10"
                               class="profile-info__check-text job-resolution-checkbox">Вахтовый
                            метод</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb32">
            <div class="col-12">
                <div class="heading">Расскажите о себе</div>
            </div>
        </div>
        <div class="row mb64 mobile-mb32">
            <div class="col-lg-2 col-md-3">
                <div class="paragraph">О себе</div>
            </div>
            <?= $form->field($resume, 'about_me', ['options' => ['class' => 'col-lg-5 col-md-7 col-12']])->label(
                false
            )->textarea(['class' => 'dor-input w100 h176 mb8', 'value' => ($resume['about_me'])]) ?>
        </div>
        <div class="row mb128 mobile-mb64">
            <div class="col-lg-2 col-md-3">
            </div>
            <div class="col-lg-10 col-md-9">
                <?= Html::submitButton('Сохранить', ['class' => 'orange-btn link-orange-btn']) ?>
            </div>
        </div>
        <?php
        ActiveForm::end(); ?>
    </div>
</div>