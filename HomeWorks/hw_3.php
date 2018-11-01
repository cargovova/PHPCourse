<?php
$yesterdayTemperature = 17;
$todayTemperature = 15;
$tomorrowTemperature = 1;
$isPrecipitation = true;
$annaСommented = 'Сегодня холодно, я замерзла';

// Функция ищущая слово в комменте Анны
function find_words($Annacommented)
{
    if (preg_match('/холодно/', $Annacommented) === 1) {
        return 1;
    } elseif (preg_match('/заморозки/', $Annacommented) === 1) {
        return 1;
    } elseif (preg_match('/замерзла/', $Annacommented) === 1) {
        return 1;
    }
}

// Функция находит разницу и проверяет больше ли она 3 или 5
function subtraction_temperature($todayTemperature, $tomorrowTemperature, $countDegrees)
{
    $subtraction = $todayTemperature - $tomorrowTemperature;
    if ($subtraction > $countDegrees) {
        return true;
    }
}

// Ищем пару слов в коменте Анны
function find_couple_words($Annacommented)
{
    if (preg_match('/холодно/', $Annacommented) && preg_match('/заморозки/', $Annacommented) === 1) {
        return true;
    } elseif (preg_match('/холодно/', $Annacommented) && preg_match('/замерзла/', $Annacommented) === 1) {
        return true;
    } elseif (preg_match('/замерзла/', $Annacommented) && preg_match('/заморозки/', $Annacommented) === 1) {
        return true;
    }
}

// Функция проверки снижения температуры.
function decrease_temperature($yesterdayTemperature, $todayTemperature, $tomorrowTemperature)
{
    if ($yesterdayTemperature > $todayTemperature && $todayTemperature > $tomorrowTemperature) {
        return true;
    }
}

// Функция проверки температуры вера и завтра (больше или меньше 11).
function regarding_eleven($yesterdayTemperature, $tomorrowTemperature) {
    if ($yesterdayTemperature > 11 && $tomorrowTemperature > 11){
        return true;
    } elseif ($yesterdayTemperature < 11 && $tomorrowTemperature < 11) {
        return false;
    }
}

// Если сегодня < 13, а завтра и послезавтра > больше 11
if ($todayTemperature < 13 && regarding_eleven($yesterdayTemperature, $tomorrowTemperature) == true) {
    $momSay = 'Одень шапку';
} // Если сегодня < 13, а завтра и послезавтра < 11
elseif ($todayTemperature < 13 && regarding_eleven($yesterdayTemperature, $tomorrowTemperature) == false) {
    $momSay = 'Одень зимнюю шапку';
} // Если температура падает и найдено хотя бы одно слово
elseif (decrease_temperature($yesterdayTemperature, $todayTemperature, $tomorrowTemperature) == true ||
    find_words($annaСommented) == 1) {
        $momSay = 'Ты хорошо оделся?';
}
// Если есть осадки
if ($isPrecipitation == true) {
    $momSay .= ' и возьми с собой зонтик';
}
// Если есть осадки и разница больше 3
if ($isPrecipitation == true && subtraction_temperature($todayTemperature, $tomorrowTemperature, 3) == true) {
    $momSay .= ' и шарф';
}
// Ты не пройдёшь!
if (find_couple_words($annaСommented) == true &&
    decrease_temperature($yesterdayTemperature, $todayTemperature, $tomorrowTemperature) == true &&
    subtraction_temperature($todayTemperature, $tomorrowTemperature, 5) == true) {
        $momSay = 'STOP!!!';
    }
    echo $momSay;
    ?>