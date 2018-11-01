<?php
$name = htmlspecialchars($_GET['name']);
$surname = htmlspecialchars($_GET['surname']);
$age = htmlspecialchars($_GET['age']);
$isPregnant = htmlspecialchars($_GET['isPregnant']);
$isStudent = htmlspecialchars($_GET['isStudent']);
if ($isStudent == 'on')
{
    $isStudent = 'является студентом';
}
$gender = htmlspecialchars($_GET['gender']);
if ($gender == 'мужского')
{
    $isPregnant = '';
}
$postCode = htmlspecialchars($_GET['postCode']);
echo $name, ' ', $surname, ' возраст', $age, '  ', $isPregnant, ' ', $isStudent, ' ,',
$gender, ' пола ', $postCode, '.';
?>