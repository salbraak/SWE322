<?php
session_start();
include('config/db_login.php');
if(isset($_POST['change_pass']))
{	 
	$username=$_SESSION["username"];
	$old_pass = md5($_POST['old_pass']);
	$new_pass = md5($_POST['new_pass']);
	$pass=mysqli_query($conn,"select password from user_accounts where user_name = $username and password='$old_pass'");
	echo "select password from user_accounts where user_name = $username and password='$new_pass'";
	$row_pass = mysqli_fetch_array($pass);
	if (mysqli_num_rows($pass)>0)
	{
		if($old_pass==$row_pass['password']){
			$sql = "UPDATE user_accounts set password='$new_pass' where user_name =$username";
			if (mysqli_query($conn, $sql)) {
				header("Location: login_form.php?status=200");
				exit();
			}
		}
	}
	else{
		header("Location: change_passpage.php?status=201");
		exit();
	}
	mysqli_close($conn);
}
?>