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
    <div class="container text-center  p-0  ">
        <div class="p-3 container" >
            <h2>Dashboard</h2>
        </div>
        <div class="row " >
                <div class="col-sm   p-2 m-2 bg-white rounded shadow ">
                    <p class="text-left ">Balance</p>
                    <div class='dropdown-divider'></div>
                    <h1 ><strong><?php echo $_SESSION["sbal"];?></strong></h1>
                    <p class="text-right small  mb-0 align">as of <?php echo $_SESSION["sdatetime"];?></p>
                </div>

                <div class="col-sm bg-warning p-2 m-2 bg-white rounded shadow">
                    <div class="container ">
                        <p class="text-left">Total</p>
                        <div class='dropdown-divider'></div>
                        <p>Income: <?php echo $_SESSION["stcredit"];?></p>
                        <p>Expense: <?php echo $_SESSION["stdebit"];?></p>
                    </div>
                </div>

            
                <div class="col-sm bg-warning p-2 m-2 bg-white rounded shadow">
                    <p class="text-left">Last Records</p>
                    <div class='dropdown-divider'></div>
                    <table class="table table-bordered  table-striped table-hover  ">
                        <tr class="table-primary">
                            <td class="text-center">Date/Time</td>
                            <td class="text-center">Expense</td>
                            <td class="text-center">Income</td>

                        </tr>

                        <?php
                            //last 3 txns
                            $sqllastthree = mysqli_query($conn,"SELECT * FROM ".$stable." ORDER BY id DESC LIMIT 3");
                            while($rowb = mysqli_fetch_assoc($sqllastthree)) {
                                $db_datetime = $rowb["date_time"];
                                $db_debit = $rowb["debit"];
                                $db_credit = $rowb["credit"];
                                echo '
                                    <tr class="small">
                                        <td class="text-muted">'.$db_datetime.'</td>
                                        <td class="text-muted">'.$db_debit.'</td>
                                        <td class="text-muted">'.$db_credit.'</td>
                                    </tr>                            
                                ';
                            }
                        ?>            
                    </table>
                </div>
        </div>
    </div>

    



<?php include("footer.php");?>


