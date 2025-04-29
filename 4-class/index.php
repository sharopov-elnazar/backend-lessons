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

    public function getAge()
    {
        return $this->age;
    }

    public function __destruct()
    {
        echo "Object {$this->name} is destroyed\n";
    }
}

$human = new Human('Elnazar', 30);
$human2 = new Human('Azizbek', 25);

print_r($human);

echo $human->name . " " . $human->getAge();

// 5 ta class yaratish
// 3 ta xudusiyat 4 ta metod