<?php
$sql = mysqli_query($conn, "SELECT * FROM tblusers WHERE username = '$username' AND pword = '$password'");
while ($check = mysqli_fetch_array($sql)){
    if(isset($check)){
        //store data in session
        session_start();
        $_SESSION["susername"] = $username;
        $_SESSION["spassword"] = $password;            
        $_SESSION["stable"] = $usertable;
        $_SESSION["spicture"] = $check["picture"];
        $_SESSION["semail"] = $check["email"];
        $_SESSION["sfname"] = $check["fname"];
        $_SESSION["slname"] = $check["lname"];
        $_SESSION["saccount_no"] = $check["account_no"];
        $_SESSION["sdob"] = $check["dob"];
        $_SESSION["sdate_reg"] = $check["date_reg"];
        $_SESSION["scateg"] = $check["categ"];
        $_SESSION["sstat"] = $check["stat"];
        $_SESSION["slastlogin"] = $check["lastlogin"];
        $_SESSION["slastchanged"] = $check["lastchanged"];
        $_SESSION["sgender"] = $check["gender"];
        include("saveip.php");
        
    }
}
?>