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

   function set_arr($arr , $arr2,$arr3){

array_push($this ->finishedCurses , $arr ,$arr2 ,$arr3) ;
  
}

}


  $student1 = new Student;
  $student1 -> set_name_and_id("saleh",1);
  
  $student1 -> set_arr("Programming Fundamentals I", "Advanced Web Programming", "Computer Ethics");
  $student2 = new Student;
  $student2 -> set_name_and_id("Bader",2);
  
  $student2 -> set_arr("Interactive Media", "Introduction to Database Systems" , "");
  $student3 = new Student;
  $student3 -> set_name_and_id("Salem",3);
  
  $student3 -> set_arr("Writing Skills in Arabic", "Project Management" , "Game Development");
  $student4 = new Student;
  $student4 -> set_name_and_id("Ahmed",4);
  
  $student4 -> set_arr("Linear Algebra", "Project Management" , "Probability and Statistics");
 
    $opjectStudents = array($student1 , $student2, $student3, $student4);

  //print_r($opjectStudents);

  //var_dump($opjectStudents);

    
  $object_name = array_column($opjectStudents, 'name');
  

    echo "<p>".$student1 ->name."</p>";
    echo "<p>".$student2 ->id."</p>";
   // print_r ("<p>".$student1 ->finishedCurses."</p>");

   echo "hello";
   
   foreach ($student3 ->finishedCurses as $value) {
       echo $value;
      }
    


    echo '<p>';

      foreach ($opjectStudents as $entry) {
        if ($entry['id'] == $id) 
           echo $entry['value'];
     
     }
     echo '</p>';
     
    
    
   ?>
   
         </body>

</html>

