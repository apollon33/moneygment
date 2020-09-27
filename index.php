<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");

$stable = $_SESSION["stable"];

if(!isset($_SESSION['susername']) || empty($_SESSION['spassword'])){
	header("location: login.php");
}
//fetching current bal
$currbal = mysqli_query($conn, "SELECT * FROM $stable WHERE id=(SELECT max(id) FROM $stable)");
$count = mysqli_num_rows($currbal);
    if($count !== "0"){
        while($row = mysqli_fetch_array($currbal)){
            $_SESSION["sbal"] = $row['bal'];
            echo '
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body">
                                <h5 class="card-title text-center">Current Balance:</h5>
                                    <div class="form-label-group">
                                        <h1>'. $_SESSION["sbal"] .'</h1>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                ';
        }
    }

?>


