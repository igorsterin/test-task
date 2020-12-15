<?php 
use yii\helpers\Url;


use yii\web\Controller;




?>

<div class="content">
        <div class="container">
            <div class="col-lg-9">
                <div class="main-title mb32 mt50 d-flex justify-content-between align-items-center">Мои резюме
                    <a href=<?= '"'.$url1.'"'?> class="link-orange-btn orange-btn my-vacancies-add-btn">Добавить резюме</a><a
                            class="my-vacancies-mobile-add-btn link-orange-btn orange-btn plus-btn" href=<?= '"'.$url1.'"'?>>+</a></div>
                <div class="tabs mb64">
                    <div class="tabs__content active">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="paragraph mb8 mr16">У вас <span><?= $count ?></span> резюме</div>
                                </div>
                                
                                <?php for ($i=0; $i<$count; $i++) {echo $this->render('pageblock', ['lr' => $lr, 'i' => $i, 'url2' => Url::toRoute(['task/view', 'id' => $i+1]), 'url3' => Url::toRoute(['task/edit', 'id' => $i+1]) ]);}  ?>
             
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>