<?php

// Доработайте код из test_task_2.php так,
// чтобы он мог выполняться на сайте с возможностью выбора языка отображения
// Для простоты считаем, что имя животного может быть на любом языке
// При этом порода собаки только на выбранном языке
// Пример псевдо-кода такого сайта:

// Версия PHP: 8.2
// Выполнение в браузере

require_once('./test_task_2.php');

class ConfigReader
{
    public const LOCALE_RU = 'ru';
    public const LOCALE_EN = 'en';
}

class Controller
{
    // тут нужно дописать код
    private const LOCALE_DEFAULT = ConfigReader::LOCALE_EN;
    private string $locale;

    public function __construct(string $locale = self::LOCALE_DEFAULT)
    {
        $this->locale = $locale;
    }

    public function index(): void
    {
        // Строка отредактирована, чтобы программа выводила Labrador/Лабрадор
        $rex = new Dog(
            'Rex',
            [
                ConfigReader::LOCALE_EN => 'Labrador',
                ConfigReader::LOCALE_RU => 'Лабрадор'
            ]
        );

        $murka = new Cat('Мурка');

        $this->showLine($rex);
        $this->showLine($murka);
    }

    public function showLine(Animal $animal): void
    {
        // тут нужно написать код
        $placeholder = ''; // Выводится, если НЕТ локализации
        $says = [
            ConfigReader::LOCALE_EN => 'says',
            ConfigReader::LOCALE_RU => 'говорит'
        ];

        // Порода/вид животного используются в порядке приоритета:
        // 1) порода на указанном языке
        // 2) вид на указанном языке
        // 3) порода на языке по умолчанию
        // 4) вид на языке по умолчанию
        // 5) плейсхолдер
        echo (empty($animal->getBreed($this->locale)) ?
                (empty($animal::getSpecies($this->locale)) ?
                    (empty($animal->getBreed(self::LOCALE_DEFAULT)) ?
                        (empty($animal::getSpecies(self::LOCALE_DEFAULT)) ?
                            $placeholder :
                            $animal::getSpecies(self::LOCALE_DEFAULT)) :
                        $animal->getBreed(self::LOCALE_DEFAULT)) :
                    $animal::getSpecies($this->locale)) :
                $animal->getBreed($this->locale)).
            ' '.
            $animal->getName().
            ' '.
            ($says[$this->locale] ??
                $says[self::LOCALE_DEFAULT] ??
                $placeholder).
            ' '.
            // Звук животного используется в порядке приоритета:
            // 1) звук на указанном языке
            // 2) звук на языке по умолчанию
            // 3) плейсхолдер
            (empty($animal->makeSound($this->locale)) ?
                (empty($animal->makeSound(self::LOCALE_DEFAULT)) ?
                    $placeholder :
                    $animal->makeSound(self::LOCALE_DEFAULT)) :
                $animal->makeSound($this->locale)).'<br/>';
    }
}

// Отделение результата работы test_task_3.php от test_task_2.php
echo '</br></br><b>Результат работы '.basename(__FILE__).':</b></br>';

$controller = new Controller(ConfigReader::LOCALE_RU);
$controller->index();
$controller_en = new Controller(ConfigReader::LOCALE_EN);
$controller_en->index();

// Ожидаемый результат работы программы
// Лабрадор Rex говорит Гав
// Кошка Мурка говорит Мяу
// Labrador Rex says Woof
// Cat Мурка says Meow
