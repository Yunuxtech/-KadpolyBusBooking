<nav class="navbar navbar-expand-sm navbar-dark bg-dark text-white">
      <div class="container">
        <h1 class="mb-0 h5 py-1 mr-3">
          <a class="navbar-brand" href="index.php">
            <img
              src="img/logo.jpg"
              width="30"
              height="30"
              class="d-inline-block align-top"
              alt=""
            />
            BusBookingSys</a
          >
        </h1>
        <a
          href="register.php"
          class="btn btn-outline-light py-1 ml-auto mx-sm-0 order-0 order-sm-last"
        >
          Register Now
        </a>
        <button
          class="navbar-toggler ml-3"
          type="button"
          data-toggle="collapse"
          data-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <?php 
            if(isset($_SESSION["login"])){ 
              include("include/sub-header.php"); 
            } 
              
            ?>
            
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Contact Us</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>