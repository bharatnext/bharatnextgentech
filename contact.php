<!DOCTYPE html>

<!--
 // WEBSITE: https://bharatnextgentech.com
 // TWITTER: https://twitter.com/bharatnextgentech
 // FACEBOOK: https://www.facebook.com/bharatnextgentech
 // GITHUB: https://github.com/bharatnextgentech/
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
  <section class="page-title bg-contactus">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="block text-center">
            <h1 class="text-capitalize mb-2 text-lg">Get In Touch</h1>
            <p class="con-p">Transforming businesses with innovative digital solutions at BharatNextGenTech
              <br>your partner in mobile
              apps, websites, and process digitalization
            </p>
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

  <section class="container-fluid contactus-form mt-5 ">
    <div class="container">
      <div class="row justify-content-around">
        <div class="contact-detail col-12 col-lg-4 pt-4 px-5 ">
          <div class="mb-5">
            <h5 class="mt-5">Contact Information</h5>
          </div>

          <a href="tel:+91 97247 36947">
            <div class="info-call d-flex">
              <p><i class="fa-solid fa-phone"></i></p>
              <p>+91 97247 36947</p>
            </div>
          </a>

          <a href="mailto:bharatnextgentech@gmail.com">
            <div class="info-call d-flex">
              <p><i class="fa-regular fa-envelope"></i></p>
              <p>bharatnextgentech@gmail.com</p>
            </div>
          </a>

          <a href="https://maps.app.goo.gl/oAkkK5PGrjpPjjpi7" target="_blank">
            <div class="info-call d-flex">
              <p><i class="fa-solid fa-location-dot"></i></p>
              <p>Sardar Chowk, <br> Opp. Alfa Training Center, <br> Chitaliya Road, <br>Jasadan 360050, <br>Rajkot,
                Gujarat,India</p>
            </div>
          </a>
          <div class="contact-shape"></div>
        </div>
        <div class="contact-form col-12 col-lg-6 shadow-lg p-3 my-5">
          <form class="row g-3 mt-4" id="contactForm">
            <div class="col-12">
              <label for="Name"></label>
              <input type="text" class="form-control" id="name" placeholder="Your Name">
            </div>


            <div class="col-12 mt-2 m-auto">
              <label for="mobile"></label>
              <input type="number" class="form-control" id="mobile" required placeholder=" +91 99999 00000">
            </div>

            <div class="col-12">
              <label for="email"></label>
              <input type="email" class="form-control" id="email" placeholder="E-mail (optinal)">
            </div>
            <div class="col-12 m-auto">
              <label for="city"></label>
              <input type="text" class="form-control" id="city" placeholder="Your City">
            </div>

            <div class="col-12">
              <label for="message"></label>
              <input type="text" cols="25" rows="5" class="form-control" id="message"
                placeholder="Your Message">
            </div>

            <div class="col-12 " id="responseMessage"></div>
            <div class="col-12"> <button class="btn btn-primary mt-4 col-12" type="button" id="submitBtn">Submit</button>


            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php
  include('layouts/footer.php');
  include('layouts/footscript.php');

  ?>

  <script>
    document.getElementById('submitBtn').addEventListener('click', function() {
      const name = document.getElementById('name').value.trim();
      const email = document.getElementById('email').value.trim();
      const city = document.getElementById('city').value.trim();
      const mobile = document.getElementById('mobile').value.trim();
      const message = document.getElementById('message').value.trim();

      // Basic validation
      if (!name || !mobile) {
        document.getElementById('responseMessage').innerHTML =
          '<div class="alert alert-danger">All fields are required!</div>';
        return;
      }

      // Send AJAX request
      fetch('api/contact_us_handler.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({
            name,
            mobile,
            email,
            city,
            message
          })
        })
        .then(response => response.json())
        .then(data => {
          if (data.status === 'success') {
            document.getElementById('responseMessage').innerHTML =
              '<div class="alert alert-success">' + data.message + '</div>';
            document.getElementById('contactForm').reset();
          } else {
            document.getElementById('responseMessage').innerHTML =
              '<div class="alert alert-danger">' + data.message + '</div>';
          }
        })
        .catch(error => {
          document.getElementById('responseMessage').innerHTML =
            '<div class="alert alert-danger">Something went wrong. Please try again later.</div>';
        });
    });
  </script>
</body>

</html>