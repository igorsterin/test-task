<?php


namespace app\models\viewModels;


class TextHelper
{
    /**
     * @param $bd string
     * @return string
     */
    public static function ageCalc($bd)
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

    /**
     * @param $array
     * @return string
     */
    public static function checkboxGetName($array)
    {
        $i = 1;
        $k=1;
        while ($name = current($array)) {
            if ($name == 'Checked') {
               $arrayName[$i] = key($array);
                $i++;
                //$k = 4;
            }
            next($array);
        }
        if(isset($arrayName)) {
        return join(', ', $arrayName);} else {
            return 'Не указано';
        }
    }
}