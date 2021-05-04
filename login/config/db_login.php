<?php
     $host_address = "localhost";
     $user_host = "root";
     $password = "Sa0501525293";
     $db_name = "A03";
     
     $conn = mysqli_connect($host_address,$user_host,$password,$db_name);
     
     if(!$conn){
     
         echo "Debugging error No: ".mysqli_connect_errno();
         echo "<br>";
         echo "Debugging error No: ".mysqli_connect_error();
         exit;
     }
?>