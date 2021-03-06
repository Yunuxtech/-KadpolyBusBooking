<?php 
include("helper/login.php");
include("./helper/checklogin.php");
check_login();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Profile | Bus Booking System</title>
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
    <?php
        session_start();
           if(isset($_SESSION["msg"])){
             echo $_SESSION["msg"];
           }
           unset($_SESSION["msg"]);

          ?>
      <div class="mb-5 p-4 bg-white shadow-sm">
        <h3>Profile Infomation</h3>
        <?php
        $id = $_SESSION["login"];
        $sql = "SELECT * FROM `users` WHERE id = '$id'";
        $result = mysqli_query($conn,$sql);
        $row = mysqli_fetch_assoc($result);


        ?>
        <form class="needs-validation m-4" novalidate action="./helper/update.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Full name
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                type="text"
                class="form-control"
                placeholder="Enter your full name"
                required
                readonly
                value="<?php echo $row["FullName"]; ?>"
              />
              <div class="invalid-feedback">
                Please fill the full name field
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Registation No
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                type="text"
                class="form-control"
                placeholder="Enter your registation number"
                required
                readonly
                value="<?php echo $row["reg.No"]; ?>"
              />
              <div class="invalid-feedback">
                Please fill the registation number field
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Level
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                type="text"
                class="form-control"
                placeholder="Enter your level number"
                required
                readonly
                value="<?php echo $row["level"]; ?>"
              />
              <div class="invalid-feedback">
                Please fill the Level field
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Department
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                type="text"
                class="form-control"
                placeholder="Enter your Department number"
                required
                readonly
                value="<?php echo $row["department"]; ?>"
              />
              <div class="invalid-feedback">
                Please fill the Department field
              </div>
            </div>



            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Email address
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                type="email"
                class="form-control"
                placeholder="Enter your email address"
                required
                name="email"
                value="<?php echo $row["email"]; ?>"
              />
              <div class="invalid-feedback">
                Please fill the email address field
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Phone number
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                type="text"
                class="form-control"
                placeholder="Enter your phone number"
                required
                name="phone"
                value="<?php echo $row["phone"]; ?>"
              />
              <div class="invalid-feedback">
                Please fill the phone number field
              </div>
            </div>
          </div>

          <div
            class="btn-toolbar justify-content-between"
            role="toolbar"
            aria-label="Toolbar with button groups"
          >
            <div class="btn-group" role="group" aria-label="First group">
              <!-- <a href="#" class="btn btn-light disabled">Back</a> -->
            </div>
            <div class="input-group">
              <button type="submit" class="btn btn-primary">
                Update Profile
              </button>
            </div>
          </div>
        </form>

        <hr />

        <form class="needs-validation m-4" novalidate action="./helper/changePassword.php" method="post">
          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >Curent password
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                type="password"
                class="form-control"
                placeholder="Enter your current password"
                required
                name="oldPass"
              />
              <div class="invalid-feedback">
                Please fill the current password field
              </div>
            </div>

            <div class="form-group col-md-6">
              <label for="inputMailForm"
                >New password
                <span class="text-danger font-weight-bold">*</span></label
              >
              <input
                type="password"
                class="form-control"
                placeholder="Enter your new password"
                required
                name="newPass"
              />
              <div class="invalid-feedback">
                Please fill the new password field
              </div>
            </div>
          </div>

          <div
            class="btn-toolbar justify-content-between"
            role="toolbar"
            aria-label="Toolbar with button groups"
          >
            <div class="btn-group" role="group" aria-label="First group">
              <!-- <a href="#" class="btn btn-light disabled">Back</a> -->
            </div>
            <div class="input-group">
              <button type="submit" class="btn btn-primary">
                Update Password
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
