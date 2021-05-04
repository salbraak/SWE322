<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$user_name="root";
$password = "Sa0501525293";

$conn = mysqli_connect("localhost", $user_name, $password, "course");

if(!$conn){
    echo "Debugging error No:".mysqli_connect_errno();
    echo "<br>";
    echo "Debugging error: ".mysqli_connect_error();
    exit;
}

//$word = $_GET['search'];

//$word1 = $_GET['search_1'];
//$word2 = $_GET['search_2'];
echo '<pre>';
print_r($_GET);
echo '</pre>';

if(isset($_GET['search'])){

    $word = $_GET['search'];
    $query = "SELECT * FROM courses WHERE c_code ='$word'";

} else if (isset($_GET['search_1'])){

    $word1 = $_GET['search_1'];
    
    $query = "SELECT * FROM courses WHERE c_name ='$word1'";


} else if (isset($_GET['search_2'])) {
    $word2= $_GET['search_2'];

   
    $query = "SELECT * FROM courses WHERE year ='$word2'";


}


$result = mysqli_query($conn, $query); 
 // echo "$query";


if(!$result ){
   echo mysqli_error($conn);
    //exit ("An error has happened.");
    
} else {
        if(mysqli_num_rows($result) > 0){
        echo "<table border='1px' width='60%'>";
        echo "<tr>";
        echo "<th> Course Code </th>";
        echo "<th> Course Name </th>";
        echo "<th> Course Decription </th>";
        echo "<th> Level </th>";
       echo "</tr>";

    while($result_row = mysqli_fetch_row($result) ){
        echo "<tr>";
        echo "<td> $result_row[0] </td>";
        echo "<td> $result_row[1] </td>";
        echo "<td> $result_row[2] </td>";
        echo "<td> $result_row[3] </td>";
        echo "</tr>";
    }
}
}



?>