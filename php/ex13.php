<?php
class cars
{
    public $name;
    public $make;

    function __construct($name, $make)
    {
        $this->name = $name;
        $this->make = $make;
        $mkmodel ="The car is {$this->name} and make year is {$this->make}.<br>";
        setcookie($name, json_encode($mkmodel), time()+3600);
        
    }
    
    function __destruct()
    {
        echo "The car is {$this->name} and make year is {$this->make}.<br>";
        $mkmodel ="The car is {$this->name} and make year is {$this->make}.<br>";
    }
}

$toyota = new cars("toyota", "2010");
$maruti = new cars("maruti", "2019");
$bmw = new cars("bmw", "2020");


?>
<html>

<body>