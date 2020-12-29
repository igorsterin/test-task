<?php
use yii\helpers\Html;
?>
<p>
    <li><label>Фото</label>: <?php echo ($model->photo) ?></li>
    <li><label>Фамилия</label>:<?php var_dump($model->lastname) ?></li>
    <li><label>Имя</label>:<?php var_dump($model->name) ?></li>
    <li><label>Отчество</label>:<?php var_dump($model->middlename) ?></li>
    <li><label>Дата рождения</label>: <?php var_dump($model->birthdate) ?></li>
    <li><label>Пол</label>: <?php var_dump($model->sex) ?></li>
    <li><label>Город</label>: <?php var_dump($model->city) ?></li>
    <li><label>Email</label>: <?php var_dump($model->email) ?></li>
    <li><label>Телефон</label>: <?php var_dump($model->mobile) ?></li>
    <li><label>Специализация</label>: <?php var_dump($model->specialization) ?></li>
    <li><label>Зарплата</label>: <?php var_dump($model->salary) ?></li>
    <li><label>Занятость</label>: <?php var_dump($model->employment) ?></li>
    <li><label>График</label>: <?php var_dump($model->shedule) ?></li>
    <li><label>Обо мне</label>: <?php var_dump($model->aboutme) ?></li>
</p>