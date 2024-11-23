<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="zxx">


<head>

  <?php
  $meta_title = "Contact Us | BharatNextGenTech - Let's Connect";
  $meta_description = "Get in touch with BharatNextGenTech for inquiries, support, or collaborations. Reach out to our team for innovative mobile app solutions and professional guidance.";
  $meta_keywords = "contact BharatNextGenTech, get in touch, mobile app solutions, tech support, professional collaboration, contact details BharatNextGenTech";
  include('layouts/headscript.php');
  ?>
</head>

<body>

  <?php
  include('layouts/header.php');
  ?>

  <section class="page-title bg-1">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <span class="text-white">Contact Us</span>
            <h1 class="text-capitalize mb-4 text-lg">Get in Touch</h1>
            <ul class="list-inline">
              <li class="list-inline-item"><a href="index.php" class="text-white">Home</a></li>
              <li class="list-inline-item"><span class="text-white">/</span></li>
              <li class="list-inline-item text-white-50">Contact Us</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- contact form start -->
  <section class="contact-form-wrap section">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-12 col-sm-12 d-none">
          <form id="contact-form" class="contact__form" method="post" action="index.php">
            <h3 class="text-md mb-4">Contact Form</h3>
            <div class="form-group">
              <input name="name" type="text" class="form-control" placeholder="Your Name" required>
            </div>
            <div class="form-group">
              <input name="email" type="email" class="form-control" placeholder="Email Address" required>
            </div>
            <div class="form-group-2 mb-4">
              <textarea name="message" class="form-control" rows="4" placeholder="Your Message" required></textarea>
            </div>
            <button class="btn btn-main" name="submit" type="submit">Send Message</button>
          </form>
        </div>

        <div class="col-lg-12 col-sm-12">
          <div class="contact-content pl-lg-5 mt-5 mt-lg-0">
            <span class="text-muted">We are Professionals</span>
            <h2 class="mb-5 mt-2">Don’t Hesitate to contact with us for any kind of information</h2>

            <ul class="address-block list-unstyled">
              <li>
                <i class="ti-direction mr-3"></i>Sardar Chowk, Opp. Alfa Training Center, Chitaliya Road, Jasdan:- 360050, Rajkot, Gujarat, India
              </li>
              <li>
                <i class="ti-email mr-3"></i>Email: bharatnextgentech@gmail.com
              </li>
              <li>
                <i class="ti-mobile mr-3"></i>Phone:+91 97247 36947
              </li>
            </ul>

            <ul class="social-icons list-inline mt-5 d-none">
              <li class="list-inline-item">
                <a href="http://www.themefisher.com"><i class="fab fa-facebook-f"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="http://www.themefisher.com"><i class="fab fa-twitter"></i></a>
              </li>
              <li class="list-inline-item">
                <a href="http://www.themefisher.com"><i class="fab fa-linkedin-in"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <div class="google-map d-none">
    <div id="map" data-latitude="40.712776" data-longitude="-74.005974" data-marker="images/marker.png" data-marker-name="Megakit"></div>
  </div>

  <?php
  include('layouts/footer.php');
  include('layouts/footscript.php');

  ?>

</body>

</html>