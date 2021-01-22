<?php

/**
 * @var $this yii\web\View
 * @var $thisResume app\models\Resume
 * @var $age string
 * @var $checkbox app\models\Checkbox
 * @var $data array
 */

use app\models\viewModels\TextHelper;
use yii\helpers\html;

extract($data, EXTR_OVERWRITE );
$age = TextHelper::ageCalc($thisResume->birthdate);
$this->title = 'Просмотр резюме';

if (empty($thisResume->about_me)) {
    $abm = 'Этот раздел еще не заполнен.';
} else {
    $abm = $thisResume->about_me;
}
$checkboxArrays = array_chunk($checkbox->attributes, 6,TRUE);
$employment = TextHelper::checkboxGetName($checkboxArrays[0]);
$schedule = TextHelper::checkboxGetName($checkboxArrays[1]);
?>

<div class="content p-rel">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mt8 mb32"><a href="index.php"><img src="images/blue-left-arrow.svg" alt="arrow">Мои
                        резюме</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-5 mobile-mb32">
                <div class="profile-foto resume-profile-foto"><img
                            src=<?= '"uploads/' . $thisResume->photo . '"' ?> alt="profile-foto">
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="main-title d-md-flex justify-content-between align-items-center mobile-mb16">PHP
                    разработчик
                </div>
                <div class="paragraph-lead mb16">
                    <span class="mr24"><?= number_format($thisResume->salary, 0, ',', ' ') ?> ₽</span>
                </div>
                <div class="profile-info company-profile-info resume-view__info-blick">
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Имя
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $thisResume->lastname ?> <?= $thisResume->name ?> <?= $thisResume->middlename ?>
                        </div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Возраст
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $age ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Занятость</div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $employment ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">График работы
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $schedule ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">Город проживания
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><?= $thisResume->city ?></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">
                            Электронная почта
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><a
                                    href="#"><?= $thisResume->email ?></a></div>
                    </div>
                    <div class="profile-info__block company-profile-info__block mb8">
                        <div class="profile-info__block-left company-profile-info__block-left">
                            Телефон
                        </div>
                        <div class="profile-info__block-right company-profile-info__block-right"><a
                                    href="#"><?= $thisResume->mobile ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="devide-border mb32 mt50"></div>
                <div class="tabs mb50">
                    <div class="tabs__content active">
                        <div class="row">

                            <div class="col-lg-7">
                                <div class="company-profile-text mb64">
                                    <h3 class="heading mb16">Обо мне</h3>
                                    <p><?= nl2br($abm) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>