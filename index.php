<?php 

//Интерфейс для индивидуальной функции

interface SpecialFunction {
    public function useSpecialFunction():string;
}

interface OnlyForCars {
    public function cleanWindows():string;
    public function beepBeep():string;
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

class Car extends Machine implements SpecialFunction, OnlyForCars {
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

    public function cleanWindows():string{
        return "{$this->name} умеет включать дворники!";
    }

    public function beepBeep():string{
        return "{$this->name} умеет сигналить!";
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

class Tank extends Machine implements SpecialFunction {
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
        return "{$this->name} умеет стрелять!";
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
        echo "\n";
    }

    if ($machine instanceof OnlyForCars){
        echo $machine->beepBeep();
        echo "\n";
        echo $machine->cleanWindows();
        echo "\n";
    } else {
        echo "{$machine->getName()} не умеет ни сигналить, ни включать дворники \xF0\x9F\x98\xA2";
        echo "\n";
    }

}

$car = new Car("Ferrari");
$bulldozer = new Bulldozer("Бульдозер CAT");
$tank = new Tank("Т-90");

echo "<pre>";
print_r(operateMachine($car));
echo "\n";
print_r(operateMachine($bulldozer));
echo "\n";
print_r(operateMachine($tank));
echo "<pre>";


