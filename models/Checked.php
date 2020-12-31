<?php

namespace app\models;


class Checked
{
    /**
     * @param $empl string|null
     * @return array
     */
    public function employmentClick($empl)
    {
        $chk['Не указано'] = $chk['Полная занятость'] = $chk['Частичная занятость'] = $chk['Проектная/Временная работа'] = $chk['Волонтёрство'] = $chk['Стажировка'] = null;

        if (empty($empl) === false) {
            foreach ($empl as $value) {
                $chk[$value] = 'checked';
            }
        }

        return ($chk);
    }

    /**
     * @param $shdl string|null
     * @return array
     */
    public function sheduleClick($shdl)
    {
        $chk['Не указано'] = $chk['Полный день'] = $chk['Сменный график'] = $chk['Гибкий график'] = $chk['Удалённая работа'] = $chk['Вахтовый метод'] = null;

        if (empty($shdl) === false) {
            foreach ($shdl as $value) {
                $chk[$value] = 'checked';
            }
        }

        return ($chk);
    }


}