/* Написать функцию, которая будет принимать один аргумент year и возвращать true, если год високосный, и false, если
не високосный. Не использовать  циклы и условия.*/

<?php
// Функция, которая принимает аргумент year и проверяет, является ли год високосным. Если год високосный, то он либо делится на 400,
// либо делится на 4 и не делится на 100.
function leapyOrNot($year) {
    // Если устовия деления выполняются, то возвращаем true, если нет, то false.
    return ($year % 400 == 0 || ($year % 4 == 0 && $year % 100 != 0)) ? true : false;
}

$year = 1900; // Переменная, которой передаем год
// Переменная, в которую записываем строку, зависящаю от того, какое значение вернула функция leapOrNot.
// Если true, то записываем, что год високосный. Если false, то записываем, что не високосный.
$answer = leapyOrNot($year) ? "високосный год" : "не високосный год";
echo "$year - $answer"; // Выводим на экран результаты проверки года на високосность