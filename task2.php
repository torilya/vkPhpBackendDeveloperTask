<?php

// В этом задании вам нужно исправить ошибки в предоставленном коде
// Код имеет несколько логических и синтаксических ошибок,
// которые необходимо найти и исправить

// Версия PHP: 8.2
// Выполнение в терминале

abstract class Animal
{
    private const LOCALE_DEFAULT = 'en';

    // Например: ['en' => 'Woof', 'ru' => 'Гав']
    private static array $sound = [];

    // Например: ['en' => 'Dog', 'ru' => 'Собака']
    private static array $species = [];

    private array $breed;
    private string $name;

    public function __construct(string $name, array $breed = [])
    {
        if ($breed && !isset($breed[self::LOCALE_DEFAULT])) {
            throw new InvalidArgumentException(
                "If a breed is given, a value with the key '".
                self::LOCALE_DEFAULT.
                "' is required"
            );
        }

        $this->breed = $breed;
        $this->name = $name;
    }

    public static function getSpecies(
        string|null $locale = null
    ): string|array|false {
        if ($locale) {
            return static::$species[$locale] ?? false;
        }

        return static::$species;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBreed(string|null $locale = null): string|array|false
    {
        if ($locale) {
            return $this->breed[$locale] ?? false;
        }

        return $this->breed;
    }

    public static function makeSound(
        string|null $locale = null
    ): string|array|false {
        if ($locale) {
            return static::$sound[$locale] ?? false;
        }

        return static::$sound;
    }
}

class Dog extends Animal
{
    /** @noinspection PhpUnused */
    protected static array $sound = ['en' => 'Woof', 'ru' => 'Гав'];
    /** @noinspection PhpUnused */
    protected static array $species = ['en' => 'Dog', 'ru' => 'Собака'];
}

class Cat extends Animal
{
    /** @noinspection PhpUnused */
    protected static array $sound = ['en' => 'Meow', 'ru' => 'Мяу'];
    /** @noinspection PhpUnused */
    protected static array $species = ['en' => 'Cat', 'ru' => 'Кошка'];
}

function getAnimalSoundStatement(Animal $animal): string
{
    $locale = 'en';

    return (empty($animal->getBreed($locale)) ?
            $animal::getSpecies($locale) :
            $animal->getBreed($locale)).
        ' '.
        $animal->getName().
        ' says '.
        $animal::makeSound($locale).PHP_EOL;
}

$rex = new Dog('Rex', ['en' => 'Labrador']);
$stooped = new Dog('Stooped');
$murka = new Cat('Murka');
echo getAnimalSoundStatement($rex);
echo getAnimalSoundStatement($stooped);
echo getAnimalSoundStatement($murka);

// Ожидаемый результат работы программы
// Labrador Rex says Woof
// Dog Stooped says Woof
// Cat Murka says Meow
