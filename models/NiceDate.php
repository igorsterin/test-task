<?php

namespace app\models;

class NiceDate
{  
    /**
    * @param string $primer dgfdg
    */
    
    public function replaceAllDate ($lr, $count)
{
    for ($i=0; $i<$count; $i++)
    {
        $lr[$i]["pubdate"] = NiceDate::replaceDate($lr[$i]["pubdate"]); 
    }
        return $lr;
} 
    
    
    public function replaceDate ($primer)
{
    
      $primer =  strtotime($primer);
    switch (date('n', $primer)) {
    case 1: $mn = "января"; break;
    case 2: $mn = "февраля"; break;
    case 3: $mn = "марта"; break;
    case 4: $mn = "апреля"; break;
    case 5: $mn = "мая"; break;
    case 6: $mn = "июня"; break;
    case 7: $mn = "июля"; break;
    case 8: $mn = "августа"; break;
    case 9: $mn = "сентября"; break;
    case 10: $mn = "октября"; break;
    case 11: $mn = "ноября"; break;
    case 12: $mn = "декабря"; break;
}
return date('j '.$mn.' Y в H:i', $primer);
}
    
/**   
 * @param string $msg string to output
 * @author WikiEditor
 * @copyright 2016 Wikipedia
 * @return string unchanged
 */
function foo() {
    return $msg;
}
}



?>