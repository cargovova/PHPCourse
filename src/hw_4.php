<?php
$numberDecimal = 6;
$binaryBasis = 2;
$decimalBasis = 10;

function divideNumbers($numberDecimal, $binaryBasis)
{
    $devideNumber = $numberDecimal / $binaryBasis;
    return $devideNumber;
}

// Переводим в двоичную
function translateToBinary($numberDecimal, $binaryBasis)
{
    $binaryArray = [];
    do {
        if (gettype(divideNumbers($numberDecimal, $binaryBasis)) == "integer") {
            array_push($binaryArray, 0);
        } else {
            array_push($binaryArray, 1);
        }
        $numberDecimal = intval(divideNumbers($numberDecimal, $binaryBasis));
    } while (divideNumbers($numberDecimal, $binaryBasis) >= 1);
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
function translateToDecimal($numberDecimal, $binaryBasis, $decimalBasis)
{
    // Функция в аргументе функции - запрещено в PHP. Переопределил.
    $binaryNumber = translateToBinary($numberDecimal, $binaryBasis);
    // Строка в массив
    $decimalArray = str_split($binaryNumber);
    // Количество элементов в массиве
    $countNumber = count($decimalArray);
    foreach ($decimalArray as &$numberOfDecimalArray) {
        // -1, потому что отсчёт от нуля.
        $numberOfDecimalArray = $numberOfDecimalArray * ($binaryBasis ** ($countNumber - 1));
        -- $countNumber;
    }
    unset($numberOfDecimalArray);
    return array_sum($decimalArray);
}
echo translateToBinary($numberDecimal, $binaryBasis), PHP_EOL;
echo translateToDecimal($numberDecimal, $binaryBasis, $decimalBasis);
?>