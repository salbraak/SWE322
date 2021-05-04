<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Change Your Password</title>
    <link rel="stylesheet" href="Style.css"/>
</head>
<body class = "bb">

   
                        <?php echo "Wlecome, ".$_SESSION['username'];?>
						<h3 class = "H">Change Password</h3>
						<?php
					if(count($_GET)>0){
						if($_GET['status']==200){
							echo "<span style='color:green;text-align:center;'>Password changed successfully !</span>";
						}
						if($_GET['status']==201){
							echo "<span style='color:red;text-align:center;'>Invalid Old password  !</span>";
						}
					}
					?>
                        <form method="POST" class="form" action="change_password.php">
						   
                                <input type="password" name="old_pass"  placeholder="old_password"  required />
                            
                                <input type="password" name="new_pass"  placeholder="new password"  required />
                            
                                <input type="submit" name="change_pass" class = "login-button"  value="Change Password"/>
                
                        </form>
                        <p class="login-button"><a href="login_form.php">Click to Login</a></p>
                
</body>
</html>