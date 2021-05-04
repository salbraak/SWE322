<?php include "header.php";



/*
if(isset($_SESSION['user_uid']))
{
    echo "<script>window.location.href ='dashboard.php';</script>";
}*/
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
        $query    = "SELECT * FROM `users` WHERE (`username`='$username' OR `user_email`='$username') AND `user_password`='".base64_encode($password) ."'";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)==1)
        {
            $row    =   mysqli_fetch_array($result);            
            $_SESSION['user_id']     = $row['user_id']; 
            $_SESSION['user_uid']     = $row['user_uid'];            
            $_SESSION['user_email']   = $row['user_email'];
            $_SESSION['username']   = $row['username'];
            
            echo "<script>window.location.href ='booking-classes.php';</script>";
        }
        else
        {   
            $error_message = "Invalid username or password";
        }
    }
?>

<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="row">
            <h2 align="center">SignIn</h2>
            <br>
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div align="center" style="font-size: 25px;">
                        <?php 
                        if($error_message){
                        ?>
                        <div style="color: :red;">
                          <strong>Error!</strong> <?php echo $error_message; ?>
                        </div>
                        <?php }?>
                    </div>
                     <div class="panel-heading">Login here for join Us</div>
                     <div class="panel-body">
                         <form class="form" method="post" name="login">   
                            <span id="sfname" class="error_msg"><?php echo $useNameErr; ?></span>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input class="form-control login-input" type="text" value="<?php if(isset($_POST['username'])){ echo $_POST['username']; } ?>" name="username" placeholder="Username" autofocus="true"/>                                     
                            </div>
                            <span id="spassword" class="error_msg"><?php echo $passwordErr; ?></span>
                            <div style="margin-bottom: 25px" class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input class="form-control" type="password" value="<?php if(isset($_POST['password'])){ echo $_POST['password']; } ?>" name="password" placeholder="Password"/>                               
                            </div>
                            <!-- <div class="clearfix">
                                <label class="pull-right"><a href="forgotpassword.php">Forgot Password</a></label>
                                <label class="pull-left"><input type="checkbox"> Remember me</label>
                            </div> -->
                            <div class="form-group">
                                <input  type="submit" value="Login" name="submit" class="btn btn primary btn-block"/>
                            </div>
                        </form>
                         <div class="form-group text-center">
                            <p>If you don't have an account <a href="signup.php">Signup</a> here </p>
                         </div>
                     </div>
                </div>
            </div>
                   
        </div>
    </div>
</section>
<?php include "footer.php"; ?>
 