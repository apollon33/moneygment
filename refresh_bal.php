<?php
session_start();
include("conn.php");
$usertable = $_SESSION["stable"];
$currbal = mysqli_query($conn, "SELECT * FROM $usertable WHERE id=(SELECT max(id) FROM $usertable)");
$count = mysqli_num_rows($currbal);

if($count == 0){

}else{
    while($row = mysqli_fetch_array($currbal)){
        if(isset($row)){
            $_SESSION["sbal"] = $row['bal'];
            $_SESSION["sdatetime"] = $row['date_time'];
        }
    }

    $gettotalcredit = mysqli_query($conn, "SELECT sum(credit) as tcredit FROM $usertable");
    $row= mysqli_fetch_array($gettotalcredit);
    $_SESSION["stcredit"] = $row['tcredit'];

    $gettotaldebit = mysqli_query($conn, "SELECT sum(debit) as tdebit FROM $usertable");
    $row= mysqli_fetch_array($gettotaldebit);
    $_SESSION["stdebit"] = $row['tdebit'];
}
    
?>