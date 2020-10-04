<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nonav.php");


echo '
    <div class="container text-center pt-3">
        <img class="img-fluid" src="img/about.png"  style="width:10%;">
    </div>
    ';
?>
<title>FAQs | Moneygment</title>

<div class="container ">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body" >
                    <h5 class="card-title text-center">About <strong>Moneygment</strong></h5>
                    <p class="text-justify">
                        "Money Saved is Money Earned". Moneygment's mission is to teach people of all ages how financial systems work, and how to take advantage of these systems to save big money. Everyone could use more money, but in reality there are only two basic ways to increase your cash flow: increase your income or decrease your spending.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php");?>