<?php
include("headers.php");
?>
<title>Moneygment Session Expired</title>
<div class="container text-center pt-3">
    <img class="img-fluid" src="img/logo2.png"  style="width:10%;">
</div>

<div class="container ">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body " >
                    <h5 class="card-title text-center"><strong>Moneygment</strong></h5>
                    <div class='dropdown-divider'></div>
                    <p>Your session has expired. Please <a href="login.php">click here</a> to log in again.</p>
                    <p class="small text-muted">(For security purposes, you have been logged out to prevent unauthorized access to your Moneygment Online account.)</p>
                    <div class="col footer-copyright text-right py-3 small text-muted"><small>Copyright &copy; <?php echo date("Y");?> Moneygment</small></div>
                </div>
            </div>
        </div>
    </div>
</div>