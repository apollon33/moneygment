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

//last 3 txns
$sqllastthree = mysqli_query($conn,"SELECT * FROM ".$stable." ORDER BY id DESC LIMIT 3");

    if($count !== "0"){
        while($row = mysqli_fetch_array($currbal)){
            $_SESSION["sbal"] = $row['bal'];
            echo '
            <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body" style="text-align: center">
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

    echo '
    <div class="container">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class="card card-signin my-5">
                            <div class="card-body" style="text-align: center">
                                <h5 class="card-title text-center">Last 3 transactions:</h5>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td class="text-center">Transaction #</td>
                                            <td class="text-center">Notes</td>
    ';
    while($rowb = mysqli_fetch_assoc($sqllastthree)) {
        $db_refno = $rowb["refno"];
        $db_notes = $rowb["notes"];
        echo '
            <tr>
                <td class="text-muted">'.$db_refno.'</td>
                <td class="text-muted">'.$db_notes.'</td>
            </tr>
        ';
    }
        echo '
                                            </tr>
                                            </table>
                                        <a href="history.php" class="btn btn-success">See full history...</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            ';
    

?>
<title>Home | Moneygment</title>


