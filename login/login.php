<!DOCTYPE html>
<?php 
include('config/db_login.php');
session_start();
error_reporting(1);
if(isset($_SESSION['user_uid']))
{
    echo "<script>window.location.href ='dashboard.php';</script>";
}
 ?>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="SS.css"/>
</head>
<body class = "bb">
<?php
    
    // When form submitted, check and create user session.
    $useNameErr = $passwordErr ="";
    if (isset($_POST['submit'])) {
        if (empty($_POST["username"])) {  
            $useNameErr = "Username is required";  
        }
        if (empty($_POST["password"])) {  
            $passwordErr = "password is required";  
        }
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($conn, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE (`username`='$username' OR `email`='$username') AND `password`='".base64_encode($password) ."'";
        $result = mysqli_query($conn, $query) or die(mysqli_error());
        $get_row=  mysqli_fetch_array($result) ;
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['user_uid'] = $get_row['user_uid'];
            $_SESSION['username'] = $username;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
           $error_message = "Invalid username or password";
        }
    }
?>
<div align="center" style="font-size: 25px;">
    <?php 
    if($error_message){
    ?>
    <div style="color: :red;">
      <strong>Error!</strong> <?php echo $error_message; ?>
    </div>
    <?php }?>
</div>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input class="form-control login-input" type="text" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>" name="username" placeholder="Username" autofocus="true"/>
        <br><span id="sfname" class="error_msg"><?php echo $useNameErr; ?></span>
        
        <br>
        <input class="form-control login-input" type="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>" name="password" placeholder="Password"/>
        <br>
            <span id="spassword" class="error_msg"><?php echo $passwordErr; ?></span>
        <br>
        <input  type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
        
  </form>
</body>
</html>