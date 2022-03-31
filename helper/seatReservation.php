<?php

require_once("validate_input.php");
require_once("db_connection.php");
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){

    $from = validate_input($_POST["from"]);
    $to = validate_input($_POST["to"]);
    $day = validate_input($_POST["day"]);
    $time = validate_input($_POST["time"]);
    $bus = validate_input($_POST["bus"]);

    $orderID = strtoupper(uniqid());
    $id = $_SESSION["login"];
    $result = mysqli_query($conn,"SELECT * FROM `users` WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);
    $std_name = $row["FullName"];

    // cheking query 
    $checksql = mysqli_query($conn,"SELECT * FROM `bus` WHERE busName = '$bus'");
    $checkres = mysqli_fetch_assoc($checksql);

    // checking for those that apply for the same depature time

    $depsql = mysqli_query($conn,"SELECT * FROM `schedule_list` WHERE time = '$time' AND bus_name = '$bus'");
    $depres = mysqli_num_rows($depsql);

    if(($checkres["busAvailableSpace"] < $checkres["busCap"]) && ($depres < $checkres["busCap"])){
        $insertsql = "INSERT INTO `schedule_list`(`userID`,`orderID`, `std_name`, `location_from`, `location_to`, `bus_name`, `day`, `time`) VALUES ('$id','$orderID','$std_name','$from','$to','$bus','$day','$time')";
            $insertresult = mysqli_query($conn,$insertsql);
            if($insertresult){

                // updating the availble seat in the selected bus
                $sql = mysqli_query($conn,"UPDATE `bus` SET busAvailableSpace = busAvailableSpace + 1 WHERE busName = '$bus' ");
                $_SESSION["msg"] = '<div class= "alert alert-success">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Seat Reserve Successful</strong> Print Receipt
            </div>';
                header("location:../receipt.php");
            }else{
                $_SESSION["msg"] = '<div class= "alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed due to some error</strong>
            </div>';
                header("location:../reserveSeat.php");
            }
    }else{
        $_SESSION["msg"] = '<div class= "alert alert-danger">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>No Seat Available check time or bus</strong>
            </div>';
                header("location:../reserveSeat.php");

    }
    
}


// getting the availabe seats usin ajax

if(!empty($_POST["seat"])){
    $seat = $_POST["seat"];
    $sql=mysqli_query($conn,"SELECT * FROM `bus` WHERE busName = '$seat'");
    while($row=mysqli_fetch_array($sql))
    {
        ?>
        <option><?php echo htmlentities($row['busAvailableSpace']); ?></option>
        <?php
        }

}

