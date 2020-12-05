 <?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="content p-rel">
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
                <?= $form->field($model, 'name')->label('Фамилия', ['class' => 'paragraph']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>