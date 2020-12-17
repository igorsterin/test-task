 <?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

if (isset($resume['sex'])) {$vls = $resume['sex']; } else {$vls = 'Мужской';}

?>
<style>
.help-block {
    font-style: normal;
    font-weight: 500;
    font-size: 14px;
    line-height: 24px;
    color: #262a36;
    }
</style>
<script type="text/javascript">
function changeimg() {
    let input = document.getElementById("in1");
    var fReader = new FileReader();
alert(fReader.readAsDataURL(input.files[0]));
//document.getElementById("img1").innerHTML='<img src='+path+'/>';
}
</script>


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
                    <div class="main-title mb24"><?=$title?></div>
                </div>
            </div>
            <div class="col-12">
                <?php $form = ActiveForm::begin(); ?>
                
                 <div class="row mb32">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Фото</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div id="img1" class="profile-foto-upload mb8"><img src="images/profile-foto.jpg" alt="foto">
                            </div>
                            <label class="custom-file-upload">
                                <input type="file" id="in1" name="EditForm[photo]" onchange="showFile(this)" >
                                Изменить фото
                            </label>
                        </div>
                    </div>
                
             <!--   <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Тест</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11 field-editform-testname required" >
                             <input type="text" id="editform-testname" class="dor-input w100" name="EditForm[testname]" aria-required="true">

<p class="help-block help-block-error"></p>
                        </div>
                    </div> --> <!-- неудачная попытка вручную воспроизвести клиентскую валидацию activefield(это поле не пропишется в соответствующей фунцкии jquery)-->
                
                             <div class="row mb16">
                        <div id="1" class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Фамилия</div>
                        </div>
                            <?= $form->field($model, 'lastname', ['options' => ['class' => 'col-lg-3 col-md-4 col-11']])->label(false)->input('text', ['class' => 'dor-input w100', 'value' => $resume['lastname']]) ?> 
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Имя</div>
                        </div>
                            <?= $form->field($model, 'name', ['options' => ['class' => 'col-lg-3 col-md-4 col-11']])->label(false)->input('text', ['class' => 'dor-input w100', 'value' => $resume['name']]) ?>                    
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Отчество</div>
                        </div>
                       <?= $form->field($model, 'middlename', ['options' => ['class' => 'col-lg-3 col-md-4 col-11']])->label(false)->input('text', ['class' => 'dor-input w100', 'value' => $resume['middlename']]) ?>
                    </div>
                    <div class="row mb24">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Дата рождения</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="datepicker-wrap input-group date">
                                
                                 <?= $form->field($model, 'birthdate', ['options' => ['class' => 'datepicker-wrap input-group date']])->label(false)->input('text', ['class' => 'dor-input dpicker datepicker-input', 'autocomplete' => 'off', 'value' => $resume['birthdate']]) ?>
                                
                                <img src="images/mdi_calendar_today.svg" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Пол</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            
                            <?= $form->field($model, 'sex', ['options' => ['class' => 'card-ul-radio profile-radio-list']])->label(false)->RadioList(['Мужской' => 'Мужской', 'Женский' => 'Женский'], [  'value' => $vls, 'item' => function($index,$label,$name,$checked,$value){
                                        return '<li>' .
                Html::radio($name, $checked, ['id' => $value, 'value' => $value]) . '<label for="'.$value.'">' . $label . '</label></li>' ;
                                    }]) ?>
                        </div>
                        
                    </div>

                    <div class="row mb16">
                        
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Город проживания</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            
                         <?=  $form->field($model, 'city', ['options' => ['class' => 'citizenship-select']])->label(false)->dropDownList(['Кемерово' => 'Кемерово', 'Новосибирск' => 'Новосибирск', 'Иркутск' => 'Иркутск', 'Красноярск' => 'Красноярск', 'Барнаул' => 'Барнаул'],['class' => 'nselect-1', 'value' => $resume['city']]) ?> 
                         
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
                                  <?= $form->field($model, 'email', ['options' => ['class' => 'p-rel']])->label(false)->input('text', ['class' => 'dor-input w100', 'value' => $resume['email']]) ?>   
                        </div>
                    </div>
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Телефон</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                              <?= $form->field($model, 'mobile', ['options' => ['style' => 'width: 140px', 'class' => 'p-rel mobile-w100']])->label(false)->input('text', ['class' => 'dor-input w100', 'placeholder' => '+7 ___ ___-__-__', 'value' => $resume['mobile']]) ?>   
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
                          
                               <?= $form->field($model, 'specialization', ['options' => ['class' => 'citizenship-select']])->label(false)->dropDownList(['Программирование, Разработка' => 'Программирование, Разработка', 'Web инженер' => 'Web инженер', 'Web мастер' => 'Web мастер', 'Оптимизация сайта (SEO)' => 'Оптимизация сайта (SEO)', 'Администратор баз данных' => 'Администратор баз данных', 'Системный администратор' => 'Системный администратор', 'Компьютерная безопасность' => 'Компьютерная безопасность'],['class' => 'nselect-1', 'value' => $resume['specialization']]) ?>
                            
                        </div>
                    </div>
                    <div class="row mb16">
                        <div class="col-lg-2 col-md-3 dflex-acenter">
                            <div class="paragraph">Зарплата</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="p-rel">
                             <?= $form->field($model, 'salary'/*, ['options' => ['class' => 'datepicker-wrap input-group date']]*/)->label(false)->input('text', ['placeholder' => 'От', 'class' => 'dor-input w100', 'value' => $resume['salary']]) ?>
                                <img class="rub-icon" src="images/rub-icon.svg" alt="rub-icon">
                            </div>
                        </div>
                    </div>
                
                <?php /*$form->field($model, 'employment')->checkboxlist(['odin','dva'])->label(false) */ ?>
                
                <?php /*$form->field($model, 'aaa')->dropDownList(['odin','dva','tri'])->label(false)*/  ?>
                
                    <div class="row mb32">
                        <div class="col-lg-2 col-md-3">
                            <div class="paragraph">Занятость</div>
                        </div>
                        <div class="col-lg-3 col-md-4 col-11">
                            <div class="profile-info">
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="EditForm[employment][]" value="Полная занятость" <?=$empl['Полная занятость']?>> 
                                    <label class="form-check-label" for="exampleCheck1"></label>
                                    <label for="exampleCheck1" class="profile-info__check-text job-resolution-checkbox">Полная
                                        занятость</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2" name="EditForm[employment][]" value="Частичная занятость" <?=$empl['Частичная занятость']?>>
                                    <label class="form-check-label" for="exampleCheck2"></label>
                                    <label for="exampleCheck2" class="profile-info__check-text job-resolution-checkbox">Частичная
                                        занятость</label>
                                </div>
                                <div class="form-check d-flex"> 
                                    <input type="checkbox" class="form-check-input" id="exampleCheck3" name="EditForm[employment][]" value="Проектная/Временная работа" <?=$empl['Проектная/Временная работа']?>>
                                    <label class="form-check-label" for="exampleCheck3"></label>
                                    <label for="exampleCheck3" class="profile-info__check-text job-resolution-checkbox">Проектная/Временная
                                        работа</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck4" name="EditForm[employment][]" value="Волонтёрство" <?=$empl['Волонтёрство']?>>
                                    <label class="form-check-label" for="exampleCheck4"></label>
                                    <label for="exampleCheck4" class="profile-info__check-text job-resolution-checkbox">Волонтёрство</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck5" name="EditForm[employment][]" value="Стажировка" <?=$empl['Стажировка']?>>
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
                                    <input type="checkbox" class="form-check-input" id="exampleCheck6" name="EditForm[shedule][]" value="Полный день" <?=$shdl['Полный день']?>>
                                    <label class="form-check-label" for="exampleCheck6"></label>
                                    <label for="exampleCheck6" class="profile-info__check-text job-resolution-checkbox">Полный
                                        день</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck7" name="EditForm[shedule][]" value="Сменный график" <?=$shdl['Сменный график']?>>
                                    <label class="form-check-label" for="exampleCheck7"></label>
                                    <label for="exampleCheck7" class="profile-info__check-text job-resolution-checkbox">Сменный
                                        график</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck8" name="EditForm[shedule][]" value="Гибкий график" <?=$shdl['Гибкий график']?>>
                                    <label class="form-check-label" for="exampleCheck8"></label>
                                    <label for="exampleCheck8" class="profile-info__check-text job-resolution-checkbox">Гибкий
                                        график</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck9" name="EditForm[shedule][]" value="Удалённая работа" <?=$shdl['Удалённая работа']?>>
                                    <label class="form-check-label" for="exampleCheck9"></label>
                                    <label for="exampleCheck9" class="profile-info__check-text job-resolution-checkbox">Удалённая
                                        работа</label>
                                </div>
                                <div class="form-check d-flex">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck10" name="EditForm[shedule][]" value="Вахтовый метод" <?=$shdl['Вахтовый метод']?>>
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
                             <?= $form->field($model, 'aboutme', ['options' => ['class' => 'col-lg-5 col-md-7 col-12']])->label(false)->textarea(['class' => 'dor-input w100 h176 mb8', 'value' => ($resume['aboutme'])]) ?>
                    </div>
                    <div class="row mb128 mobile-mb64">
                        <div class="col-lg-2 col-md-3">
                        </div>
                        <div class="col-lg-10 col-md-9">
                         <?= Html::submitButton('Сохранить', ['class' => 'orange-btn link-orange-btn'] ) ?>
                        </div>
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>