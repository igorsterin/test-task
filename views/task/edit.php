 <?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$div1 = '<div class="col-lg-2 col-md-3 dflex-acenter"></div>';
$div2 = '<div class="col-lg-3 col-md-4 col-11"></div>';
?>



        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="mt8 mb40"><a href="#"><img src="images/blue-left-arrow.svg" alt="arrow"> Вернуться без
                        сохранения</a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="main-title mb24">Новое резюме</div>
                </div>
            </div>
            <div class="col-12">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row mb16">
                    
                <?= $form->field($model, 'testname')->label('Тест', ['class' => 'test123'])->input('text', ['class' => 'test123']) ?> 
                    
                </div>
                             <div class="row mb16">
                        <div id="1" class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Фамилия</div>
                        </div>
                            <?= $form->field($model, 'lastname', ['options' => ['class' => 'col-lg-3 col-md-4 col-11']])->label(false)->input('text', ['class' => 'dor-input w100']) ?> 
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Имя</div>
                        </div>
                            <?= $form->field($model, 'name', ['options' => ['class' => 'col-lg-3 col-md-4 col-11']])->label(false)->input('text', ['class' => 'dor-input w100']) ?>                    
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Отчество</div>
                        </div>
                       <?= $form->field($model, 'middlename', ['options' => ['class' => 'col-lg-3 col-md-4 col-11']])->label(false)->input('text', ['class' => 'dor-input w100']) ?>
                    </div>
                    <div class="row mb24">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Дата рождения</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="datepicker-wrap input-group date">
                                 <?= $form->field($model, 'birthdate', ['options' => ['class' => 'datepicker-wrap input-group date']])->label(false)->input('text', ['class' => 'dor-input dpicker datepicker-input']) ?>
                                <img src="images/mdi_calendar_today.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Пол</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            
                            <?= $form->field($model, 'qqq', ['options' => ['class' => 'card-ul-radio profile-radio-list']])->label(false)->RadioList(['0' => 'Мужской', '1' => 'Женский'], [  'value'=>0, 'item' => function($index,$label,$name,$checked,$value){
                                        return '<li>' .
                Html::radio($name, $checked, ['id' => 'r'.$value, 'value' => $value]) . '<label for="r'.$value.'">' . $label . '</label></li>' ;
                                    }]) ?>
                        </div>
                        
                    </div>
                
                

              

                    <div class="row mb16">
                        
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Город проживания</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <input type="text" class="dor-input w100">
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
                            <div class="p-rel">
                                <input type="text" class="dor-input w100">
                            </div>
                        </div>
                    </div>
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Телефон</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div style="width: 140px;" class="p-rel mobile-w100">
                                <input type="text" class="dor-input w100" placeholder="+7 ___ ___-__-__">
                            </div>
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
                            <div class="citizenship-select">
                               <?= $form->field($model, 'qqq', ['options' => ['class' => 'nselect-1']])->label(false)->ListBox(['Программист','Дизайнер','Повар','Акробат']) ?>
                            </div>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Зарплата</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="p-rel">
                                <input placeholder="От" type="text" class="dor-input w100">
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
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1"></label>
                                    <label for="exampleCheck1" class="profile-info__check-text job-resolution-checkbox">Полная
                                        занятость</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2"></label>
                                    <label for="exampleCheck2" class="profile-info__check-text job-resolution-checkbox">Частичная
                                        занятость</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3">
                                    <label class="form-check-label" for="exampleCheck3"></label>
                                    <label for="exampleCheck3" class="profile-info__check-text job-resolution-checkbox">Проектная/Временная
                                        работа</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck4">
                                    <label class="form-check-label" for="exampleCheck4"></label>
                                    <label for="exampleCheck4" class="profile-info__check-text job-resolution-checkbox">Волонтёрство</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck5">
                                    <label class="form-check-label" for="exampleCheck5"></label>
                                    <label for="exampleCheck5" class="profile-info__check-text job-resolution-checkbox">Стажировка</label>
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
                                    <input type="checkbox" class="form-check-input" id="exampleCheck6">
                                    <label class="form-check-label" for="exampleCheck6"></label>
                                    <label for="exampleCheck6" class="profile-info__check-text job-resolution-checkbox">Полный
                                        день</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck7">
                                    <label class="form-check-label" for="exampleCheck7"></label>
                                    <label for="exampleCheck7" class="profile-info__check-text job-resolution-checkbox">Сменный
                                        график</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck8">
                                    <label class="form-check-label" for="exampleCheck8"></label>
                                    <label for="exampleCheck8" class="profile-info__check-text job-resolution-checkbox">Гибкий
                                        график</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck9">
                                    <label class="form-check-label" for="exampleCheck9"></label>
                                    <label for="exampleCheck9" class="profile-info__check-text job-resolution-checkbox">Удалённая
                                        работа</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck10">
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
                        <div class="col-lg-5 col-md-7 col-12">
                            <textarea class="dor-input w100 h176 mb8"></textarea>
                        </div>
                    </div>
                    <div class="row mb128 mobile-mb64">
                        <div class="col-lg-2 col-md-3">
                        </div>
                        <div class="col-lg-10 col-md-9">
                            <a href="#" class="orange-btn link-orange-btn">Сохранить</a>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>