<?php include("helper/login.php");
include("helper/checklogin.php");
check_login();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Business | Bus Booking System</title>
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
    <script>

        function availableSeat(val) {
          $.ajax({
          type: "POST",
          url: "testing.php",
          data:'seat='+val,
          success: function(data){
            $("#availableSeat").html(data);
          }
          });
        }
    </script>
  </head>

  <body class="d-flex flex-column min-vh-100 bg-light">
    <!-- Nav-->
    <?php  require_once("include/header.php"); ?>

    <!-- content -->
    <div class="container flex-grow-1 flex-shrink-0 py-5">
    <?php
        session_start();
           if(isset($_SESSION["msg"])){
             echo $_SESSION["msg"];
           }
           unset($_SESSION["msg"]);

          ?>
      <div class="mb-5 p-4 bg-white shadow-sm">
      
            <h3>Booking Infomation</h3>
        <form class="needs-validation m-4" novalidate action="./helper/seatReservation.php" method="post">
          <div class="form-row">
            <!-- <div class="form-group col-12">
              <label for="inputMailForm"
                >Business Location/Address
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                id="inputMailForm"
                type="text"
                class="form-control"
                placeholder="Enter business location address"
                required
              />
              <div class="invalid-feedback">
                Please fill the business location address field
              </div>
            </div> -->

            <div class="form-group col-md-12">
              <label for="inputMailForm"
                >From - To
                <span class="text-danger font-weight-bold">*</span></label
              >
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">from</span>
                </div>

                <select class="custom-select" id="inputGroupSelect04" required name="from">
                    <option selected disabled>Location</option>
                    <?php
                    $sql = "SELECT * FROM `location`";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $row["terminalName"]; ?>"><?php echo $row["terminalName"]; ?></option>
                      <?php
                    }
                      ?>
                </select>
                <div class="input-group-prepend">
                  <span class="input-group-text">to</span>
                </div>

                <select class="custom-select" id="inputGroupSelect04" required name="to">
                    <option selected disabled>Location</option>
                    <?php
                    $sql = "SELECT * FROM `location`";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <option value="<?php echo $row["terminalName"]; ?>"><?php echo $row["terminalName"]; ?></option>
                      <?php
                    }
                      ?>
                </select>
                <div class="invalid-feedback">
                  Please fill the working experience from-to field
                </div>
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Day 
                <span class="text-danger font-weight-bold">*</span></label
              >
              <select class="custom-select" id="inputGroupSelect04" required name="day">
                <option selected disabled>Day</option>
                <option value="Mon">Monday</option>
                <option value="Tues">Tuesday </option>
                <option value="sun"><?php echo date("l") ?></option>
                
                
              </select>
              <div class="invalid-feedback">
                Please select the Day field
              </div>
            </div>

            <div class="form-group col-md-6">
                <label for="inputMailForm"
                  >Time
                  <span class="text-danger font-weight-bold">*</span></label
                >
                <select class="custom-select" id="inputGroupSelect04" required name="time">
                  <option selected disabled>Time</option>
                  <option value="7:00 am">7:00 am</option>
                  <option value="1:30 pm">1:30 pm</option>
                  
                </select>
                <div class="invalid-feedback">
                  Please fill the time  field
                </div>
            </div>

            <div class="form-group col-md-6">
                <label for="inputMailForm"
                  >Bus
                  <span class="text-danger font-weight-bold">*</span></label
                >
                <select class="custom-select" required name="bus">
                <option selected disabled>Bus</option>
                <?php
                    $sql = "SELECT * FROM `bus`";
                    $result = mysqli_query($conn,$sql);
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                        <option value="<?php echo $row["busName"]; ?>"><?php echo $row["busName"]; ?></option>
                      <?php
                    }
                      ?>
                  
                </select>
                <div class="invalid-feedback">
                  Please fill the time  field
                </div>
            </div>


            <div class="form-group col-md-6">
                <label for="inputMailForm"
                  >Available Seat
                  <!-- <span class="text-danger font-weight-bold">*</span> -->
                  </label
                >
                <!-- <input
                type="text"
                class="form-control"
                readonly
                value="0"
              /> -->
              <select name="availableSeat" class="form-control" id="availableSeat"  readonly>
              </select>

            </div>
                        

            
          </div>
          <!-- <hr />
          <h3>Card Details</h3>
          <div class="form-row">
              <div class="form-group col-md-6">
                  <label for="inputMailForm"
                    >Card Number
                    <span class="text-danger font-weight-bold">*</span></label
                  >
                  <input
                    type="number"
                    class="form-control"
                    placeholder="1234 5678 1234 5678"
                    required
                    max="14"
                    min="14"
                  />
                  <div class="invalid-feedback">
                    Please fill card number field
                  </div>
                </div>

                <div class="form-group col-md-3">
                  <label for="inputMailForm"
                    >Expire
                    <span class="text-danger font-weight-bold">*</span></label
                  >
                  <input
                    type="password"
                    class="form-control"
                    placeholder="MM/YYYY"
                    required
                  />
                  <div class="invalid-feedback">
                    Please fill card expire field
                  </div>
                </div>

                <div class="form-group col-md-2">
                  <label for="inputMailForm"
                    >CVV
                    <span class="text-danger font-weight-bold">*</span></label
                  >
                  <input
                    type="password"
                    class="form-control"
                    placeholder="CVV"
                    required
                  />
                  <div class="invalid-feedback">
                    Please fill card CVV field
                  </div>
                </div>

          </div> -->
          <div
            class="btn-toolbar justify-content-between"
            role="toolbar"
            aria-label="Toolbar with button groups"
          >
         
            <div class="btn-group" role="group" aria-label="First group">
                <p class="text-muted font-weight-bold mb-0">Fee:  ₦50.00 </p>
            </div>
            <div class="input-group">
              <button type="submit" class="btn btn-primary">
                Reserve Seat
              </button>
            </div>
          </div>
        
        
        </form>
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
