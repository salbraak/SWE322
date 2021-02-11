<html>
<head>
    
    
    <title>
    
    PHP Basics
    
    </title>
    
    <script>
        function myFunction() {
    
        var button = document.createElement("button");
         
      
      var  today = new Date();
      var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
      var element = document.getElementById("x").innerHTML = date;
           
        }
    
    </script>
   
    
    
    </head>
    
    <body>
    <h1> Saleh Alrashidi</h1>
        
        
 <p id ="x";>  </p>
        
<button onclick="myFunction()">show me the date</button>



<?php
    
    
class Student {
    
   public  $name;
   public  $id;
    
   public $finishedCurses = array();

   function set_name_and_id ($value, $studentId){

    $this ->name = $value;
    $this ->id = $studentId;
   }
   function set_arr($arr){

    array_push($this -> finishedCurses , $arr)
    
   }
    
   
    
}

echo "hello";
  $student1 = new Student;
  $student1 -> set_name_and_id("saleh",1);
  
  $student1 -> set_arr("saleh", "bader")
 /* $student2 = new Student;
  $student2 -> $name  = "Bader";
  $student2 -> $id = 2;
  $student2 -> array_push( $finishedCurses,"Interactive Media","Introduction to Database Systems");
  $student3 = new Student; 
  $student3 -> $name ="salem";
  $student3 -> array_push( $finishedCurses,"Writing Skills in Arabic","Project Management" , "Computer Ethics");
  $student3 -> $id  =3 ;
  $student4 = new Student; 
  $student4 -> $name  = "Ahmed";
  $student4 -> $id = 4 ;
  $student4 -> array_push( $finishedCurses,"Game Development","Linear Algebra","Probability and Statistics");

    $opjectStudents = array($student1 , $student2, $student3, $student4);
*/
    echo "<p>".$student1 -> name."</p>";
    echo "<p>".$student1 -> id."</p>";
    echo "<p>".$student1 -> finishedCurses."</p>";
    echo "hello";
    
   ?>
   
         </body>

</html>

