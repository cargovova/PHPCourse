<?php
$yesterdayTemperature = 17;
$todayTemperature = 15;
$tomorrowTemperature = 14;
$isPrecipitation = true;
$annaСommented = 'Сегодня холодно, я замерзла';
define(LOW_TEMPERATURE, 13);
define(VERY_LOW_TEMPERATURE, 11);

// Функция слушающая чужое мнение.
function correlateOpinion($Annacommented)
{
    if (preg_match('/холодно/', $Annacommented) && preg_match('/заморозки/', $Annacommented) === 1 || preg_match('/холодно/', $Annacommented) && preg_match('/замерзла/', $Annacommented) === 1 || preg_match('/замерзла/', $Annacommented) && preg_match('/заморозки/', $Annacommented) === 1) {
        return 'very cold';
    } elseif (preg_match('/холодно/', $Annacommented) === 1 || preg_match('/замерзла/', $Annacommented) === 1 || preg_match('/заморозки/', $Annacommented) === 1) {
        return 'cold';
    }
}

// Функция находит разницу и проверяет больше ли она 3 или 5
function checkHowFrosty($todayTemperature, $tomorrowTemperature, $countDegrees)
{
    $subtraction = $todayTemperature - $tomorrowTemperature;
    if ($subtraction > $countDegrees) {
        return true;
    }
}

// Функция проверки снижения температуры.
function checkCooling($yesterdayTemperature, $todayTemperature, $tomorrowTemperature)
{
    if ($yesterdayTemperature > $todayTemperature && $todayTemperature > $tomorrowTemperature) {
        return true;
    }
}

// Функция проверки температуры вчера и завтра (больше или меньше 11).
function regardWithEleven($yesterdayTemperature, $tomorrowTemperature)
{
    if ($yesterdayTemperature > VERY_LOW_TEMPERATURE && $tomorrowTemperature > VERY_LOW_TEMPERATURE) {
        return true;
    } elseif ($yesterdayTemperature < VERY_LOW_TEMPERATURE && $tomorrowTemperature < VERY_LOW_TEMPERATURE) {
        return false;
    }
}

function solveHowCold($todayTemperature, $yesterdayTemperature, $tomorrowTemperature, $annaСommented)
{
    // Если сегодня < 13, а завтра и послезавтра > больше 11
    if ($todayTemperature < LOW_TEMPERATURE && regardWithEleven($yesterdayTemperature, $tomorrowTemperature) === true) {
        $momSay = 'Одень шапку';
    } // Если сегодня < 13, а завтра и послезавтра < 11
    elseif ($todayTemperature < LOW_TEMPERATURE && regardWithEleven($yesterdayTemperature, $tomorrowTemperature) === false) {
        $momSay = 'Одень зимнюю шапку';
    } // Если температура падает и найдено хотя бы одно слово
    elseif (checkCooling($yesterdayTemperature, $todayTemperature, $tomorrowTemperature) === true || correlateOpinion($annaСommented) === 'cold') {
        $momSay = 'Ты хорошо оделся?';
    }
    return $momSay;
}

// Если есть осадки
function checkPrecipitation($isPrecipitation)
{
    if ($isPrecipitation === true) {
        $momSay .= ' и возьми с собой зонтик';
    }
    return $momSay;
}

// Если есть осадки и разница больше 3
function solveHowFrosty($isPrecipitation, $todayTemperature, $tomorrowTemperature)
{
    if ($isPrecipitation === true && checkHowFrosty($todayTemperature, $tomorrowTemperature, 3) == true) {
        $momSay .= ' и шарф';
    }
    return $momSay;
}

// Ты не пройдёшь!
function findShtorm($annaСommented, $yesterdayTemperature, $todayTemperature, $tomorrowTemperature)
{
    if (correlateOpinion($annaСommented) === 'very cold' && checkCooling($yesterdayTemperature, $todayTemperature, $tomorrowTemperature) == true && checkHowFrosty($todayTemperature, $tomorrowTemperature, 5) == true) {
        $momSay = 'STOP!!!';
    }
    return $momSay;
}

function thinkingMom($isPrecipitation, $todayTemperature, $yesterdayTemperature, $tomorrowTemperature, $annaСommented)
{
    solveHowCold($todayTemperature, $yesterdayTemperature, $tomorrowTemperature, $annaСommented);
    checkPrecipitation($isPrecipitation);
    solveHowFrosty($isPrecipitation, $todayTemperature, $tomorrowTemperature);
    findShtorm($annaСommented, $yesterdayTemperature, $todayTemperature, $tomorrowTemperature);
}
thinkingMom();
?>