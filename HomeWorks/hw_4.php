<?php
$number = 9;

function divide_number($number)
{
    $devideNumber = $number / 2;
    return $devideNumber;
}
$arrayOfNumber = [];
do {
    if (gettype(divide_number($number)) == "integer") {
        array_push($arrayOfNumber, 0);
    } else {
        array_push($arrayOfNumber, 1);
    }
    $number = intval(divide_number($number));
} while (divide_number($number) >= 1);
// Добавить последнюю цифру в зависимости от четности.
if ($number == 1) {
    array_push($arrayOfNumber, 1);
} else {
    array_push($arrayOfNumber, 0);
}
// Перевернём массив и объединим элементы в строку.
$binaryNumber = implode(array_reverse($arrayOfNumber));
// Вывод
echo $binaryNumber;
?>