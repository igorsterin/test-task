<?php

/**
 * @var $this yii\web\View
 * @var $data array
 * @var $resume app\models\Resume
 */

extract($data, EXTR_OVERWRITE );
$this->title = "Редактировать резюме";
$vls = $resume['sex'];
$photo = 'uploads/' . $resume->photo;
$data1 = compact('data','vls', 'photo');

echo $this->render('_form', ['data1' => $data1,]);

?>