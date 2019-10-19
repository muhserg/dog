<?php

namespace ;

interface DogArrayInterface
{
    public function fill();
}

class DogArray implements DogArrayInterface
{
    protected $dogArray;
	protected $dogs = [];

    public function __construct(DogArrayInterface $dogArray)
    {
        $this->dogArray = $dogArray;
    }

    public function fill()
    {
        return $this->dogArray->fill();
    }
	
	public function newDog($name, $age, $owner, $group)
	{
		$this->dogs[] = new Dog($name, $age, $owner, $group);
	}
}

class Group extends DogArray
{
	private $groups = [];
	
    public function fill
    (   string $name,
        string $age,
        string $owner,
        string $breed,
        string $image,
        string $color
    ) {
        $group = $this->getGroup($breed, $image, $color);
        $this->newDog($name, $age, $owner, $group);
    }
	
	public function getGroup(
        string $breed,
        string $image, 
		string $color
    ) {
        $key = 'key_' . $breed . $image . $color;
		
        if (!isset($this->groups[$key])) {
            $this->groups[$key] = new DogGroup($breed, $image, $color);
        }

        return $this->groups[$key];
    }

    public function findDog(array $query)
    {
        // the query to find one dog
    }
}

class DogGroup
{
    public $breed;
    public $image;
    public $color;


    public function __construct(string $breed, string $image, string $color)
     {
        $this->breed = $breed;
        $this->image = $image;
        $this->color = $color;
    }

    public function profile(string $name, string  $age, string $owner)
    {
        // Show info about one dog
    }
}

class Dog
{
    public $name;
    public $age;
    public $owner;

    private $group;

    public function __construct(string $name, string $age, string $owner, DogGroup $group)
    {
        $this->name = $name;
        $this->age = $age;
        $this->owner = $owner;
        $this->group = $group;
    }

    public function render()
    {
        $this->group->profile($this->name, $this->age, $this->owner);
    }
}


/**
 * Клиент: создается огромнейшая база собак со свойствами каждой: порода, изображение, цвет, имя, собственник, возраст
 */
