<?php

namespace app\models;

use Yii;
use yii\base\Model;

class Checked extends Model
{
    
    public function employment ($empl)
    {
      $chk['Не указано'] = $chk['Полная занятость'] = $chk['Частичная занятость'] = $chk['Проектная/Временная работа'] = $chk['Волонтёрство'] = $chk['Стажировка'] = null;

if (empty($empl)===false) {foreach ($empl as $value) {
  $chk[$value] = 'checked';
}}
        
return($chk);
    }
    
    
    public function shedule ($shdl)
    {
$chk['Не указано'] = $chk['Полный день'] = $chk['Сменный график'] = $chk['Гибкий график'] = $chk['Удалённая работа'] = $chk['Вахтовый метод'] = null;

if (empty($shdl)===false) {foreach ($shdl as $value) {
  $chk[$value] = 'checked';
}}
        
return($chk);
    }

    
}