<?php
session_start();
//error_reporting(E_ALL);
include('config/db_login.php');

if(!isset($_SESSION['user_uid']))
{
    echo "<script>window.location.href ='login.php';</script>";
}
if(isset($_SESSION['user_uid']))
    {
    $sql_query="SELECT * FROM users WHERE `user_uid`='".$_SESSION['user_uid']."'";        
    $result =    mysqli_query($conn,$sql_query);
    $row    =   mysqli_fetch_assoc($result);  
 } 
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="SS.css" />
</head>
<body class = "bb">    
   
        <div align="center"> <h4><?php if($_SESSION){ echo "Hey, ".$_SESSION['username']; } ?> <a href="logout.php">Logout</a></h4> </div>
        <p style="text-align: center;" class = "PP">هلا و سهلا </p>
       <div class="container" style="background-color: white !important; " >
          <h2>User Dashboard</h2>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-4" style="margin-left: 20%" >
                        <div class="form-group">
                            <label>First Name : </label>&nbsp;&nbsp;&nbsp;<span><?php echo $row['first_name']; ?></span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Last Name  : </label>&nbsp;&nbsp;&nbsp;<span><?php echo $row['last_name']; ?></span>                              
                        </div>
                    </div>
                    <hr>
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4" style="margin-left: 20%" >
                        <div class="form-group">
                            <label>User Name : </label>&nbsp;&nbsp;&nbsp;<span><?php echo $row['username']; ?> </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Email : </label>&nbsp;&nbsp;&nbsp;<span><?php echo $row['email']; ?> </span>                              
                        </div>
                    </div>                    
                </div><hr>
                <div class="row">
                    <div class="col-md-4" style="margin-left: 20%" >
                        <div class="form-group">
                            <label>Phone : </label>&nbsp;&nbsp;&nbsp;<span> <?php echo $row['phone']; ?> </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>City : </label>&nbsp;&nbsp;&nbsp;<span><?php echo $row['city']; ?> </span>                              
                        </div>
                    </div>                    
                </div>
                <hr>
                <div class="row">
                    <div class="col-md-4" style="margin-left: 20%" >
                        <div class="form-group">
                            <label>Country : </label>&nbsp;&nbsp;&nbsp;<span> <?php echo $row['country']; ?> </span>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label> </label>&nbsp;&nbsp;&nbsp;<span></span>                              
                        </div>
                    </div>                    
                </div>
                <hr>
                 <div class="row">
                    <div class="col-md-4" style="margin-left: 20%" >
                        <div class="form-group">
                             <label><a href="profile.php">Edit Profile</a>  </label>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label><a href="Change_passpage.php"> Change Password</a>  </label>                           
                        </div>
                    </div>                    
                </div>
            </div>
          
        </div>
        
    
</body>
</html>