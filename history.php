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
    <table class='table table-bordered'>
        <tr>
            <td align='center'><b>Ref. No.</b></td>
            <td align='center'><b>Debit</b></td>
            <td align='center'><b>Credit</b></td>
            <td align='center'><b>Balance</b></td>
            <td align='center'><b>Notes</b></td>
        </tr>
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
    ";

?>
<title>Transaction History | Moneygment</title>