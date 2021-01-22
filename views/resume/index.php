<?php

/**
 * @var $this yii\web\View
 * @var $url1 string
 * @var $count int
 * @var $listResume array|yii\db\ActiveRecord[]
 * @var $data array
 */

use app\models\viewModels\TextHelper;
use yii\helpers\Url;
use yii\web\Controller;

extract($data, EXTR_OVERWRITE);
$this->title = 'Мои резюме';

//замена даты публикации с формата yyyy:mm:dd hh:mm:ss на формат dd месяц на русском yyyy в hh:mm
$listResume = TextHelper::replaceAllDate($listResume, $count);

$url1 = Url::toRoute(['resume/create']);

$js =
    <<<JS
    function deleteRes(id) {    
$.post(
  "test_task/web/index.php?r=resume%2Fdelete",
  {
    param: id,
  },
  onAjaxSuccess
);
function onAjaxSuccess(data)
    {
let elem = document.getElementById(id);
elem.parentNode.removeChild(elem); 
let elsp = document.getElementById('spn');
elsp.innerText=data; } }
JS;

$this->registerJs($js, 3);

?>

<div class="content">
    <div class="container">
        <div class="col-lg-9">
            <div class="main-title mb32 mt50 d-flex justify-content-between align-items-center">Мои резюме
                <a href=<?= '"' . $url1 . '"' ?> class="link-orange-btn orange-btn my-vacancies-add-btn">Добавить
                резюме</a><a
                        class="my-vacancies-mobile-add-btn link-orange-btn orange-btn plus-btn"
                        href=<?= '"' . $url1 . '"' ?>>+</a></div>
            <div class="tabs mb64">
                <div class="tabs__content active">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex">
                                <div class="paragraph mb8 mr16">У вас <span id="spn"><?= $count ?></span> резюме</div>
                            </div>

                            <?php
                            for ($i = 0; $i < $count; $i++) {
                                $id = $listResume[$i]['id'];
                                $url2 = Url::toRoute(['resume/view', 'id' => $id]);
                                $url3 = Url::toRoute(['resume/update', 'id' => $id]);
                                $data = compact('listResume', 'i', 'url2', 'url3');

                                echo $this->render('pageBlock', ['data' => $data]);
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

