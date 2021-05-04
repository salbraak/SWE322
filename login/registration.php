<?php 
 include('config/db_login.php');
//error_reporting(E_ALL);
 error_reporting(0);
    $useNameErr = $emailErr = $passwordErr =$confpasswordErr = ""; 
    if (isset($_REQUEST['submit'])) {


        if (empty($_POST["username"])) {  
            $useNameErr = "Username is required";  
        } elseif (strlen ($_POST["username"]) <= 2) {  
            $useNameErr = "Username must be at least 3 characters.";  
        }elseif(strlen ($_POST["username"]) >= 15){
            $useNameErr =  "Username not more than 15 characters.";
        }else{
            $username = $_POST["username"];
        }  

        //Email Validation   
        if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
        }elseif (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {  
            $emailErr = "Invalid email format";
        }else{
            $email = $_POST["email"];
        } 

        if (empty($_POST["password"])) {  
            $passwordErr = "password is required";  
        }elseif(strlen ($_POST["password"]) <= 8){
            $passwordErr =  "Password must be at least 8 characters";
        }else if(!preg_match("/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{8,}$/", $_POST["password"])) {
            $passwordErr = 'Password must contain at least one upper case letter, one lower case letter, one digit and one special character';
        }elseif($_POST["password"]!=$_POST["passconf"]){
            $confpasswordErr = 'New password and Confirm password not matched';
        }
        else{
            $password = $_POST["password"];
        } 
          
        if($username && $email && $password ){
            $username = stripslashes($_REQUEST['username']);
            $username = mysqli_real_escape_string($conn, $username);
            $email    = stripslashes($_REQUEST['email']);
            $email    = mysqli_real_escape_string($conn, $email);
            $password = stripslashes($_REQUEST['password']);
            $password = mysqli_real_escape_string($conn, $password);

            $sql_query = "INSERT INTO `users` (`user_uid`,`username`,`email`,`password`,`added_date`) VALUES ('".uniqid()."','".$username."','".$email."','".base64_encode($password)."','".date("y-m-d h:i:s")."') ";
             $result   = mysqli_query($conn, $sql_query);
            if ($result) {
                $sucess_message =  "Your have Successfully Registed, Please login";
                $_POST["username"]= $_POST["email"]= $_POST["password"]="";
            } else {
                $error_message =  "Something wrong";
            }
        }
    }
 ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Registration</title>
    <link rel="stylesheet" href="SS.css"/>
    <script src = "js/main.js"> </script>

</head>
<body class = "bb">
    <div align="center" style="font-size: 26px;">
        <?php 
        if($sucess_message){
        ?>
        <div style="color: green;">
          <strong>Success!</strong> <?php echo $sucess_message; ?>
        </div>
        <?php }?>
        <?php 
            if($error_message){
        ?>
        <div style="color: :red;">
          <strong>Error!</strong> <?php echo $error_message; ?>
        </div>
        <?php }?>
    </div>
    <form class="form" action="" method="post" onsubmit="return form_validation(); ">
        <h1 class="login-title">Registration</h1>
        <input class="form-control" type="text" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>" name="username" id="user_name" placeholder="Username"  />
        <br>
        <span id="sfname" class="error_msg"><?php echo $useNameErr; ?></span>
        <br>
        <input class="form-control" type="text"  name="email" value="<?php if(isset($_POST['email'])){ echo $_POST['email']; } ?>" id="user_email" placeholder="Email ID">
        <br>
        <span id="semail" class="error_msg"><?php echo $emailErr; ?></span>
        <br>
        <input class="form-control" type="password" name="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>" id="password" placeholder="Password">
        <br>
        <span id="spassword" class="error_msg"><?php echo $passwordErr; ?></span>
        <br>
        <input class="form-control" type="password" name="passconf" id="confirm_pwd" placeholder="Confirm Password">
        <br>
        <span id="pwd_error_msg" class="error_msg"><?php echo $confpasswordErr; ?></span>
        <br>
        <input type="submit"  name="submit" value="Register" class="login-button">
        <p class="login-button"><a href="login.php">Click to Login</a></p>
    </form>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">        
        function form_validation() {
            var username = $("#user_name").val();
            var email = $("#user_email").val();
            var password = $("#password").val();
           
            var error=0;
            if(username==""){
                $('#sfname').text("Username is required"); 
                    error++;
            }else if(username.length <= 2){
                $('#sfname').text("Username must be at least 3 characters."); 
                error++;
            }else if(username.length >= 15){
                 $('#sfname').text("Username not more than 15 characters.");
            }
            else{
                $('#sfname').text(""); 
            }

            if(email==""){
                $('#semail').text("Email field is required"); 
                    error++;
            } else if (!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(email)){
                $('#semail').text("The Email address is invalid.\n");
                error++; 
            }
            else{
                $('#semail').text(""); 
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