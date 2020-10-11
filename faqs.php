<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nonav.php");


echo '
    <div class="container text-center pt-3">
        <img class="img-fluid" src="img/faq.png"  style="width:10%;">
    </div>
    ';
?>
<title>FAQs | Moneygment</title>

<div class="container ">
    <div class="row">
        <div class="mx-auto">
            <div class="my-5">
                <div class="card-body" >
                    <h5 class="card-title text-center">All you need to know. At one place.</h5>
                        <ul>
                            <li>
                            <strong>What is Moneygment?</strong><br>
                            - Moneygment is simply for cashflow monitoring. With Moneygment you can track where your money goes.
                            </li><br>
							
							<li>
                            <strong>Why should I use Moneygment?</strong><br>
                            - Whenever you need to track your expenses/incomes, Moneygment is the right choice for you.
                            </li><br>
							
							<li>
                            <strong>How do I access Moneygment Online?</strong><br>
                            - Visit www.moneygment.xyz and click on Login. Just fill in your online username and password.
                            </li><br>

                            <li>
                            <strong>What features are available in Moneygment Online?</strong><br>
                            -Add Income/Exprense. View recent records and more.
                            </li><br>

                            <li>
                            <strong>How do I update my details?</strong><br>
                            -Click on picture > Profile. Fillin the details to be updated and enter your current password then click 'Update'.
                            </li><br>


                            <li>
                            <strong>I forgot to logout my account?</strong><br>
                            -Don't worry. System will automatically logs you out after 15mins of inactivity.
                            </li><br>
							
							<li>
                            <strong>I still have questions, what should I do?</strong><br>
                            -If you still have questions regarding our services don't hesitate to <a class="text-dark text-decoration-none" href="contactus.php">Contact Us</a>.
                            </li>

                        </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php");?>