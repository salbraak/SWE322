<?php include "header.php"; 
if(!isset($_SESSION['user_uid']))
{  
    echo "<script>window.location.href ='login.php';</script>";
}
if(isset($_POST['submit'])){
    if($_POST['classs_name']){
       foreach ($_POST['classs_name'] as $class_id) {
            $booking_insert = "INSERT INTO `bookings` (`class_id`,`user_id`) values ('".$class_id."','".$_SESSION['user_id']."')";
            if ($conn->query($booking_insert) === TRUE) {
                $class_query = mysqli_query($conn, "SELECT * FROM `classes` WHERE `classes_id` = '".$class_id."' ");
                $class_row =   mysqli_fetch_array($class_query) ; 
                $number_of_trainees = $class_row['number_of_trainees']+1;
                $update_class=  "UPDATE `classes` SET `number_of_trainees`=$number_of_trainees WHERE `classes_id`  = '".$class_id."' ";
                mysqli_query($conn,$update_class);
                $sucess_message =  "Class added successfully";
            }else {
                $error_message =  "Something wrong";
            }
        } 
        /*-------------Foreach end----------*/    
    }else{
        $error_message = "Please Select a class.";
    }

}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .table th{
        background-color: #c32d2d;
        color: white;
    }
</style>
<section id="contact-us" class="contact-us section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h1>Book Classes</h1>                                
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Contact Form -->
            <div class="col-md-2" ></div>
            <div class="col-md-8 col-sm-6 col-xs-12">              
                <form class="form" method="post" action="">
                    <div class="row">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Class Name</th>
                                    <th>Trainer Name</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                    $classes_query = mysqli_query($conn, "SELECT * FROM `classes` WHERE `classes_id` NOT IN (SELECT `class_id` FROM `bookings` WHERE `user_id` ='".$_SESSION['user_id']."') AND `max_num_of_trainees` > `number_of_trainees`");
                                    while ($classes_row = mysqli_fetch_array($classes_query)){
                                 ?>
                                <tr>
                                    <td><label><input name="classs_name[]" value="<?php echo $classes_row['classes_id']; ?> " type="checkbox"  > <?php echo $classes_row['class_name']; ?></label></td>
                                    <td><?php echo $classes_row['trainer_name']; ?></td>
                                    <td><?php echo $classes_row['class_date']; ?></td>
                                </tr> 
                                <?php } ?>                            
                            </tbody>
                        </table>
                    </div>
                    <div class="form-group button"> 
                        <button type="submit" style="float: right;" name="submit" class="btn primary">Book Now</button>
                    </div>
                </form>
            </div>           
        </div>
        <?php if($_SESSION['user_id']){ ?>
        <div class="row">
            <div class="section-title">
                <h1>Booked Classes</h1>                                
            </div>
             <div class="col-md-2" ></div>
            <div class="col-md-8 col-sm-6 col-xs-12">                 
              
                <div class="row">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Class Name</th>
                                <th>Trainer Name</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                           
                                $select_booking_query = mysqli_query($conn, "SELECT * FROM `classes` C INNER JOIN `bookings` B ON C.`classes_id` = B.`class_id` WHERE B.`user_id`='".$_SESSION['user_id']."'");
                                while ($select_booking_row = mysqli_fetch_array($select_booking_query)){
                             ?>
                            <tr>
                                <td><label><?php echo $select_booking_row['class_name']; ?></label></td>
                                <td><?php echo $select_booking_row['trainer_name']; ?></td>
                                <td><?php echo $select_booking_row['class_date']; ?></td>
                            </tr> 
                            <?php } ?>                            
                        </tbody>
                    </table>
                </div>
            </div>            
        </div>
        <?php } ?>
    </div>
</section>
<?php include "footer.php"; ?>
 