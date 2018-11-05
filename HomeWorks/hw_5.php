<?php

// Впуск
function induction()
{
    return "Открыть впускные клапана, опустить поршень.";
}

// Сжатие
function compression()
{
    return "Поднять поршень.";
}

// Рабочий ход
function power()
{
    return "Искра, взрыв, опустить поршень";
}

// Выхлоп
function exhaust()
{
    return "Открыть выпускные клапана, поднять поршень.";
}
// Функция для любого такта двигателя
function engine_tact(
    $tactFirstCylinder,
    $tactSecondCylinder,
    $tactThirdCylinder,
    $tactFourthCylinder)
{
    $cylinders = [
        "Поршень 1: $tactFirstCylinder",
        "Поршень 2: $tactSecondCylinder",
        "Поршень 3: $tactThirdCylinder",
        "Поршень 4: $tactFourthCylinder"
    ];
    return $cylinders;
}

// Управление цилиндрами
function management_tacts()
{
    $induction = induction();
    $compression = compression();
    $power = power();
    $exhaust = exhaust();

    $managementTacts = [
        engine_tact($induction, $compression, $exhaust, $power),
        engine_tact($compression, $power, $induction, $exhaust),
        engine_tact($power, $exhaust, $compression, $induction),
        engine_tact($exhaust, $induction, $power, $compression)
    ];
    return $managementTacts;
}

// Управление двигателем
function management_engine()
{
    $managementTacts = management_tacts();
    return $managementTacts;
}

// Вывод (При запуске в консоли будет отображаться работа двигателя, IDE падает).
$i = 1;
while ($i == 1) {
    foreach (management_engine() as $value) {
        foreach ($value as $index){
            echo $index;
            echo "\n";
        }
        echo "\n";
    }
}
?>