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
$notes = $_POST["notes"];
$categ = $_POST["categ"];
$newbal = $_SESSION["sbal"] + $amount;
$_SESSION["sbal"] = $newbal;
$stable = $_SESSION["stable"];
$deposit = "DEP" . date("mdyhis");


if(isset($_POST['deposit'])){
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
        $sql = mysqli_query($conn,"INSERT INTO $stable(refno,debit,credit,bal,notes,date_time,categ) VALUES('$deposit','0','$amount','$newbal','$notes',now(),'$categ')");    
        echo '
            <div class="container pt-3">
                <div class="text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Thank you!</strong> <br>Deposited: '.$amount.' from '.$categ.'<br> New Balance: '.$newbal.'.
                </div> 
            </div>       
            ';
    }
}

?>
<title>Income | Moneygment</title>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Income</h5>

                    <form class="form-signin" method="post" action="deposit.php">
                        <div class="form-label-group">
                            <input type="text" id="inputAmount" value="<?php echo $amount;?>" class="form-control" placeholder="Amount" name="amount" required autofocus>
                            <label for="inputAmount">Amount</label>
                        </div>

                        <div class="form-label-group">
                            <select name="categ" class="form-control">
                                <option value="Salary">Salary</option>
                                <option value="Others">Others</option>
                            </select>
                            <label for="inputCateg">Category</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="inputNotes" class="form-control" placeholder="Notes" value ="INCOME" name="notes" required autofocus>
                            <label for="inputNotes">Notes</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="deposit">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php");?>