<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");

if(!isset($_SESSION['susername']) || empty($_SESSION['spassword'])){
	header("location: login.php");
}

$picture = $_SESSION["spicture"];
$username = $_SESSION["susername"];
echo '
    <div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body " style="text-align: center">
                    <h5 class="card-title text-center">Profile</h5>
                    <img class="rounded-circle" src="'.$picture.'" alt="John" style="width:30%">
                    <h1>'.$username.'</h1>
                    <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="deposit">Update</button>
                </div>
            </div>
        </div>
    </div>
    </div>
    ';
?>
<title>Profile | Moneygment</title>

