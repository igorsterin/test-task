<?php

namespace app\models;


class AgeCalc
{
    /**
     * @param $bd string дата рождения
     * @return string
     */
    public function run($bd)
    {
        $now = date("d.m.Y");

        //вычисление возраста и округление в меньшую сторону
        $age = floor((strtotime($now) - strtotime($bd)) / 31536000) . '';
        $ln = strlen($age);

        // если разряд единиц равен 1 и разряд десятков не равен 1
        if ($age{$ln - 1} == 1 and $age{$ln - 2} != 1) {
            $agt = 'год';
        }

        if ($age{$ln - 1} > 1 and $age{$ln - 1} < 5 and $age{$ln - 2} != 1) {
            $agt = 'года';
        }
        if ($age{$ln - 1} > 4 or $age{$ln - 2} == 1 or $age{$ln - 1} == 0) {
            $agt = 'лет';
        }
        return $age . ' ' . $agt;
    }

}

?>