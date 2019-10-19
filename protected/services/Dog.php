<?php

namespace dog\services;

use dog\models\DogModel;

/**
 * Свойства собаки
 *
 * Class Dog
 * @package dog\base
 */
class Dog
{
    /**@var string имя собаки */
    public $name;

    /**@var integer возраст собаки */
    public $age;

    /**@var string имя собственника */
    public $owner;

    /**@var string порода собаки */
    public $breed;

    /**@var string фото собаки */
    public $image;

    /**@var string окрас собаки */
    public $color;


    public function __construct(string $name, int $age, string $owner, string $breed, string $image, string $color)
    {
        $this->name = $name;
        $this->age = $age;
        $this->owner = $owner;
        $this->breed = $breed;
        $this->image = $image;
        $this->color = $color;

        $this->saveToDb();
    }

    public function saveToDb()
    {
        //todo Сохранение в таблицу Dog и таблицу Owner (если в ней нет введенного собственника)
        //todo Если будет кэширование, то сделать обновление ключа
    }

    /**
     * Найти данные о собаке
     *
     * @param array $query
     * @return array
     */
    public function findDog(array $query): array
    {
        return DogModel::model()->with('owner')->find($query);
    }
}
