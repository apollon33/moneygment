<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");
include("redirect.php");

      

$stable = $_SESSION["stable"];

$amount = $_POST['amount'];
$notes = $_POST['notes'];
$depref = "DEP" . date("mdyhis");
$witref = "WIT" . date("mdyhis");
$depnewbal = $_SESSION["sbal"] + $amount;
$witnewbal = $_SESSION["sbal"] - $amount;
$categ = "Others";
$bal = $_SESSION["sbal"];

if(isset($_POST['btnIncome'])){
    if($amount == 0){
        echo '
        <div class="container p-3">
            <div class="text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-danger alert-dismissible fade show" role="alert"">
                <i class="fa fa-ban"></i> Please enter a valid amount.
            </div>
        </div>
        '; 
    }else{
        $sqlIncome = mysqli_query($conn, "INSERT INTO $stable(refno,debit,credit,bal,notes,date_time,categ) VALUES('$depref','0','$amount','$depnewbal','$notes',now(),'$categ') ");
        include("refresh_bal.php");
        echo '
            <div class="container p-3">
                <div class="text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-success alert-dismissible fade show" role="alert">
                    <i class="fa fa-check-circle"></i> Youve added '.$amount.' from '.$categ.'. New Balance: '.$depnewbal.'.
                </div> 
            </div>       
            ';
        
    }
    
}

if(isset($_POST['btnExpense'])){
    if($amount == 0){
        echo '
        <div class="container pt-3">
            <div class="row">
                <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                    <div class=" text-center alert alert-danger">
                        <i class="fa fa-ban"></i> Please enter valid amount.
                    </div>
                </div>
            </div>
        </div>
        '; 
    }else{
        if($bal == 0){
            echo '
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <div class=" text-center alert alert-danger">
                                <i class="fa fa-ban"></i> 0 Balance.
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }elseif($bal < $amount){
            echo '
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <div class=" text-center alert alert-warning">
                                <i class="fa fa-ban"></i> Insufficient Funds. Available Balance is '.$bal.'.
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }else{
            $sqlExpense = mysqli_query($conn, "INSERT INTO $stable(refno,debit,credit,bal,notes,date_time,categ) VALUES('$witref','$amount','0','$witnewbal','$notes',now(),'$categ') ");
            include("refresh_bal.php");
            echo '
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <div class=" text-center alert alert-danger">
                                <i class="fa fa-check-circle"></i> Youve spent: '.$amount.' for '.$categ.'. New Balance: '.$witnewbal.'.
                            </div> 
                        </div> 
                    </div> 
                </div>   
            ';
            
        }
    }
    
}
?>
<title>Home | Moneygment</title>



<div class="container">
    <div class="container text-center  p-3  ">
        <div class="p-3 container" >
            <h5>Dashboard</h5>
            <div class='dropdown-divider'></div>
        </div>

        <div class="row m-2 bg-white rounded shadow p-2 align-self-center ">
            <form class="form-inline " method="post"  action="home.php">
                <div class="form-group mb-2">
                    <label class="mr-2">What's your trasaction today?</label>
                </div>
                <div class="form-group mb-2">
                    <label for="staticEmail2" class="sr-only">Amount</label>
                    <input type="text"  class="form-control" id="staticEmail2" name="amount" placeholder="Amount" value="<?php echo $_POST['amount'];?>" required>
                </div>
                
                <div class="form-group mx-sm-3 mb-2 mr-2">
                    <label for="inputPassword2" class="sr-only">Notes</label>
                    <input type="text" class="form-control" id="inputPassword2" name="notes" value="<?php echo $_POST['notes'];?>" placeholder="Notes" required>
                </div>

                <button type="submit" name="btnIncome" class="btn btn-success mr-2 mb-2"><i class="fa fa-plus-square"></i> Income</button>
                <button type="submit" name="btnExpense" class="btn btn-danger mb-2"><i class="fa fa-minus-square"></i> Expense</button>
            </form>
        </div>

        <div class="row " >
                <div class="col-sm   p-2 m-2 bg-white rounded shadow ">
                    <p class="text-left ">Balance</p>
                    <div class='dropdown-divider'></div>
                    <h1 ><strong><?php echo $_SESSION["sbal"];?></strong></h1>
                    <p class="text-right small  mb-0 align">as of <?php echo $_SESSION["sdatetime"];?></p>
                </div>

                <div class="col-sm bg-warning p-2 m-2 bg-white rounded shadow">
                    <p class="text-left">Total</p>
                    <div class='dropdown-divider'></div>
                    <p><i class="fa fa-arrow-left text-success"></i> Income: <?php echo $_SESSION["stcredit"];?></p>
                    <p><i class="fa fa-arrow-right text-danger"></i> Expense: <?php echo $_SESSION["stdebit"];?></p>
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

    


