<?php
include("headers.php");
?>
<title>Join. Monitor. Save. | Moneygment</title>




<div class="container text-center  pt-3 pb-3 ">
    <div class="row ">        
        <div class="container col-sm border-bottom border-dark">
            <img src="img/monitor.png" class="img-fluid maxwidth: 100%; height: auto;" />
            <div class="">
                <h3>Join. Monitor. Save.</h3>
            </div>
        </div>

        <div class="col-sm   border-left border-dark ">
            <div class="container">
                <div class="row">
                    <div class=" mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body text-center" >
                                <img class="img-fluid p-3" src="img/logo2.png"  style="width:40%;">
                                <h3><p p-3>See where your expenses goes</p></h3>


                                <div class="container p-3">
                                    Join Moneygment today.
                                </div>

                                <input class="btn btn-primary btn-lg btn-block" type="button" onclick="location.href='register.php';" value="Register" />
                                <input class="btn btn-outline-primary btn-lg btn-block" type="button" onclick="location.href='login.php';" value="Login" />

                                <div class="dropdown-divider mt-3 mb-3"></div>
                                    <p class="love text-center small text-muted">Made with <i class="text-danger icon ion-heart"></i> by <a class=" text-reset text-muted" target="_blank" href="http://fb.me/renzthegeek">Lorence</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer class="footer">
    <div class="container text-center">
        <div class="row">
            <div class="col footer-copyright  py-3">
                <small>
					<a class="text-reset" href="contactus.php">Contact Us</a>&nbsp;
                    <a class="text-reset" href="privacy.php">Privacy</a>&nbsp;
                    <a class="text-reset" href="faqs.php">FAQs</a>&nbsp;
                    <a class="text-reset" href="about.php">About</a>
                    Copyright &copy; <?php echo date("Y");?> Moneygment
                </small>
            </div>
        </div>
    </div>
</footer>