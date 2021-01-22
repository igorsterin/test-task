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
        $now = date('d.m.Y');

        //вычисление возраста и округление в меньшую сторону
        $age = floor((strtotime($now) - strtotime($bd)) / 31536000) . '';
        $ln = strlen($age);

        // если разряд единиц равен 1 и разряд десятков не равен 1
        if ($age{$ln - 1} == 1 && $age{$ln - 2} != 1) {
            $agt = 'год';
        }

        if ($age{$ln - 1} > 1 && $age{$ln - 1} < 5 && $age{$ln - 2} != 1) {
            $agt = 'года';
        }
        if ($age{$ln - 1} > 4 || $age{$ln - 2} == 1 || $age{$ln - 1} == 0) {
            $agt = 'лет';
        }
        return $age . ' ' . $agt;
    }

    /**
     * Метод принимает массив, определяет, какие элементы содержат checked, и возвращает имена (ключи) этих элементов, объединенные в строку
     *
     * @param $array
     * @return string
     */
    public static function checkboxGetName($array)
    {
        $i = 1;
        while ($name = current($array)) {
            if ($name == 'Checked') {
               $arrayName[$i] = key($array);
                $i++;
                         }
            next($array);
        }
        if(isset($arrayName)) {
        return join(', ', $arrayName);} else {
            return 'Не указано';
        }
    }
    
    /**
     * @param $lr array
     * @param $count int
     * @return array
     */
    public static function replaceAllDate($lr, $count)
    {
        for ($i = 0; $i < $count; $i++) {
            $lr[$i]['pub_date'] = TextHelper::replaceDate($lr[$i]['pub_date']);
        }
        return $lr;
    }

    /**
     * @param $primer
     * @return string
     */
    public static function replaceDate($primer)
    {
        $primer = strtotime($primer);
        switch (date('n', $primer)) {
            case 1:
                $mn = 'января';
                break;
            case 2:
                $mn = 'февраля';
                break;
            case 3:
                $mn = 'марта';
                break;
            case 4:
                $mn = 'апреля';
                break;
            case 5:
                $mn = 'мая';
                break;
            case 6:
                $mn = 'июня';
                break;
            case 7:
                $mn = 'июля';
                break;
            case 8:
                $mn = 'августа';
                break;
            case 9:
                $mn = 'сентября';
                break;
            case 10:
                $mn = 'октября';
                break;
            case 11:
                $mn = 'ноября';
                break;
            case 12:
                $mn = 'декабря';
                break;
        }
        return date('j ' . $mn . ' Y в H:i', $primer);
    }

}