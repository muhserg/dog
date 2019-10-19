<?php

namespace dog\models;

class OwnerModel extends Model
{
    /**@var integer идентификатор собственника*/
    public $id;

    /**@var string имя собственника*/
    public $name;

    public function rules()
    {
        return [
            [['id', 'name'], 'required'],
            ['id', 'name'],
        ];
    }
}
