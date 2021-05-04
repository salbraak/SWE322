<?php 
 include('connection/config.php'); 
session_start();
error_reporting(1);
 ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
    <head>
        <!-- Meta tag -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="SITE KEYWORDS HERE" />
        <meta name="description" content="">
        <meta name='copyright' content='codeglim'>  
        
        <!-- Title Tag -->
        <title>GYM</title>
        <!-- Web Font -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">
        
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        
        <!-- info CSS -->
        <link rel="stylesheet" href="css/theme-plugins.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/responsive.css">   
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
        <!-- info Color -->
        <link rel="stylesheet" href="css/skin1.css">
        
        
    </head>
    <body id="bg" style="">
        <div id="layout" class="">
        <!-- Start Header -->
            <header id="header" class="header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3 col-sm-3 col-xs-12">
                            <!-- Logo -->
                            <div class="logo">
                                <a href="index.php"><img src="images/logo.png" alt="logo"></a>
                            </div>
                            <!--/ End Logo -->
                            <div class="mobile-nav"></div>
                        </div>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                            <!-- Header Widget -->
                            <div class="header-widget">
                                <!-- Single Widget -->
                            
                               
                                <div class="single-widget">                                  
                                    <?php 
                                        if(isset($_SESSION['user_uid'])){
                                    ?>
                                     <div class="dropdown">
                                          <button class="btn primary dropdown-toggle" type="button" data-toggle="dropdown"><?php echo $_SESSION['username'];  ?>
                                          <span class="caret"></span></button>
                                          <ul class="dropdown-menu">
                                           <!--  <li><a href="profile.php">Profile</a></li> -->
                                            <li><a href="logout.php">Logout</a></li>   
                                          </ul>
                                    </div>
                                    <?php } else{
                                        $page = end(explode('/', $_SERVER["REQUEST_URI"]));
                                        if($page=='signup.php'){ ?>
                                        <a href="login.php" class="cbp-l-loadMore-link btn primary text-white">Sign In</a>
                                        <?php  }else{ ?>
                                        <a href="signup.php" class="cbp-l-loadMore-link btn primary text-white">Sign Up</a>
                                    <?php } } ?> 
                                </div>
                                <!--/ End Single Widget -->
                            </div>
                            <!--/ End Header Widget -->
                        </div>
                    </div>
                </div>
                <!-- Header Inner -->
                <div class="header-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="nav-area">
                                    <!-- Main Menu -->
                                    <nav class="mainmenu">
                                        <div class="collapse navbar-collapse">  
                                            <ul class="nav navbar-nav">
                                              
                                                <li><a href="<?php if(isset($_SESSION['user_uid'])) { echo 'booking-classes.php' ;}else{ echo 'login.php'; } ?>">Book Classes </a></li>         
                                            </ul>
                                        </div>
                                    </nav>
                                    <!--/ End Main Menu -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ End Header Inner -->
            </header>
            <!--/ End Header -->
            <style type="text/css">
                .error_msg{
                    color:red;
                }
            </style>