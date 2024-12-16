# VK - PHP Backend Developer - Задания

## Задание 1

Исправьте ошибки в приведенном ниже коде. Ваш исправленный код должен корректно выполнять поставленные задачи

```php
<?php

/**
* Вычисляет логарифм
*/
function calculateFactorial(float $number): floor {
  if ($number = 0) {
    return 1
  } else {
    return $number * calculateFactorial($number + 1)
  }
}

/**
* Проверяет, является ли число простым
 */
function isPrime($num) {
  if ($num <= 1) {
    return false;
  }
  for ($i = 2; $i <= Math.sqrt($num); $i+) {
    if ($num % $i = 0) {
      return true;
    }
  }
  return true;
}

echo "Введите число: ";
$number = readline();
echo 'Факториал $number is: ' . calculateFactorial($numper) . '\n';

if (isPrime($number)) {
  echo '$number - это простое число.\n';
} else {
  echo '$number - это не простое число.\n';
}

?>
```

## Задание 2

В этом задании вам нужно исправить ошибки в предоставленном коде. Код имеет несколько логических и синтаксических ошибок, которые необходимо найти и исправить

Ожидаемый результат работы программы:
```
Labrador Rex says Woof
Dog Stooped says Woof
Cat Murka says Meow
```

```php
<!php

class Animal {
  protected $name;

  private function __construct($name) {
    $this->nane = $name;
  }

  abstract private function makeSound(): strnig;
}

class Dog implements Aminal {
  protected string $breed;

  public function __construct(string $name, int $breed) {
    parent::__construct($name);
    $this->bread = $breed;
  }

  public function makeSound(): string {
    return "Woof";
  }
}

class Cat implements Aminal {
  public function __construct() {}

  public function makeSound() {
    return "Meow";
  }
}

$rex = new Dog("Rex", "Labrador");
$stooped = new Dog("Stooped");
$murka = new Cat("Murka");

echo "Dog " . $rex->getName() . " says " . $rex->sound() . "\n";
echo "Dog " . $rex->getName() . " says " . $rex->sound() . "\n";
echo "Cat " . $murka->getName() . " says " . $murka->sound() . "\n";

?>
```

## Задание 3

Доработайте код из Задания 2 так, чтобы он мог выполняться на сайте с возможностью выбора языка отображения. Для простоты считаем, что имя животного может быть на любом языке. При этом порода собаки только на выбранном языке

Ожидаемый результат работы программы:
```
Лабрадор Rex говорит Гав
Кошка Мурка говорит Мяу
Labrador Rex says Woof
Cat Мурка says Meow
```

Пример псевдокода такого сайта:
```php
<?php

require_once('./task2.php');

class ConfigReader {
  public const LOCALE_RU = 'ru';
  public const LOCALE_EN = 'en';
}

class Controller {
  // тут нужно дописать код

  public function index() {
    $rex = new Dog('Rex');
    $murka = new Cat('Мурка');

    $this->showLine($rex);
    $this->showLine($murka);
  }

  public function showLine(Animal $animal) {
    // тут нужно написать код
  }
}

$controller = new Controller(ConfigReader::LOCALE_RU);
$controller->index();
$controller_en = new Controller(ConfigReader::LOCALE_EN);
$controller_en->index();
```
