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
                    <div class='dropdown-divider'></div>
                        <details>
                            <summary><strong>What is Moneygment?</strong></summary>
                            <p>Moneygment is simply for cashflow monitoring. With Moneygment you can track where your money goes.</p>
                        </details>

                        <details>
                            <summary><strong>Why should I use Moneygment?</strong></summary>
                            <p>Whenever you need to track your expenses/incomes, Moneygment is the right choice for you.</p>
                        </details>

                        <details>
                            <summary><strong>How do I access Moneygment Online?</strong></summary>
                            <p>Visit www.moneygment.xyz and click on Login. Just fill in your online username and password.</p>
                        </details>

                        <details>
                            <summary><strong>What features are available in Moneygment Online?</strong></summary>
                            <p>Add Income/Exprense. View recent records and more.</p>
                        </details>

                        <details>
                            <summary><strong>How do I update my details?</strong></summary>
                            <p>Click on picture > Profile. Fillin the details to be updated and enter your current password then click 'Update'.</p>
                        </details>

                        <details>
                            <summary><strong>I forgot to logout my account?</strong></summary>
                            <p>Don't worry. System will automatically logs you out after 15mins of inactivity.</p>
                        </details>

                        <details>
                            <summary><strong>I still have questions, what should I do?</strong></summary>
                            <p>If you still have questions regarding our services don't hesitate to <a class="text-dark text-decoration-none" href="contactus.php">Contact Us</a>.</p>
                        </details>
                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php");?>