<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");
include("redirect.php");

$stable = $_SESSION["stable"];
?>
<title>Home | Moneygment</title>

<div class="container">
    <div class="container text-center border border-dark p-3 mb-2 mt-3 rounded">
        <div class="row">
            <div class="col-sm">                
                <strong class="lead "><?php echo ucfirst($messages_from_file[$key]);?></strong>
                <p class="text-right small text-muted m-0"><a class="text-decoration-none text-muted" href="#">Add quotes</a></p>
            </div>
        </div>
    </div>

    <div class="container text-center  p-0  ">
        <div class="row p-3">
                <div class="col-sm bg-success p-3  border border-dark rounded">
                    <h5 class="card-title text-center">Current Balance:</h5>
                    <h1 ><strong><?php echo $_SESSION["sbal"];?></strong></h1>
                    <p class="text-right small  mb-0">as of <?php echo $_SESSION["sdatetime"];?></p>
                </div>

                <div class="col">
            
                <div class="col-sm bg-warning p-3 border border-dark rounded col-auto">
                    <table class="table table-bordered  table-striped table-hover  ">
                        <tr class="table-primary">
                            <td class="text-center">Transaction #</td>
                            <td class="text-center">Date/Time</td>
                            <td class="text-center">Category</td>
                        </tr>

                        <?php
                            //last 3 txns
                            $sqllastthree = mysqli_query($conn,"SELECT * FROM ".$stable." ORDER BY id DESC LIMIT 3");
                            while($rowb = mysqli_fetch_assoc($sqllastthree)) {
                                $db_refno = $rowb["refno"];
                                $db_datetime = $rowb["date_time"];
                                $db_categ = $rowb["categ"];
                                echo '
                                    <tr class="small">
                                        <td class="text-muted">'.$db_refno.'</td>
                                        <td class="text-muted">'.$db_datetime.'</td>
                                        <td class="text-muted">'.$db_categ.'</td>
                                    </tr>                            
                                ';
                            }
                        ?>            
                    </table>
                    <a href="history.php" class="btn btn-outline-success">See full history...</a>
                </div>
        </div>
    </div>


<?php include("footer.php");?>
