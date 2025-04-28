<?php

class Human
{
    public $name;
    private $age;

    public function __construct($name, $age)
    {
        $this->name = $name;
        $this->age = $age;
    }
}

$human = new Human('John Doe', 30);
echo $human->name;
$human->name = "Elnazar";