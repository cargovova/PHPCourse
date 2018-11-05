<?php

// Четвертый уровень - моторы.
function openInductionFlaps($numberEngineTakt)
{
    if ($numberEngineTakt === 1) {
        echo "Такт: $numberEngineTakt Цилиндр 1: Открыть впускные клапана. </br>";
    } elseif ($numberEngineTakt === 2) {
        echo "Такт: $numberEngineTakt Цилиндр 3: Открыть впускные клапана. </br>";
    } elseif ($numberEngineTakt === 3) {
        echo "Такт: $numberEngineTakt Цилиндр 4: Открыть впускные клапана. </br>";
    } elseif ($numberEngineTakt === 4) {
        echo "Такт: $numberEngineTakt Цилиндр 2: Открыть впускные клапана. </br>";
    }
}

function movePistonDown($numberEngineTakt, $cylinderTact)
{
    if ($numberEngineTakt === 1 && $cylinderTact === 'induction') {
        echo "Такт: $numberEngineTakt Цилиндр 1: Опустить поршень. </br>";
    } elseif ($numberEngineTakt === 2 && $cylinderTact === 'induction') {
        echo "Такт: $numberEngineTakt Цилиндр 3: Опустить поршень. </br>";
    } elseif ($numberEngineTakt === 3 && $cylinderTact === 'induction') {
        echo "Такт: $numberEngineTakt Цилиндр 4: Опустить поршень. </br>";
    } elseif ($numberEngineTakt === 4 && $cylinderTact === 'induction') {
        echo "Такт: $numberEngineTakt Цилиндр 2: Опустить поршень. </br>";
    }
    if ($numberEngineTakt === 1 && $cylinderTact === 'power') {
        echo "Такт: $numberEngineTakt Цилиндр 4: Опустить поршень. </br>";
    } elseif ($numberEngineTakt === 2 && $cylinderTact === 'power') {
        echo "Такт: $numberEngineTakt Цилиндр 2: Опустить поршень. </br>";
    } elseif ($numberEngineTakt === 3 && $cylinderTact === 'power') {
        echo "Такт: $numberEngineTakt Цилиндр 1: Опустить поршень. </br>";
    } elseif ($numberEngineTakt === 4 && $cylinderTact === 'power') {
        echo "Такт: $numberEngineTakt Цилиндр 3: Опустить поршень. </br>";
    }
}

function movePistonUp($numberEngineTakt, $cylinderTact)
{
    if ($numberEngineTakt === 1 && $cylinderTact === 'compression') {
        echo "Такт: $numberEngineTakt Цилиндр 2: Поднять поршень. </br>";
    } elseif ($numberEngineTakt === 2 && $cylinderTact === 'compression') {
        echo "Такт: $numberEngineTakt Цилиндр 1: Поднять поршень. </br>";
    } elseif ($numberEngineTakt === 3 && $cylinderTact === 'compression') {
        echo "Такт: $numberEngineTakt Цилиндр 3: Поднять поршень. </br>";
    } elseif ($numberEngineTakt === 4 && $cylinderTact === 'compression') {
        echo "Такт: $numberEngineTakt Цилиндр 4: Поднять поршень. </br>";
    }
    if ($numberEngineTakt === 1 && $cylinderTact === 'exhaust') {
        echo "Такт: $numberEngineTakt Цилиндр 3: Поднять поршень. </br>";
    } elseif (numberTakt === 2 && $cylinderTact === 'exhaust') {
        echo "Такт: $numberEngineTakt Цилиндр 4: Поднять поршень. </br>";
    } elseif (numberTakt === 3 && $cylinderTact === 'exhaust') {
        echo "Такт: $numberEngineTakt Цилиндр 2: Поднять поршень. </br>";
    } elseif (numberTakt === 4 && $cylinderTact === 'exhaust') {
        echo "Такт: $numberEngineTakt Цилиндр 1: Поднять поршень. </br>";
    }
}

function runFlash($numberEngineTakt)
{
    if ($numberEngineTakt === 1) {
        echo "Такт: $numberEngineTakt Цилиндр 4: Искра. </br>";
    } elseif ($numberEngineTakt === 2) {
        echo "Такт: $numberEngineTakt Цилиндр 2: Искра. </br>";
    } elseif ($numberEngineTakt === 3) {
        echo "Такт: $numberEngineTakt Цилиндр 1: Искра. </br>";
    } elseif ($numberEngineTakt === 4) {
        echo "Такт: $numberEngineTakt Цилиндр 3: Искра. </br>";
    }
}

function openExhaustFlaps($numberEngineTakt)
{
    if ($numberEngineTakt === 1) {
        echo "Такт: $numberEngineTakt Цилиндр 3: Открыть выпускные клапана. </br>";
    } elseif ($numberEngineTakt === 2) {
        echo "Такт: $numberEngineTakt Цилиндр 4: Открыть выпускные клапана. </br>";
    } elseif ($numberEngineTakt === 3) {
        echo "Такт: $numberEngineTakt Цилиндр 2: Открыть выпускные клапана. </br>";
    } elseif ($numberEngineTakt === 4) {
        echo "Такт: $numberEngineTakt Цилиндр 1: Открыть выпускные клапана. </br>";
    }
}

// Третий уровень - запуск моторов в зависимости от такта цилиндра.

// Впуск
function runInduction($numberEngineTakt)
{
    $cylinderTact = 'induction';
    $induction = openInductionFlaps($numberEngineTakt) . movePistonDown($numberEngineTakt, $cylinderTact);
    return $induction;
}

// Сжатие
function runCompression($numberEngineTakt)
{
    $cylinderTact = 'compression';
    $compression = movePistonUp($numberEngineTakt, $cylinderTact);
    return $compression;
}

// Рабочий ход
function runPower($numberEngineTakt)
{
    $cylinderTact = 'power';
    $power = runFlash($numberEngineTakt) . movePistonDown($numberEngineTakt, $cylinderTact);
    return $power;
}

// Выхлоп
function runExhaust($numberEngineTakt)
{
    $cylinderTact = 'exhaust';
    $exhaust = openExhaustFlaps($numberEngineTakt) . movePistonUp($numberEngineTakt, $cylinderTact);
    return $exhaust;
}

// Второй уровень - запуск функций в зависимости от номера такта.
function runEngineTakt($numberEngineTakt)
{
    if ($numberEngineTakt === 1) {
        $oneTact = [
            runInduction($numberEngineTakt),
            runCompression($numberEngineTakt),
            runExhaust($numberEngineTakt),
            runPower($numberEngineTakt)
        ];
    } elseif ($numberEngineTakt === 2) {
        $oneTact = [
            runCompression($numberEngineTakt),
            runPower($numberEngineTakt),
            runInduction($numberEngineTakt),
            runExhaust($numberEngineTakt)
        ];
    } elseif ($numberEngineTakt === 3) {
        $oneTact = [
            runPower($numberEngineTakt),
            runExhaust($numberEngineTakt),
            runCompression($numberEngineTakt),
            runInduction($numberEngineTakt)
        ];
    } elseif ($numberEngineTakt === 4) {
        $oneTact = [
            runExhaust($numberEngineTakt),
            runInduction($numberEngineTakt),
            runPower($numberEngineTakt),
            runCompression($numberEngineTakt)
        ];
    }
    return $oneTact;
}

// Первый уровень - запук двигателя - запуск тактов по очереди.
function runEngine()
{
    $engineWork = [];
    for ($i = 1; $i <= 4; $i ++) {
        array_push($engineWork, runEngineTakt($i));
    }
}
runEngine();
?>