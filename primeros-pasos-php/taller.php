<?php 
echo "<h1> Taller PHP </h1>";

$string = "Ana";
echo $string;
echo "<br>";

$integer = 2;
print $integer;
echo "<br>";

$float = 2.2;
print $float;
echo "<br>";

$boolean = true;
var_dump($boolean);
echo "<br>";

$array = [1, 3, 4, "ana"];
var_dump($array);
echo "<br>";

class Person {
    public $name;
    public $age;

    public function __construct($name, $age){
    $this->name = $name;
    $this->age = $age;        
    }
   
}

$object = new Person("maria", 33);
var_dump($object);
echo "<br>";
$null = null;
var_dump($null);
echo "<br>";

////////////////////////////////////////////////////

$nombre = "Luna"; //string
// var_dump($nombre);
// echo "<br>";

$apellido = "Lovegood"; //string
// var_dump($apellido);
// echo "<br>";

$edad = 42; //integer
// var_dump($edad);
// echo "<br>";

$Ravenclaw = true; //boolean
// var_dump($Ravenclaw);
// echo "<br>";

$promedio = (8 + 9.5 + 9 + 10 + 8) / 5; //float
// var_dump($promedio);
// echo "<br>";

$nombre_completo = $nombre . " " . $apellido; //STRING  
// var_dump($nombre_completo);
// echo "<br>";

$presento_examen = (bool) 1; // boolean
// var_dump($presento_examen);
// echo "<br>";

$numero_preguntas = 5 + "5"; //integer
// var_dump($numero_preguntas);
// echo "<br>";

$numero_respuestas = "5" + 5; //integer
// var_dump($numero_respuestas);
// echo "<br>";

$promedio_maximo = $numero_respuestas / 1.0; //float
// var_dump($promedio_maximo);
// echo "<br>";

$nargles = 3 + "5 nargles"; //int
// var_dump($nargles);
// echo "<br>";

////////////////////////////////////////////////////////////////////////

/*
- true
- true
- false
- false
- true
*/

////////////////////////////////////////////////////////////////////////

echo "<h2>Manipulating data</h2>";

echo strtoupper($nombre);
echo "<br>";

echo strlen($nombre);
 echo "<br>";
 
echo str_word_count($nombre_completo);
 echo "<br>";

$apellidoReverse = $apellido;
echo strrev($apellidoReverse);
echo "<br>";

$animal = "Gato";
echo str_replace("Gato", "Michi", $animal);
echo "<br>";

$numero1 = 1;
$numero2 = 2;
echo $numero1 . $numero2;
echo "<br>";

$x = (int) 1;
$y = (int) 0;
echo $numero1 + $numero2;
echo "<br>";

$x = (bool) 1;
$y = (bool) 0;
echo ($x ? 'true ' : 'false') . ($y ? 'true' : ' false');
echo "<br>";

function sum($x, $y){
    return $x + $y;
}
echo sum(2,3);
echo "<br>";

function oddEven($x){
    return $x % 2 ? 'odd' : 'even';
};
echo oddEven(5);
echo "<br>";

$arr = [5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
print_r($arr);
echo "<br>";

echo count($arr);
echo "<br>";

array_push($arr, "oi");
print_r($arr);
echo "<br>";

array_push($arr, "tchau", 25);
print_r($arr);
echo "<br>";

$newArr = ["feliz natal", "boas festas"];
print_r(array_merge($arr, $newArr));
echo "<br>";

$a = [5, 6, 7, 8, 9, 10, 11, 12, 13, 14];
function printNumbers($array){
    foreach($array as $x){
       echo "<li>$x</li>";
    }
}
printNumbers($a);

function addNumber($array){
    array_push($array, (rand(0, 100)));
}
addNumber($a);
print_r($a);
echo "<br>";

function even($num){
    return $num % 2 !== 0;
  }
  
  function filter($arr){
   return array_filter($arr, 'even');
  }
  
  $result = filter($a);
  print_r($result);
  echo "<br>";


  print_r(min($arr));
  echo "<br>";

  print_r(min($arr));
  echo "<br>";

  function toUpper($str){
    return strtoupper($str);
   }

   echo toUpper("ola, mundo");
   echo "<br>";

   $words = ["sou", "um", "array", "de", "frutas"];
   
   function toCapital(&$arr){
    foreach($arr as &$x){
       $x = ucfirst($x);
    }
   }

   toCapital($words);
   print_r($words);
   echo "<br>";

   
   class Car {
    public $brand;
    public $color;
    public $type = [];

    public function __construct($brand, $color, $type){
        $this->brand = $brand;
        $this->color = $color;     
        $this->type = $type;   
        }

    function get_brand(){
        return $this->brand;
    }
    
    function get_doors(){
        return $this->type[2];
    }       
   }

$coche = new Car("fiat", "blue", ["Uno", "2021", "4p"]);
var_dump($coche);
echo "<br>";

echo $coche->get_brand();
echo "<br>";

//Crear una función que devuelva la cantidad de puertas que tiene el carro.
//Crear una función que devuelva un atributo del array.
echo $coche->get_doors();
echo "<br>";