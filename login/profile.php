<?php 
 include('config/db_login.php');
 session_start();
 if(!isset($_SESSION['user_uid']))
{
    echo "<script>window.location.href ='login.php';</script>";
}
//error_reporting(E_ALL);
 error_reporting(0);
    $username_err = $user_fname_err = $user_lname_err = $user_phone_err= $user_city_err = $user_country_err = ""; 
    if (isset($_REQUEST['submit'])) {

        $user_fname =  $_POST['first_name'];
        $user_lname =  $_POST['last_name'];
        $user_phone = $_POST['phone'];
        $user_city = $_POST['city'];
        $user_country= $_POST['country'];

        if (empty($_POST["username"])) {  
            $username_err = "Username is required";  
        } elseif (strlen ($_POST["username"]) <= 2) {  
            $username_err = "Username must be at least 3 characters.";  
        }elseif(strlen ($_POST["username"]) >= 15){
            $username_err =  "Username not more than 15 characters.";
        }else{
            $username = mysqli_real_escape_string($conn, $_POST["username"]);
        }  

        if (empty($_POST["first_name"])) {  
            $user_fname_err = "First name is required"; 
            $user_fname = mysqli_real_escape_string($conn, $user_fname);
        }

        if (empty($_POST["last_name"])) {  
            $user_lname_err = "Last name is required";  
            $user_lname =  mysqli_real_escape_string($conn, $user_lname);
        } 

        if (empty($_POST["phone"])) {  
            $user_phone_err = "Phone Number is required";  
            $user_phone = mysqli_real_escape_string($conn, $user_phone);
        }

        if (empty($_POST["city"])) {  
            $user_city_err = "City field is required"; 
            $user_city = mysqli_real_escape_string($conn, $user_city);
        } 

        if (empty($_POST["country"])) {  
            $user_country_err = "Country field is required";  
            $user_country = mysqli_real_escape_string($conn, $user_country);
        } 

        if($username && $user_fname && $user_lname && $user_phone && $user_city && $user_country ){
            $update_query = "UPDATE `users` SET  `first_name`='".$user_fname."',`last_name`='".$user_lname."',`username`='".$username."' ,`phone`='".$user_phone."' ,`city`='".$user_city."' ,`country`='".$user_country."'   WHERE `user_uid` = '".$_SESSION['user_uid']."'  ";
            if (mysqli_query($conn,$update_query) == TRUE) {
                $sucess_message = "Profile has been Updated Successfully";
            }else{
                $error_message = "Something Went Wrong!";
            }            
        }
    }
    if(isset($_SESSION['user_uid']))
    {
        $sql_query="SELECT * FROM users WHERE `user_uid`='".$_SESSION['user_uid']."'";        
        $result =    mysqli_query($conn,$sql_query);
        $row    =   mysqli_fetch_assoc($result);  
     } 
   //  print_r($_SESSION);
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
    <div > <h2><?php if($_SESSION){ echo "Wlecome, ".$_SESSION['username']; } ?>  &nbsp;&nbsp;&nbsp;<a href="dashboard.php">Dashboard</a> &nbsp;&nbsp;&nbsp;<a href="logout.php">Logout</a></h2> </div>
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
        <h1 class="login-title">Profile</h1>
        <input class="form-control" type="text" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } else{ echo $row['username']; }?>" name="username" id="user_name" placeholder="Username"  />
        <br>
        <span id="suser_name" class="error_msg"><?php echo $username_err; ?></span>
        <br>
        <input class="form-control" type="text" value="<?php if(isset($_POST['first_name'])){ echo $_POST['first_name']; } else{ echo $row['first_name']; }?>" name="first_name" id="first_name" placeholder="First Name"  />
        <br>
        <span id="sfname" class="error_msg"><?php echo $user_fname_err; ?></span>
        <br>
        <input class="form-control" type="text" value="<?php if(isset($_POST['last_name'])){ echo $_POST['last_name']; } else{ echo $row['last_name']; }?>" name="last_name" id="last_name" placeholder="Last Name"  />
        <br>
        <span id="slname" class="error_msg"><?php echo $user_lname_err; ?></span>
        <br>
        <input class="form-control" type="tel" pattern="[+ 0-9]{10,14}" title="enter number only, minimum 10, maximum 14 digit" value="<?php if(isset($_POST['phone'])){ echo $_POST['phone']; } else{ echo $row['phone']; }?>" name="phone" id="user_phone" placeholder="Phone"  />
        <br>
        <span id="sphone" class="error_msg"><?php echo $user_phone_err; ?></span>
        <br>
        <input class="form-control" type="text" value="<?php if(isset($_POST['city'])){ echo $_POST['city']; } else{ echo $row['city']; }?>" name="city" id="city" placeholder="City"  />
        <br>
        <span id="scity" class="error_msg"><?php echo $user_city_err; ?></span>
        <br>
        <input class="form-control" type="text" value="<?php if(isset($_POST['country'])){ echo $_POST['country']; } else{ echo $row['country']; }?>" name="country" id="country" placeholder="country"  />
        <br>
        <span id="scountry" class="error_msg"><?php echo $user_country_err; ?></span>
        <br>
        <input type="submit"  name="submit" value="Save" class="login-button">
  
    </form>
    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">        
        function form_validation() {
            var username = $("#user_name").val();
            var fname =  $("#first_name").val(); 
            var lname =  $("#last_name").val();
            var user_phone =  $("#user_phone").val(); 
            var city =  $("#city").val(); 
            var country =  $("#country").val();  

            var error=0;
            if(username==""){
                $('#suser_name').text("Username is required"); 
                    error++;
            }else if(username.length <= 2){
                $('#suser_name').text("Username must be at least 3 characters."); 
                error++;
            }else if(username.length >= 15){
                 $('#suser_name').text("Username not more than 15 characters.");
            }
            else{
                $('#suser_name').text(""); 
            }

            if(fname==""){
                $('#sfname').text("First Name is required"); 
                    error++;
            }
            else{
                $('#sfname').text(""); 
            }

            if(lname==""){
                $('#slname').text("Last Name is required"); 
                    error++;
            }
            else{
                $('#slname').text(""); 
            }
            if(user_phone==""){
                $('#sphone').text("Phone Number is required"); 
                    error++;
            }
            else{
                $('#sphone').text(""); 
            }

            if(city==""){
                $('#scity').text("City filed is required"); 
                    error++;
            }
            else{
                $('#scity').text(""); 
            }

            if(country==""){
                $('#scountry').text("Country filed is required"); 
                    error++;
            }
            else{
                $('#scountry').text(""); 
            }

            if(error>0){return false;}
        }


    </script>
</body>
    
</html>