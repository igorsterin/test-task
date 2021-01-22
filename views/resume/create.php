<?php

/**
 * @var $this yii\web\View
 */

$this->title = "Новое резюме";
$vls = 'Мужской';
$photo = 'images/profile-foto.jpg';
$data1 = compact('data','vls', 'photo');

echo $this->render('_form', ['data1' => $data1,]);

?>