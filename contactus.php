<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nonav.php");


?>
<title>Contact Us | Moneygment</title>

<div class="container text-center pt-3">
	<img class="img-fluid" src="img/contactus.png"  style="width:10%;">
</div>
<div class="container pt-3 ">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto border border-dark rounded p-3">
        <form class="form-signin" action="https://formspree.io/mvovpokv" method="POST">
            <p class="small">Do you have any questions or comments? Don't hesitate to contact us! Fill out the form below and get a response within 24 hours.</p>

            <div class="form-group">
            <input type="hidden" value="<?php echo $_SESSION['semail'];?>" name="_replyto" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" required autofocus>
            </div>

            <div class="form-group">
            <textarea name="message" class="form-control" placeholder="Your message here..." required></textarea>
            </div>
            <button class="btn btn-lg btn-warning btn-block" type="submit">Send</button>
        </form>
    </div>
</div>
<?php include("footer.php");?>

