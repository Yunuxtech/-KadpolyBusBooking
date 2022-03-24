<?php 
include("helper/login.php");
include("helper/checklogin.php");
check_login();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Booked History | Bus Booking System</title>
    <meta
      name="description"
      content="Association of Point of Sales Users Membership Registation"
    />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="img/logo.jpg" type="image/gif" sizes="16x16" />
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
  </head>

  <body class="d-flex flex-column min-vh-100 bg-light">
    <!-- Nav-->
    <?php  require_once("include/header.php"); ?>
    <!-- content -->
    <div class="container flex-grow-1 flex-shrink-0 py-5">
      <div class="mb-5 p-4 bg-white shadow-sm">
        <h3>My Booking History</h3>

        <div class="card-body">
          <!-- <ol>
            <li class="mb-3">
              jnjsnjsnjcsxcnsnnsjnxns
              <ol type="a">
                <li>JNsjnjsncsjnxjsjxsn.</li>
                <li>jndcjdncjndjcdn.</li>
              </ol>
            </li>
            <li class="mb-3">jcdnjdncjdnjncnc</li>
          </ol> -->
          <table class="table caption-top">
                <caption>
                  List of Reservation
                </caption>
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">BookID</th>
                    <th scope="col">From - To</th>
                    <th scope="col">Day - Time</th>
                    <th scope="col">Date</th>

                  </tr>
                </thead>

                        <?php
                          $id = $_SESSION["login"];
                          $sql = "SELECT * FROM `schedule_list` WHERE userID = '$id'";
                          $result = mysqli_query($conn,$sql);
                          $count = 1;
                          while($row = mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <th scope="row"><?php  echo $count; ?></th>
                                <td><?php echo $row["orderID"]; ?></td>
                                <td><?php echo $row["location_from"]; ?> - <?php echo $row["location_to"]; ?></td>
                                <td><?php echo $row["day"]; ?> - <?php echo $row["time"]; ?></td>
                                <td><?php echo $row["oderDate"]; ?></td>
                              </tr>
                          <?php 
                          $count++;             
                            
                          }
                      ?>
                <tbody>
          </table>
        </div>
      </div>
    </div>

    <!-- footer -->
    <footer class="p-3 mt-auto bg-white shadow">
      <div class="container">
        <p class="text-muted float-left">
          <b>Supervisor</b>: Dr. Mal. Abbas Yusuf
        </p>
        <p class="float-right">
          <b>Developed by</b>: Bashir Abdulwahab - KPT/CST/19/46763
        </p>
      </div>
    </footer>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
