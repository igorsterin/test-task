<?php 
use yii\helpers\Url;
//use yii\web\UrlManager;

//$url = Url::toRoute(['task/edit']);

function resumePageBlock ($i, $lr, $url2)
{
    $tstval = 'abc123';
    echo '<div class="vakancy-page-block my-vacancies-block p-rel mb16">
                                    <div class="row">
                                        <div class="my-resume-dropdown dropdown show mb8">
                                            <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <img src="images/dots.svg" alt="dots">
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                 aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="#">Редактировать</a>
                                                <a class="dropdown-item" href="#">Удалить</a>
                                            </div>
                                        </div>
                                        <div class="col-xl-12 my-vacancies-block__left-col mb16">
                                            <h2 class="mini-title mb8">PHP разработчик</h2>
                                            <div class="d-flex align-items-center flex-wrap mb8 ">
                                                <span class="mr16 paragraph">'.$lr[$i]["salary"].' ₽</span>
                                                <span class="mr16 paragraph">'.$lr[$i]["city"].'</span>
                                            </div>
                                            <div class="d-flex flex-wrap">
                                                <div class="paragraph mr16">
                                                    <strong>Просмотров</strong>
                                                    <span class="grey">'.$lr[$i]["views"].'</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                                class="col-xl-12 d-flex justify-content-between align-items-center flex-wrap">
                                            <div class="d-flex flex-wrap mobile-mb12">
                                                <a class="mr16" href="'.$url2.'">Открыть</a>
                                            </div>
                                            <span class="mini-paragraph cadet-blue">Опубликовано: '.$lr[$i]["pubdate"].'</span>
                                        </div>
                                    </div>
                                </div>';
}


?>

<div class="content">
        <div class="container">
            <div class="col-lg-9">
                <div class="main-title mb32 mt50 d-flex justify-content-between align-items-center">Мои резюме
                    <a href=<?= '"'.$url1.'"'?> class="link-orange-btn orange-btn my-vacancies-add-btn">Добавить резюме</a><a
                            class="my-vacancies-mobile-add-btn link-orange-btn orange-btn plus-btn" href="#">+</a></div>
                <div class="tabs mb64">
                    <div class="tabs__content active">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="d-flex">
                                    <div class="paragraph mb8 mr16">У вас <span><?= $count ?></span> резюме</div>
                                </div>
                                
                                <?php for ($i=0; $i<$count; $i++) {resumePageBlock($i, $lr, $url2);} //var_dump($lr) ?>
                                
             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>