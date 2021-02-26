<html>
<head> 

<title> PHP01</title>
</head>

<body> 

<?php

echo "<h1> My First PHP assignment </h1>";
echo "<br>";

echo "<h2> Saleh Alrashidi ID:201911242 </h2>";

echo "Today is " . date("Y/m/d") . "<br>";









$n = 1;
$s = "1";
$n1 = $n + $s;
$n2 = $n1 . "10 little penguins" ;
$n3 = "hello";
$n4 = "world";
$n5 = $n3.$n4;
$n6 = $n3.$n4;

echo "$n";

echo"<br>";


echo"<br>";
echo "$s";

echo"<br>";
echo "$n1";
echo"<br>";

echo $n2;
echo"<br>";
echo $n3;
echo"<br>";

echo "$n4";
echo"<br>";

echo "$n5";
echo"<br>";
echo "$n6";
echo"<br>";



 



$number = array (1,2,3,4,5);


echo"this is muy array";

echo"<br>";
echo"$number[0]";

$arrayCount = count($number);

echo"my array count is .$arrayCount";

echo "<br>";
$number1 = 1;



for ($i = 0; $i < $arrayCount; $i++) {

    if ($number[$i]==1){
        echo"<br>";
        echo"this numbe is 1" ;
        echo "<br>";
    }

    echo $number[$i];
  }







?>




</body>




</html>



