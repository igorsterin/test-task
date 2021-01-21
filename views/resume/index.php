<?php

/**
 * @var $this yii\web\View
 * @var $url1 string
 * @var $count int
 * @var $lr array|yii\db\ActiveRecord[]
 */

use yii\helpers\Url;

use yii\web\Controller;

$this->title = 'Мои резюме';

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
                                $id = $lr[$i]["id"];
                                echo $this->render(
                                    'pageblock',
                                    [
                                        'lr' => $lr,
                                        'i' => $i,
                                        'url2' => Url::toRoute(['resume/view', 'id' => $id]),
                                        'url3' => Url::toRoute(['resume/edit', 'id' => $id])
                                    ]
                                );
                            } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

