<?php

interface I_Tarif
{
    function calculateTrip(
        $space,
        $hours,
        $age,
        $isGPS = null,
        $isSet = null
    );

    function calculateBase();

    function calculateSet();
}

trait SetCalc
{

    function calculateGPS($hours, $GpsPrice)
    {
        $setPriceTime = $hours * $GpsPrice;
        return ($setPriceTime);
    }

    function calculateSetDrive($SetDrivePrice)
    {
        return $SetDrivePrice;
    }

    function calculateAge($setPriceAge)
    {
        return $setPriceAge;
    }
}

abstract class A_Tarif implements I_Tarif
{
    const GpsPrice = 15;
    const DrivePrice = 100;
    protected $tariffName;
    protected $priceSpace;
    protected $priceHours;
    protected $space, $hours, $age, $isGPS = false, $isSet = false;
    protected $basePrice, $setPrice, $totalPrice, $priceAge;
    use SetCalc;

    protected function setProp($space, $hours, $age, $isGPS, $isSet)
    {
        $this->space = $space;
        $this->hours = $hours;
        $this->age = $age;
        $this->isGPS = $isGPS;
        $this->isSet = $isSet;
    }

    public function calculateTrip(
        $space,
        $hours,
        $age,
        $isGPS = null,
        $isSet = null
    ) {
        $this->setProp($space, $hours, $age, $isGPS, $isSet);
        if ($this->age <= 17) {
            print_r($this->age . "</br>");
            echo "ты  слишком совсем молод чтобы считать тариф";
        }
        if ($this->age >= 65) {
            print_r($this->age . "</br>");
            echo "ты  слишком стар  чтобы считать тариф";
        } else {
            echo "</br>";
            $this->basePrice = $this->calculateBase();
            $this->setPrice = $this->calculateSet();
            $this->priceAge = $this->calculateAge();
            $this->totalPrice = $this->calculateBase() * $this->calculateAge() + $this->calculateSet();
            echo "Тариф: . $this->tarifName .  руб." . PHP_EOL;
            echo "Cтоимость поездки: . $this->basePrice.  руб." . PHP_EOL;
            echo "Дополнительно : . $this->setPrice . руб." . PHP_EOL;
            echo "Сумма: . $this->totalPrice . руб." . PHP_EOL;
            return $this->totalPrice;
            echo "</br>";
        }
    }


    public function calculateBase()
    {
        $basePrice = $this->priceSpace * $this->space + $this->priceHours * $this->hours;
        return $basePrice;
    }

    public function calculateSet()
    {
        $setPrice = 0;
        if ($this->isGPS == true) {
            $setPrice += $this->calculateGPS($this->hours, self::GpsPrice);
        };
        if ($this->isSet == true) {
            $setPrice += $this->calculateSetDrive(self::DrivePrice);
        };
        return $setPrice;
    }

    public function calculateAge()
    {
        $setPriceAge = 1;
        if ($this->age >= 18 && $this->age <= 21) {
            $setPriceAge = 1.1;
        };
        return $setPriceAge;
    }


}

class TarifBase extends A_Tarif
{
    public function __construct()
    {
        $this->tarifName = 'Тариф базовый';
        $this->priceHours = 3;
        $this->priceSpace = 10;
        $this->isGps = true;
        $this->isSet = true;
    }

    public function calculateBase()
    {
        $hourseuUp = round($this->hours * 60);
        $basePrice = $this->priceSpace * $this->space + $this->priceHours * $hourseuUp;
        return $basePrice;
    }
}

class TarifHours extends A_Tarif
{
    public function __construct()
    {
        $this->tarifName = 'Тариф почасовой';
        $this->priceHours = 200;
        $this->priceSpace = 0;
        $this->isGps = true;
        $this->isSet = true;
    }

    public function calculateBase()
    {
        $hourseuUp = round($this->hours, 0, PHP_ROUND_HALF_UP);
        $basePrice = $this->priceSpace * $this->space + $this->priceHours * $hourseuUp;
        return $basePrice;
    }
}

class TarifDay extends A_Tarif
{
    public function __construct()
    {
        $this->tarifName = 'Тариф сут';
        $this->priceHours = 1000;
        $this->priceSpace = 1;
        $this->isGps = true;
        $this->isSet = true;
    }

    public function calculateBase()
    {
        $hourseuUp = round($this->hours / 24, 3, PHP_ROUND_HALF_UP);
        $day = floor($hourseuUp);
        if ($hourseuUp < 1) {
            $day++;
        }
        if ($hourseuUp > 1) {
            $num = explode(".", $hourseuUp);
            if ($num[1] > 025) {
                ++$day;
            }
        }
        $basePrice = $this->priceSpace * $this->space + $this->priceHours * $day;
        return $basePrice;
    }
}

class TarifStudent extends A_Tarif
{
    public function __construct()
    {
        $this->tarifName = 'Тариф студент';
        $this->priceHours = 1;
        $this->priceSpace = 4;
        $this->isGps = true;
        $this->isSet = true;
    }

    public function calculateBase()
    {
        if ($this->age >= 18 && $this->age <= 25) {
            $basePrice = $this->priceSpace * $this->space + $this->priceHours * $this->hours;
            return $basePrice;
        } else {
            echo "вообще может ты и студент но поедешь без скидки";
        }
    }
}

$tarifBase = new TarifBase();
$tarifBase->calculateTrip(20, 3, 25, true, true);
$tarifhourse = new TarifHours();
$tarifhourse->calculateTrip(20, 1.2, 25, false, false);
$tarifDay = new TarifDay();
$tarifDay->calculateTrip(0, 24.6, 30, false, false);
$tarifStudent = new TarifStudent();
$tarifStudent->calculateTrip(10, 25, 21, true, false);

