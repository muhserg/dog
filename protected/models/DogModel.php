<?php

namespace dog\models;

class DogModel extends Model
{
    /**@var string имя собаки*/
    public $dogId;

    /**@var string имя собаки*/
    public $name;

    /**@var string возраст собаки*/
    public $age;

    /**@var integer идентификатор собственника*/
    public $ownerId;

    /**@var string порода собаки*/
    public $breed;

    /**@var string путь к файлу фото собаки*/
    public $image;

    /**@var string окрас собаки*/
    public $color;

    public function rules()
    {
        return [
            [['name', 'ownerId'], 'required'],
            ['name', 'age', 'breed', 'image', 'color'],
        ];
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        return [
            'owner' => [self::BELONGS_TO, 'OwnerModel', ['owner_id' => 'id']],
        ];
    }
}
