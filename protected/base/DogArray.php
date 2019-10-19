<?php

namespace dog\base;

use dog\services\Dog;

/**
 * Class DogArray
 * @package dog\base
 */
class DogArray implements DogArrayInterface
{
    /**
     * Добавление данных по новой собаке
     * @param string $name
     * @param integer $age
     * @param string $owner
     * @param string $breed
     * @param string $image
     * @param string $color
     *
     * @return Dog
     */
    public function fill
    (   string $name,
        int $age,
        string $owner,
        string $breed,
        string $image,
        string $color
    ) {
        return new Dog($name, $age, $owner, $breed, $image, $color);
    }

}