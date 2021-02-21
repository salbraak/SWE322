
<?php


Spl_autoload_register(function($class){

   include '../classes/'.$class .'.php';
});

echo "hi";
echo "<br>";
$a = new classA;
$a -> printA();
echo "<br>";

$b = new classB;
$b -> printB();
echo "<br>";
$c = new classC;
$c-> printC();
echo"hello";

?>