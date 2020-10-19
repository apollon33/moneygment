<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");
include("redirect.php");

$amount = $_POST["amount"];
$percent = $_POST["percent"] / 100;
$days = $_POST["days"];
$interest = $amount * $percent * $days / 30;
$topay = $amount + $interest;

?>
<title>Loan Calculator | Moneygment</title>

<center>
    <div class="container bg-white p-3 m-3 rounded shadow">
            <div class="container text-center">
                <h5>Loan Calculator</h5>
                <div class='dropdown-divider'></div>
                <p class="text-muted small">Predict how much a personal loan will cost you as you pay it back every month.</p>
            </div>

            <div class="container text-center border border-dark p-3 mb-2 mt-3 rounded">
                <div class="row">
                    <div class="col-sm">     
                        
                        <form class="form-signin was-validated" method="post" action="loancalc.php">
                            <div class="form-label-group">
                                <input type="text" id="inputUsername" class="form-control" value="<?php echo $amount;?>" name="amount" required autofocus>
                                <label for="inputEmail">Amount Borrowed</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="inputPassword" class="form-control" value="<?php echo $percent;?>" name="percent" required>
                                <label for="inputPassword">Percent</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="inputPassword" class="form-control" value="<?php echo $days;?>" name="days" required>
                                <label for="inputPassword"># of days borrowed:</label>
                            </div>
                    </div>

                    <div class="col-sm"> 
                            <div class="form-label-group">
                                <input type="text" id="inputPassword" class="form-control" value="<?php echo $interest;?>" name="interest" readonly>
                                <label for="inputPassword">Interest</label>
                            </div>

                            <div class="form-label-group">
                                <input type="text" id="inputPassword" class="form-control" value="<?php echo $topay;?>" name="topay" readonly>
                                <label for="inputPassword">To Pay:</label>
                            </div>

                            
                            <button class="rounded-pill btn  btn-primary btn-block text-uppercase" type="submit" name="">Compute</button>
                            
                        </form>           
                    </div>
                </div>
            </div>
    </div>
</center>
<?php include("footer.php");?>
