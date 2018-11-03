<?php
$numberDecimal = 6;
$binaryBasis = 2;
$decimalBasis = 10;

function divide_number($numberDecimal, $binaryBasis)
{
    $devideNumber = $numberDecimal / $binaryBasis;
    return $devideNumber;
}

// Переводим в двоичную
function translate_to_binary($numberDecimal, $binaryBasis)
{
    $binaryArray = [];
    do {
        if (gettype(divide_number($numberDecimal, $binaryBasis)) == "integer") {
            array_push($binaryArray, 0);
        } else {
            array_push($binaryArray, 1);
        }
        $numberDecimal = intval(divide_number($numberDecimal, $binaryBasis));
    } while (divide_number($numberDecimal, $binaryBasis) >= 1);
    // Добавить последнюю цифру в зависимости от четности.
    if ($numberDecimal == 1) {
        array_push($binaryArray, 1);
    } else {
        array_push($binaryArray, 0);
    }
    // Перевернём массив и объединим элементы в строку.
    $binaryNumber = implode(array_reverse($binaryArray));
    // Вывод
    return $binaryNumber;
}

// Переводим в десятичную
function translate_to_decimal($numberDecimal, $binaryBasis, $decimalBasis)
{
    // Функция в аргументе функции - запрещено в PHP. Переопределил.
    $binaryNumber = translate_to_binary($numberDecimal, $binaryBasis);
    // Строка в массив
    $decimalArray = str_split($binaryNumber);
    // Количество элементов в массиве
    $countNumber = count($decimalArray);
    foreach ($decimalArray as &$numberOfDecimalArray) {
        $numberOfDecimalArray = $numberOfDecimalArray * (2 ** ($countNumber - 1));
        -- $countNumber;
    }
    unset($numberOfDecimalArray);
    return array_sum($decimalArray);
}
echo translate_to_binary($numberDecimal, $binaryBasis), PHP_EOL;
echo translate_to_decimal($numberDecimal, $binaryBasis, $decimalBasis);
?>