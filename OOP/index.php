<?php

class Pupa // хоба и класс создай 
{
    private $name = "Имя"; // хоба и свойства есть 
    private $sure_name = "Второе имя"; //аж целых два


    function __construct($name, $sure_name) // если есть эта штука то нужно в скобках (когда реализуется класс) указать аргументы 
    {
        $this->name = $name;
        $this->sure_name = $sure_name;
    }

    public function getName()
    { // и функция но здесь это метод
        return $this->name;
    }
    public function getSureName()
    {
        return $this->sure_name;
    }
    
    //Инкапсуляция это как область видимости только в ООП
    // все область видимости указанные ниже так же применимы и к методам  

    //разделяют 3 уровня доступа 
    private $age=23;  // Видно только в пределах класса и извне обращаться нельзя, тонее можно но только через методы 
    protected $hand=2; //видна в пределах класса а также к ней могут обращаться наследники  
    public $aple=1;// видна отовсюду можно обращаться извне и менять как захочешь  
}

//наследство 

class Lupa extends Pupa
{
    //$name  наследуется у родителя 
    //$sure_name 
    //$age
    //$hand
    //$aple
    private $leg = 1; // у этого класса есть нога  
    private $perents_name ='Лупович'; 
    public function getSureName()
    {
        return $this->sure_name .' а ещё очество есть '. $this->perents_name; 
    }
    // методы тоже наследуются 

    //полиморфизм переназнаение метода  



    public function getLeg()
    {
        return $this->leg;
    }


};


$pupa = new  Pupa ("Пупа ","Пупов") ;// хоба и создан объект 
echo $pupa->getName(); //реализуем метод
echo $pupa->getSureName();

echo '<hr>';

$lupa = new  Lupa  ("Лупа ","Лупов");
echo $lupa->getName(); 
echo $lupa->getSureName();
echo '<br>колличество яблок можно изменить '. $lupa->aple=4; 
echo '<br>колличество ног '. $lupa->getLeg()





?>


