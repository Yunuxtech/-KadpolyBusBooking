 <section id="bg-bus" class="d-flex align-items-center">
    <div class="container text-center">
      <?php if(!isset($_SESSION['login_id'])): ?>
      	<button class="btn btn-info btn-lg" type="button" id="book_now">Book Now</button>
      <?php else: ?>
        <h2>Welcome</h2>
        <h1><?php echo $_SESSION['login_name'] ?></h1>
      <?php endif; ?>
    </div>
  </section>

      <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment bg-white">
      <div class="container">

        <div class="section-title">
          <h2 class="text-white">Log a complaint</h2>
        </div>

        <form action="contact.php" method="post" role="form" class="php-email-form">
          <div class="form-row">
            <div class="col-md-4 form-group">
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
              <div class="validate"></div>
            </div>
            <div class="col-md-4 form-group">
              <input type="tel" class="form-control" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
              <div class="validate"></div>
            </div>
          </div>

          <div class="form-group">
            <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
            <div class="validate"></div>
          </div>
          <div class="mb-3">
            <div class="loading">Loading</div>
            <div class="error-message"></div>
            <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
          </div>
          <div class="text-center"><button type="submit">Make an Appointment</button></div>
        </form>

      </div>
    </section><!-- End Appointment Section -->

  <script>
  	$('#book_now').click(function(){
      uni_modal('Find Schedule','book_filter.php')
  })
  </script>