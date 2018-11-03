<?php
// Впуск
function induction()
{
    return "Открыть впускной клапан, опустить поршень.";
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
    return "Открыть выпускной клапан, поднять поршень.";
}
// Управление цилиндрами
function management_cylinders()
{
    $induction = induction();
    $compression = compression();
    $power = power();
    $exhaust = exhaust();
    return $managementCylinders;
}
// Управление двигателем
function management_engine()
{
    $managementCylinders = management_cylinders();
    return $managementCylinders;
}
echo management_engine();
?>