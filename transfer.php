<?php
session_start();
include("noerror.php");
include("headers.php");
include("nav.php");

if(!isset($_SESSION['susername']) || empty($_SESSION['spassword'])){
	header("location: login.php");
}

$bal = $_SESSION["sbal"];
$notes = $_POST["notes"];
$reciever = $_POST["username"];
$recipients = "tbl" . $_POST["username"];
$amount = $_POST["amount"];
$stable = $_SESSION["stable"];


if(isset($_POST['transfer'])){
//fetching recipients bal
$sql = mysqli_query($conn, "SELECT * FROM $recipients WHERE id=(SELECT max(id) FROM $recipients)");
$count = mysqli_num_rows($sql);
    if($count !== "0"){
        while($row = mysqli_fetch_array($sql)){
            $recipientsbal = $row['bal'];
        }
	}
	
	$recipientsnewbal = $recipientsbal + $amount;
	$_SESSION["sbal"] = $_SESSION["sbal"] - $amount;
	$mynewbal = $_SESSION["sbal"];

	$transfertxn = "TRA" . date("mdyhis");
	$udpaterecipients = mysqli_query($conn,"INSERT INTO $recipients(refno,debit,credit,bal,notes) VALUES('$transfertxn','0','$amount','$recipientsnewbal','$notes')");
	$udpatemybal = mysqli_query($conn,"INSERT INTO $stable(refno,debit,credit,bal,notes) VALUES('$transfertxn','$amount','0','$mynewbal','$notes')");
	
	echo '
		<div class="container pt-3">
			<div class="text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-success alert-dismissible fade show" role="alert">
				<strong>Success!</strong> <br>Transferred: '.$amount.' to '.$reciever.'<br> New Balance: '.$mynewbal.'.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
			</div> 
		</div>
		';
}


?>
<title>Transfer | Moneygment</title>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Transfer</h5>

                    <form class="form-signin" method="post" action="transfer.php">
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus>
                            <label for="inputUsername">Username</label>
						</div>
						
						<div class="form-label-group">
                            <input type="text" id="inputAmount" class="form-control" placeholder="Amount" name="amount" >
                            <label for="inputAmount">Amount</label>
						</div>
						
						<div class="form-label-group">
                            <input type="text" id="inputNotes" value="TRANSFER" class="form-control" placeholder="Notes" name="notes" >
                            <label for="inputNotes">Notes</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="transfer">Transfer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>