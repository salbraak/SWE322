<?php 
session_start();
if(!isset($_SESSION['user_uid']))
{
    echo "<script>window.location.href ='login.php';</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Your Password</title>
    <link rel="stylesheet" href="SS.css"/>
</head>
<?php

//error_reporting(E_ALL);
include('config/db_login.php');

$old_pass_err = $passwordErr = $confpasswordErr = "";
if(isset($_POST['change_pass']))
{	 

	 $old_pass = $_POST['old_pass'];
	  $new_pass = $_POST['new_pass'];
	  $conf_pass = $_POST['passconf'];
		  
		
	  if(empty($old_pass)){
	     $old_pass_err = "Please Enter New Password";
	  }
	  
	  if (empty($_POST["new_pass"])) {  
            $passwordErr = "New password is required";  
        }elseif(strlen ($_POST["new_pass"]) <= 8){
            $passwordErr =  "Password must be at least 8 characters";
        }else if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/", $_POST["new_pass"])) {
            $passwordErr = 'Password must contain at least one upper case letter, one lower case letter, one digit and one special character';
        }elseif($_POST["new_pass"]!=$_POST["passconf"]){
            $confpasswordErr = 'New password and Confirm password not matched';
        }
        else{
            $password = $_POST["new_pass"];
        }

		if(!empty($old_pass)){
		    $chpass_query="SELECT * FROM users WHERE `user_uid`='".$_SESSION['user_uid']."' AND `password` = '".base64_encode($old_pass)."' ";        
		    $getresult = mysqli_query($conn,$chpass_query);
		    if(mysqli_num_rows($getresult)==1)
		      {
		           $update_password = "UPDATE `users` SET `password` ='".base64_encode($new_pass)."' WHERE `user_uid` = '".$_SESSION['user_uid']."'  ";
		          if (mysqli_query($conn,$update_password) == TRUE) {
		             $pwd_success = "Password Update successfully.";
		          }else{
		            $error_pwd_msg[] = "Something wrong";
		          }
		           
		      }else{
		        $error_pwd_msg[] = "Old Password Not Matched";
		      }
		  }else{
		    $error_pwd_msg[] = "Please Enter Old Password";
		  }

}
?>

<body class = "bb">
<div > <h2><?php if($_SESSION){ echo "Wlecome, ".$_SESSION['username']; } ?>  &nbsp;&nbsp;&nbsp;<a href="profile.php">Profile</a> &nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></h2> </div>
<h3 class = "H">Change Password</h3>
<div align="center" style="font-size: 26px;">
        <?php 
        if(isset($pwd_success)){
        ?>
        <div style="color: green;">
          <strong>Success!</strong> <?php echo $pwd_success; ?>
        </div>
        <?php }?>
        <?php 
            if(isset($error_pwd_msg)){
        ?>
        <div style="color: :red;">
          <strong>Error!</strong> <?php echo implode("", $error_pwd_msg); ?>
        </div>
        <?php }?>
    </div>

<form method="POST" class="form" action=""  onsubmit="return form_validation();" >
   
        <input class="form-control" type="password" name="old_pass" id="old_pass"  placeholder="old password"  />
    	<br>
        <span id="sold_pass" class="error_msg"><?php if(isset($old_pass_err)){ echo $old_pass_err; } ?></span>
        <br>
        <input class="form-control" type="password" name="new_pass" id="new_password"  placeholder="new password"  />
    	<br>
        <span id="spassword" class="error_msg"><?php if(isset($passwordErr)){ echo $passwordErr; } ?></span>
        <br>
        <input class="form-control" type="password" name="passconf" id="confirm_pwd" placeholder="Confirm Password">
        <br>
        <span id="pwd_error_msg" class="error_msg"><?php if(isset($confpasswordErr)){ echo $confpasswordErr; } ?></span>
        <br>
        <input type="submit" name="change_pass" class = "login-button"  value="Change Password"/>

</form>
 <p class="login-button"><a href="dashboard.php">Dashboard</a></p>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">        
        function form_validation() {           

            var old_pass = $("#old_pass").val();
            var password = $("#new_password").val();
             var error=0;
            if(old_pass==""){
                $('#sold_pass').text("Old field is required"); 
                    error++;
            }else{
                $('#sold_pass').text(""); 
            }

            if(password==""){
                $('#spassword').text("Password field is required"); 
                    error++;
            }else if(password.length <= 8){
                $('#spassword').text("Password must be at least 8 characters"); 
                error++;
            }
            else if (!/[a-z]/.test(password) || ! /[A-Z]/.test(password) || !/[0-9]/.test(password) || !/[!@#\$%\^&\*]/.test(password) ){
               
                $('#spassword').text("Password must contain at least one upper case letter, one lower case letter, one digit and one special character"); 
                error++;
            }else{
                $('#spassword').text(""); 
                var Conf_password = $("#confirm_pwd").val();
                if(password != Conf_password){
                    $("#pwd_error_msg").text('Password Does Not Matched');
                    error++;
                }
                else{
                    $("#pwd_error_msg").text('');
                }
            }

            if(error>0){return false;}
        }


    </script>
</body>
</html>