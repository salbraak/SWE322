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
   
<style> 

div{

    text-align :center;
}



body{
    background-color : powderblue;
}

h1 {
    text-align: center;
    color :red;
}

p {

    text-align :center;
}

ul{
    text-align : center;
}


</style>
   

    
    
    </head>
    
    <body>
    <h1> Saleh Alrashidi</h1>
        
        
 <p id ="x";>  </p>
        
<div><button class="sal" onclick="myFunction()">show me the date</button> </div>



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

    
  //$object_name = array_column($opjectStudents, 'name');
  

    //echo "<p>".$student1 ->name."</p>";
   // echo "<p>".$student2 ->id."</p>";
   // print_r ("<p>".$student1 ->finishedCurses."</p>");

   
   
   //foreach ($student3 ->finishedCurses as $value) {
    //   echo $value;
    //  }


      echo '<p>';

      echo "students names";
      echo "<br>";
    

      foreach($opjectStudents as $i => $i_value) {
        echo $i_value->name."<br>";
    }

    echo '</p>';

    echo '<p>';

    echo "students id";
    echo "<br>";
    foreach($opjectStudents as $i => $i_value) {
        echo $i_value->id."<br>";
    }
    echo '</p>';
echo"<p>";
    echo "the courses that student have finisdhed";
    echo "</p>";

   echo "<ul>";
  


    foreach($opjectStudents as $i => $i_value) {
       echo" <li>";
       print_r($i_value->finishedCurses);
       echo "</li>";
       if($i_value=="Advanced Web Programming"){
           echo "the student is full stack";
       }
    }

    echo "</ul>";

    echo "<p>";

    

    //for($i = 0; i<count($finishedCurses); $i++){
      //  if($finishedCurses['$i']=="Advanced Web Programming")
      //  echo"nice";


  //  }
    foreach($opjectStudents as $value ->$i){
        echo $value ->finishedCurses->i;
        if($i=="Advanced Web Programming"){
 
         echo "this student is great";
        }
 
     }
    echo "</p>";

    
    
    
   ?>
   
         </body>

</html>

