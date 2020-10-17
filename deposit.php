<?php
//date_default_timezone_set('Asia/Manila');
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");
include("redirect.php");


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
        <div class="container p-3">
            <div class="text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-danger alert-dismissible fade show" role="alert"">
                <i class="fa fa-ban"></i> Please enter a valid amount.
            </div>
        </div>
        '; 
    }else{
        $sql = mysqli_query($conn,"INSERT INTO $stable(refno,debit,credit,bal,notes,date_time,categ) VALUES('$deposit','0','$amount','$newbal','$notes',now(),'$categ')");    
        echo '
            <div class="container p-3">
                <div class="text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle"></i> Youve added '.$amount.' from '.$categ.' New Balance: '.$newbal.'.
                </div> 
            </div>       
            ';
        include("refresh_bal.php");
    }
}

?>
<title>Income | Moneygment</title>
<div class="container p-3">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin">
                <div class="card-body">
                    <h5 class="card-title text-center">Income</h5>
                    <div class='dropdown-divider'></div>
                    <p class="text-muted small text-center">Money received, especially on a regular basis, for work or through investments.</p>

                    <form class="form-signin was-validated" method="post" action="deposit.php">
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

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="deposit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php");?>