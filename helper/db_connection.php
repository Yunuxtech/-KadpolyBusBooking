<?php
// making connection to the DataBase
$host = "localhost";
$user = "root";
$pass = "";
$db_name = "kadpolybusbooking_db";

$conn = mysqli_connect($host,$user,$pass,$db_name);
if(!$conn){
    die("error in conection");
}




?>