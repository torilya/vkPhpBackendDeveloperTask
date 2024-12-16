<?php

// Исправьте ошибки в приведенном ниже коде
// Ваш исправленный код должен корректно выполнять поставленные задачи

// Версия PHP: 8.2
// Выполнение в терминале

/**
 * Вычисляет факториал НЕотрицательного целого числа
 */
function calculateFactorial(int $number): float|false
{
    // Факториал НЕ существует
    if ($number < 0) {
        return false;
    }

    if ($number <= 1) {
        return 1;
    }

    // Без условия ниже:
    // - при числах более 170 результат INF
    // - при очень больших числах PHP Fatal error: Allowed memory size exhausted
    if ($number <= 170) {
        return $number * calculateFactorial($number - 1);
    }

    return INF;
}

/**
 * Проверяет, является ли целое число простым
 */
function isPrime(int $num): bool
{
    if ($num <= 1) {
        return false;
    }

    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i === 0) {
            return false;
        }
    }

    return true;
}

$strLenMax = strlen((string)PHP_INT_MAX) - 1;

while (true) {
    $input = trim(readline('Введите целое число: '));

    if (iconv_strlen($input) > $strLenMax) {
        echo 'Ошибка: количество символов должно быть меньше или равно '.
            $strLenMax.PHP_EOL.PHP_EOL;
        continue;
    }

    // Если ввод преобразуется в int
    if (is_numeric($input) && ((int)$input == $input)) {
        $number = (int)$input;
        break;
    }

    echo 'Ошибка: ожидалось целое число'.PHP_EOL.PHP_EOL;
}

if (!($factorial = calculateFactorial($number))) {
    echo '('.$number.')!: Факториал НЕ существует'.PHP_EOL;
} elseif ($factorial === INF) {
    echo $number.'!: Переполнение'.PHP_EOL;
} else {
    echo $number.'! = '.$factorial.PHP_EOL;
}

if (isPrime($number)) {
    echo $number.': Простое число'.PHP_EOL;
} else {
    echo $number.': НЕ простое число'.PHP_EOL;
}
