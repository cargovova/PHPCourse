<?php
$yesterdayTemperature = 17;
$todayTemperature = 15;
$tomorrowTemperature = 1;
$isPrecipitation = true;
$annaСommented = 'Сегодня холодно, я замерзла';
define(LOW_TEMPERATURE, 13);
define(VERY_LOW_TEMPERATURE, 11);
// Функция ищущая слово в комменте Анны
function findWords($Annacommented)
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
function subtractionTemperature($todayTemperature, $tomorrowTemperature, $countDegrees)
{
    $subtraction = $todayTemperature - $tomorrowTemperature;
    if ($subtraction > $countDegrees) {
        return true;
    }
}
// Ищем пару слов в коменте Анны
function findCoupleWords($Annacommented)
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
function decreaseTemperature($yesterdayTemperature, $todayTemperature, $tomorrowTemperature)
{
    if ($yesterdayTemperature > $todayTemperature && $todayTemperature > $tomorrowTemperature) {
        return true;
    }
}
// Функция проверки температуры вера и завтра (больше или меньше 11).
function regardingEleven($yesterdayTemperature, $tomorrowTemperature) {
    if ($yesterdayTemperature > VERY_LOW_TEMPERATURE && $tomorrowTemperature > VERY_LOW_TEMPERATURE){
        return true;
    } elseif ($yesterdayTemperature < VERY_LOW_TEMPERATURE && $tomorrowTemperature < VERY_LOW_TEMPERATURE) {
        return false;
    }
}
// Если сегодня < 13, а завтра и послезавтра > больше 11
if ($todayTemperature < LOW_TEMPERATURE && regardingEleven($yesterdayTemperature, $tomorrowTemperature) == true) {
    $momSay = 'Одень шапку';
} // Если сегодня < 13, а завтра и послезавтра < 11
elseif ($todayTemperature < LOW_TEMPERATURE && regardingEleven($yesterdayTemperature, $tomorrowTemperature) == false) {
    $momSay = 'Одень зимнюю шапку';
} // Если температура падает и найдено хотя бы одно слово
elseif (decreaseTemperature($yesterdayTemperature, $todayTemperature, $tomorrowTemperature) == true ||
    findWords($annaСommented) == 1) {
        $momSay = 'Ты хорошо оделся?';
}
// Если есть осадки
if ($isPrecipitation == true) {
    $momSay .= ' и возьми с собой зонтик';
}
// Если есть осадки и разница больше 3
if ($isPrecipitation == true && subtractionTemperature($todayTemperature, $tomorrowTemperature, 3) == true) {
    $momSay .= ' и шарф';
}
// Ты не пройдёшь!
if (findCoupleWords($annaСommented) == true &&
    decreaseTemperature($yesterdayTemperature, $todayTemperature, $tomorrowTemperature) == true &&
    subtractionTemperature($todayTemperature, $tomorrowTemperature, 5) == true) {
        $momSay = 'STOP!!!';
    }
    echo $momSay;
    ?> 