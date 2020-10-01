<?php
session_start();
include("noerror.php");
include("conn.php");
include("nav.php");
include("headers.php");

if(!isset($_SESSION['susername']) || empty($_SESSION['spassword'])){
	header("location: login.php");
}

echo '
    <div class="container text-center pt-3">
        <img class="img-fluid" src="img/faq.png"  style="width:10%;">
    </div>
    ';
?>
<title>FAQs | Moneygment</title>

<div class="container ">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body" >
                    <h5 class="card-title text-center">Frequently Asked Questions</h5>
                        <ul>
                            <li>
                            <strong>How do I access Moneygment Online?</strong><br>
                            - Visit www.moneygment.xyz and click on Login. Just fill in your online username and password.
                            </li><br>

                            <li>
                            <strong>What features are available in Moneygment Online?</strong><br>
                            -Income/Exprense Transactions / Transfer funds to other users. / View your transaction history and more.
                            </li><br>

                            <li>
                            <strong>How do I update my details?</strong><br>
                            -Click on picture > Profile. Fillin the details to be updated then click 'Update'.
                            </li><br>

                            <li>
                            <strong>When will the amount be credited to others user's account?</strong><br>
                            -The amount is credited in real time.
                            </li>

                            <li>
                            <strong>I forgot to logout my account?</strong><br>
                            -Don't worry. System will automatically logs you out after 15mins of inactivity.
                            </li>

                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php");?>