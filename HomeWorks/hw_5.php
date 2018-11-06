<?php

// Впуск
function runInduction($cylinderNumber)
{
    echo "$cylinderNumber Открыть впускные клапана</br>$cylinderNumber Опустить поршень.</br>";
}

// Сжатие
function runCompression($cylinderNumber)
{
    echo "$cylinderNumber Поднять поршень.</br>";
}

// Рабочий ход
function runPower($cylinderNumber)
{
    echo "$cylinderNumber Искра</br>$cylinderNumber Опустить поршень.</br>";
}

// Выхлоп
function runExhaust($cylinderNumber)
{
    echo "$cylinderNumber Открыть выпускные клапана,</br>$cylinderNumber Поднять поршень.</br>";
}

function runTact($numberEngineTact)
{
    echo "Такт № $numberEngineTact</br>";
}

// Функция для любого такта двигателя
function runEngineTact($numberEngineTact)
{
    switch ($numberEngineTact) {
        case 1:
            $engineTact = [
                runTact($numberEngineTact),
                runInduction('Цилиндр 1'),
                runCompression('Цилиндр 2'),
                runExhaust('Цилиндр 3'),
                runPower('Цилиндр 4')
            ];
            break;
        case 2:
            $engineTact = [
                runTact($numberEngineTact),
                runCompression('Цилиндр 1'),
                runPower('Цилиндр 2'),
                runInduction('Цилиндр 3'),
                runExhaust('Цилиндр 4')
            ];
            break;
        case 3:
            $engineTact = [
                runTact($numberEngineTact),
                runPower('Цилиндр 1'),
                runExhaust('Цилиндр 2'),
                runCompression('Цилиндр 3'),
                runInduction('Цилиндр 4')
            ];
            break;
        case 4:
            $engineTact = [
                runTact($numberEngineTact),
                runExhaust('Цилиндр 1'),
                runInduction('Цилиндр 2'),
                runPower('Цилиндр 3'),
                runCompression('Цилиндр 4')
            ];
            break;
    }
    return $engineTact;
}

function runEngine()
{
    $engineWork = [];
    for ($i = 1; $i <= 4; $i ++) {
        array_push($engineWork, runEngineTact($i));
    }
    return $engineWork;
}
runEngine();
?>