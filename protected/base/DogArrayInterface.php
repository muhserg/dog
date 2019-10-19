<?php

namespace dog\base;

/**
 * Interface DogArrayInterface
 * @package dog\base
 */
interface DogArrayInterface
{
    /**
     * Для заполнения свойств собаки
     * @param string $name
     * @param int $age
     * @param string $owner
     * @param string $breed
     * @param string $image
     * @param string $color
     * @return mixed
     */
    public function fill(string $name,
                         int $age,
                         string $owner,
                         string $breed,
                         string $image,
                         string $color);
}
