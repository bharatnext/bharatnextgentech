<footer class="footer section">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="widget">
                    <h4 class="text-capitalize mb-4">Company</h4>

                    <ul class="list-unstyled footer-menu lh-35">
                        <li><a href="terms-and-condition.php">Terms & Conditions</a></li>
                        <li><a href="privacy-policy.php">Privacy Policy</a></li>

                    </ul>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 col-sm-6">
                <div class="widget">
                    <h4 class="text-capitalize mb-4">Quick Links</h4>

                    <ul class="list-unstyled footer-menu lh-35">

                        <li><a href="index.php">Home</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <li><a href="service.php">Services</a></li>
                        <li><a href="missionvission.php">Mission & Vision</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6">
                <div class="widget">
                    <div class="logo mb-4">
                        <!-- <h3>
                            BharatNextGen<span>Tech.</span></h3> -->
                        <img src="images/bharatnextgentech.png" alt="Bharatnextgentech" class="img-fluid" width="150px">
                    </div>
                    <h6><a href="mailto:bharatnextgentech@gmail.com">bharatnextgentech@gmail.com</a></h6>
                    <a href="tel:+91 97247 36947"><span class="text-color h4">+91 97247 36947</span></a>
                </div>
            </div>
        </div>

        <div class="footer-btm pt-4">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-left">
                    <div class="copyright">
                        Copyright &copy; Designed &amp; Developed by BharatNextGenTech.
                    </div>
                </div>
                <div class="col-lg-6 text-center text-lg-right">
                    <ul class="list-inline footer-socials">
                        <li class="list-inline-item"><a href="https://www.linkedin.com/company/bharatnextgentech/"
                                target="_blank"><i class="fab fa-linkedin mr-2 "></i></a></li>
                        <li class="list-inline-item"><a href="https://www.instagram.com/bharatnextgentech/"
                                target="_blank"><i class="fab fa-instagram mr-2"></i></a></li>
                        <li class="list-inline-item"><a href="https://www.facebook.com/profile.php?id=61569310418439"
                                target="_blank"><i class="fab fa-facebook-f mr-2"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!--Scroll to top-->
<div id="scroll-to-top" class="scroll-to-top">
    <span class="icon fa fa-angle-up"></span>
</div>

<!-- model of contact us  -->





<!-- Modal -->
<div class="modal " id="contactModel" tabindex="-1" aria-labelledby="contactModelLabel" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title" id="staticBackdropLabel">Contact Us</h1>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row justify-content-around">

                        <form class="row g-3" id="contactForm">
                            <div class="col-12">
                                <label for="Name"></label>
                                <input type="text" class="form-control" id="name1" placeholder="Your Name">
                            </div>
                            <div class="col-12 mt-1 m-auto">
                                <label for="mobile"></label>
                                <input type="number" class="form-control" id="mobile1" required
                                    placeholder=" +91 99999 00000">
                            </div>

                            <div class="col-12">
                                <label for="email"></label>
                                <input type="email" class="form-control" id="email1" placeholder="E-mail (optinal)">
                            </div>
                            <div class="col-12 m-auto">
                                <label for="city"></label>
                                <input type="text" class="form-control" id="city1" placeholder="Your City">
                            </div>

                            <div class="col-12">
                                <label for="message"></label>
                                <input type="text" cols="25" rows="5" class="form-control" id="message1"
                                    placeholder="Your Message">
                            </div>

                            <div class="col-12 " id="responseMessage"></div>
                            <div class="col-12"> <button class="btn btn-main mt-4 col-12" type="button"
                                    id="submitBtn1">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // Check if the modal has already been shown during this session
        if (!sessionStorage.getItem('modalShown')) {

            var myModal = new bootstrap.Modal(document.getElementById('contactModel'));

            // Show the modal after a delay (5 seconds here)
            setTimeout(() => {
                myModal.show();

                // Store that the modal has been shown for the current session
                sessionStorage.setItem('modalShown', 'true');
            }, 8000);
        }
    });
</script>

<script>
    document.getElementById('submitBtn1').addEventListener('click', function() {
        const name = document.getElementById('name1').value.trim();
        const email = document.getElementById('email1').value.trim();
        const city = document.getElementById('city1').value.trim();
        const mobile = document.getElementById('mobile1').value.trim();
        const message = document.getElementById('message1').value.trim();

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