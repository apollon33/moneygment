<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");

if(!isset($_SESSION['susername']) || empty($_SESSION['spassword'])){
	header("location: login.php");
}

$amount = $_POST["amount"];
$categ = $_POST["categ"];
$notes = $_POST["notes"];
$bal = $_SESSION["sbal"];
$newbal = $_SESSION["sbal"] - $amount;
$_SESSION["sbal"] = $newbal;
$stable = $_SESSION["stable"];
$withraw = "WIT" . date("mdyhis");


if(isset($_POST['withraw'])){
    if($amount == 0){
        echo '
        <div class="container pt-3">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class=" text-center alert alert-danger">
                        Please enter valid amount.
                    </div>
                </div>
            </div>
        </div>
        '; 
    }else{
        if($bal == 0){
            echo '
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <div class=" text-center alert alert-danger">
                                0 Balance.
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }elseif($bal < $amount){
            echo '
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <div class=" text-center alert alert-danger">
                                <strong>Insufficient Funds.</strong> <br>Spent: '.$amount.' for '.$categ.'<br> Available Balance: '.$bal.'.
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }else{
            $sql = mysqli_query($conn,"INSERT INTO $stable(refno,debit,credit,bal,notes,date_time,categ) VALUES('$withraw','$amount','0','$newbal','$notes',now(),'$categ')");    
            echo '
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <div class=" text-center alert alert-danger">
                                <strong>Thank you!</strong> <br>Spent: '.$amount.' for '.$categ.'<br> New Balance: '.$newbal.'.
                            </div> 
                        </div> 
                    </div> 
                </div>   
            ';
        }
    }
}

?>
<title>Withraw | Moneygment</title>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Expense</h5>

                    <form class="form-signin" method="post" action="withraw.php">
                        <div class="form-label-group">
                            <input type="text" id="inputAmount" class="form-control" placeholder="Amount" name="amount" value="<?php echo $amount;?>" required autofocus>
                            <label for="inputAmount">Amount</label>
                        </div>

                        <div class="form-label-group">
                            <select name="categ" class="form-control">
                                <option value="Food">Food</option>
                                <option value="Transportation">Transportation</option>
                                <option value="Entertainment">Entertainment</option>
                                <option value="Gifts">Gifts</option>
                            </select>
                            <label for="inputCateg">Category</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="inputNotes" value="EXPENSE" class="form-control" placeholder="Notes" name="notes" required autofocus>
                            <label for="inputNotes">Notes</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="withraw">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php");?>
