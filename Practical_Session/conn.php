<?php

$user_name="root";
$password = "Sa0501525293";

$db = mysqli_connect("localhost", $user_name, $password, "photos");


$query = "UPDATE info SET user_name ='ahmed' WHERE password =111";

mysqli_query($db, $query); 

?>