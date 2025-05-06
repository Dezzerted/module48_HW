<?php 

//Интерфейс для индивидуальной функции

interface SpecialFunction {
    public function useSpecialFunction():string;
}

//Абстрактный класс для всех машин

abstract class Machine {
    protected string $name;

    public function __construct(string $name){
        $this->name = $name;
    }

    public function getName():string {
        return $this->name;
    }

    abstract public function driveForward():string;
    abstract public function driveBackward():string;
}

//Класс для легкового автомобиля

class Car extends Machine implements SpecialFunction {
    public function __construct(string $name){
        parent::__construct($name);
    }

    public function driveForward():string{
        return "{$this->name} едет вперед на колесах";
    }

    public function driveBackward():string{
        return "{$this->name} едет назад на колесах";
    }

    public function useSpecialFunction():string{
        return "{$this->name} использует закись азота!";
    }
}

//Класс для бульдозера

class Bulldozer extends Machine implements SpecialFunction {
    public function __construct(string $name){
        parent::__construct($name);
    }

    public function driveForward():string{
        return "{$this->name} едет вперед на гусеницах";
    }

    public function driveBackward():string{
        return "{$this->name} едет назад на гусеницах";
    }

    public function useSpecialFunction():string{
        return "{$this->name} управляет ковшом!";
    }
}

//Класс для танка

class Tank extends Machine {
    public function __construct(string $name){
        parent::__construct($name);
    }

    public function driveForward():string{
        return "{$this->name} едет вперед на гусеницах";
    }

    public function driveBackward():string{
        return "{$this->name} едет назад на гусеницах";
    }
}

//Полиморфная фнукция для управления всеми машинами

function operateMachine(Machine $machine){
        echo $machine->driveForward();
        echo "\n";
        echo $machine->driveBackward();
        echo "\n";

    //Проверяем, реализует ли созданный объект интерфейс SpecialFunction

    if ($machine instanceof SpecialFunction){
        echo $machine->useSpecialFunction();
    }

}

$car = new Car("Ferrari");
$bulldozer = new Bulldozer("Бульдозер CAT");
$tank = new Tank("Т-90");

echo "<pre>";
print_r($car->getName());
echo "\n";
print_r(operateMachine($bulldozer));
echo "\n";
print_r(operateMachine($tank));
echo "<pre>";


