<li class="nav-item">
    <a class="nav-link" href="profile.php">My Profile</a>
</li>
<?php

$id = $_SESSION["login"];

$sql = "SELECT * FROM `users` WHERE id = '$id'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
if($row["status"] == 1){
    ?>
    <li class="nav-item">
        <a class="nav-link" href="systemconfig.php"> System Config </a>
    </li>
    <?php
}

?>

<li class="nav-item">
    <a class="nav-link" href="reserveSeat.php">Reserve a Seat</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="bookedSeat.php">Booked History</a>
</li>
<li class="nav-item">
    <a class="nav-link" href="logout.php">Logout</a>
</li>