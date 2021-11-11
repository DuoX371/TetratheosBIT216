<?php
include ("functions/functions.php");
include ("include/header.php")
?>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body style="padding-top:0;">
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <h1>Lets defeat Covid-19 together</h1>
          <h2>Get yourself vaccinate and protect against the corona virus</h2>
          <div class="d-flex justify-content-center justify-content-lg-start">
            <a href="#about" class="btn-get-started scrollto">Get Started</a>
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
          <img src="https://i.imgur.com/VCscAEc.png" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About Us</h2>
        </div>

        <div class="row content">
					<div class="col-lg-3"></div>
          <div class="col-lg-6">
            <p>
              Tetratheos is founded by 2 developers from HELP University, Johann and Jia Le. Our purpose is to ground our commitment
							to provide vaccination to citizens in Malaysia which will provide public benefit, advance medical care and the safety
							of the citizens.
            </p>
          </div>
					<div class="col-lg-3"></div>
        </div>
				<div class="row content">
					<div class="col-lg-6">
					<div class="section-title"><h2 style="font-size:20px;margin-bottom:0;padding-top:30px;">Mission</h2></div>
					To provide the best experience for our customers to get their vaccination appointment and vaccination done easily.
					</div>
					<div class="col-lg-6">
					<div class="section-title"><h2 style="font-size:20px;margin-bottom:0;padding-top:30px;">Vision</h2></div>
					To be the leading vaccination provider service in Malaysia.
					</div>
      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Why use our Services?</h2>
        </div>

        <div class="row">
          <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4><a href="">Multiple vaccination choices</a></h4>
              <p>Apply for any vaccine of your choice from Pfizer to Sinovac and more</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4><a href="">Choose a location nearby you</a></h4>
              <p>Choose from many different locations that is nearby and convinient for you!</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4><a href="">Appointment date</a></h4>
              <p>Set your own appointment date! Come at any day that you are free.</p>
            </div>
          </div>

          <div class="col-xl-3 col-md-6 d-flex align-items-stretch mt-4 mt-xl-0" data-aos="zoom-in" data-aos-delay="400">
            <div class="icon-box">
              <div class="icon"><i class="bx bx-layer"></i></div>
              <h4><a href="">Free an easy</a></h4>
              <p>Super easy to navigate around and use</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

		    <!-- ======= Why Us Section ======= -->
		    <section id="why-us" class="why-us section-bg" style="background-color:#FFF">
		      <div class="container-fluid" data-aos="fade-up">

		        <div class="row">

		          <div class="col-lg-7 d-flex flex-column justify-content-center align-items-stretch  order-2 order-lg-1">

		            <div class="content">
		              <h3><strong>Getting Started</strong></h3>
		              <p>Follow the few simple steps below to the get your vaccination appointment
		              </p>
		            </div>

		            <div class="accordion-list">
		              <ul>
		                <li>
		                  <a data-bs-toggle="collapse" class="collapse" data-bs-target="#accordion-list-1"><span>01</span>Register and Login</a>
		                  <div id="accordion-list-1" class="collapse show" data-bs-parent=".accordion-list">
		                    <p>Head over <a href="register.php" style="display:inline;padding-right:0;">here</a> to register account and login <a href="login.php" style="display:inline;padding-right:0;">here</a>.</p>
		                  </div>
		                </li>

		                <li>
		                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-2" class="collapsed"><span>02</span>Choose a vaccine, location and set your appointment date</a>
		                  <div id="accordion-list-2" class="collapse" data-bs-parent=".accordion-list">
		                    <p>Select the vaccine of your choice, the location available, and the date for your appointment.</p>
		                  </div>
		                </li>

		                <li>
		                  <a data-bs-toggle="collapse" data-bs-target="#accordion-list-3" class="collapsed"><span>03</span>View your appointment!</a>
		                  <div id="accordion-list-3" class="collapse" data-bs-parent=".accordion-list">
		                    <p>Head over <a href="appointment.php" style="display:inline;padding-right:0;">here</a> to view your appointment.</p>
		                  </div>
		                </li>

		              </ul>
		            </div>

		          </div>

		          <div class="col-lg-5 align-items-stretch order-1 order-lg-2 img" style='background-image: url("https://i.imgur.com/1Tc78ZG.png");' data-aos="zoom-in" data-aos-delay="150">&nbsp;</div>
		        </div>

		      </div>
		    </section><!-- End Why Us Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Our Team</h2>
          <p>Meet our team members and the developer of Tetratheos</p>
        </div>

        <div class="row">
          <div class="col-lg-6">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="100">
              <div class="pic"><img src="https://i.imgur.com/h48xLjy.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Johann Choo Jia Han</h4>
                <span>Founder and developer</span>
                <p>5 years+ experience as a backend developer</p>
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-6 mt-4 mt-lg-0">
            <div class="member d-flex align-items-start" data-aos="zoom-in" data-aos-delay="200">
              <div class="pic"><img src="https://imgur.com/BOTvk6O.png" class="img-fluid" alt=""></div>
              <div class="member-info">
                <h4>Yong Jia Le</h4>
                <span>Founder and developer</span>
                <p>5 years+ experience in web design</p>
                <div class="social">
									<a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact Us</h2>
          <p>For any enquiries, you can head to our office shown below or contact us using the form below.</p>
        </div>

        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>7-27, Suria KLCC, 50088 Kuala Lumpur </p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>tetratheos@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+60 12 230 9882</p>
              </div>
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d497.97001782059016!2d101.71199310858931!3d3.1578176320706537!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31cc37d6ceda4693%3A0x3ce3a5200bf4dc66!2zM8KwMDknMjguMCJOIDEwMcKwNDInNDMuMyJF!5e0!3m2!1sen!2smy!4v1634209908123!5m2!1sen!2smy" frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
            </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch">
            <form class="php-email-form">
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Your Name</label>
                  <input type="text" name="name" class="form-control" id="name" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="name">Your Email</label>
                  <input type="email" class="form-control" name="email" id="email" required>
                </div>
              </div>
              <div class="form-group">
                <label for="name">Subject</label>
                <input type="text" class="form-control" name="subject" id="subject" required>
              </div>
              <div class="form-group">
                <label for="name">Message</label>
                <textarea class="form-control" name="message" rows="10" required></textarea>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

<?php include "include/footer.php"; ?>

  <!-- <div id="preloader"></div> -->
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>


</body>

</html>
