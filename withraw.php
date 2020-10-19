<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");
include("redirect.php");

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
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-ban"></i> Please enter valid amount.
            </div>
        '; 
    }else{
        if($bal == 0){
            echo '
                <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                    <i class="fa fa-ban"></i> 0 Balance.
                </div>
                ';
        }elseif($bal < $amount){
            echo '
                <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                    <i class="fa fa-ban"></i> Insufficient Funds.
                </div>
                ';
        }else{
            $sql = mysqli_query($conn,"INSERT INTO $stable(refno,debit,credit,bal,notes,date_time,categ) VALUES('$withraw','$amount','0','$newbal','$notes',now(),'$categ')");    
            echo '
                <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                    <i class="fa fa-check-circle"></i> Youve spent: '.$amount.' for '.$categ.'
                </div>
            ';
            include("refresh_bal.php");
        }
    }
}

?>
<title>Withraw | Moneygment</title>
<div class="container p-3">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin">
                <div class="card-body">
                    <h5 class="card-title text-center">Expense</h5>
                    <div class='dropdown-divider'></div>
                    <p class=" rounded small text-center text-muted">The cost required for something; the money spent on something.</p>

                    <form class="form-signin was-validated" method="post" action="withraw.php">
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

                        <button class="rounded-pill btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="withraw">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include("footer.php");?>
