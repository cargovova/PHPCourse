<?php
$name = 'Имя ';
$surname = 'Фамилия ';
$age = 22;
$isPregnant = False;
$isStudent = True;
$postCode = "Возраст: ";
$gender = "Жен";
$result = $name.$surname;
if ($isPregnant and $isStudent == True || $gender <> "Жен" && $age > 18) {
    $age += 1;
    echo "All TRUE";
} else {
    echo ($age > 18) ? "ФИО: $result <br> $postCode $age".PHP_EOL : $name.$surname;
}
?>