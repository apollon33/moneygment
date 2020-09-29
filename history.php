<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");

if(!isset($_SESSION['susername']) || empty($_SESSION['spassword'])){
	header("location: login.php");
}

$stable = $_SESSION["stable"];

$sql = mysqli_query($conn, "SELECT * FROM $stable ORDER BY id DESC");
echo "
    <div class='container text-center pt-3 pb-3'>
        <h5>Transaction History</h5>
    </div>
        <div class='container pb-3'>
            <table id='dtBasicExample' class='table table-striped table-bordered ' >
                <thead>
                    <tr>
                        <th ><b>Ref. No.</b></th>
                        <th ><b>Debit</b></th>
                        <th ><b>Credit</b></th>
                        <th><b>Balance</b></th>
                        <th ><b>Notes</b></th>
                    </tr>
                </thead>
    ";

while($row = mysqli_fetch_assoc($sql)) {
    $db_refno = $row["refno"];
    $db_debit = $row["debit"];
    $db_credit = $row["credit"];
    $db_bal = $row["bal"];
    $db_notes = $row["notes"];
echo "
        <tr>
            <td>$db_refno</td> 
            <td>$db_debit</td>
            <td>$db_credit</td>
            <td>$db_bal</td>
            <td>$db_notes</td>
        </tr>
    ";
}


echo "
    </table>
    </div>
    ";

?>
<title>Transaction History | Moneygment</title>