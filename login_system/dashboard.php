<?php
//include auth_session.php file on all user panel pages
include("Auth.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="Style.css" />
</head>
<body class = "bb">
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p class = "PP">هلا و سهلا </p>
    </div>
</body>
</html>