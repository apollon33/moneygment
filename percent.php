<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");
include("redirect.php");

if(isset($_POST['btnPart'])){
    $whole = $_POST["whole"];
    $percent = $_POST["percent"];
    $part = $whole * ($percent / 100);
}

if(isset($_POST['btnPercent'])){
    $partb = $_POST["partb"];
    $wholeb = $_POST["wholeb"];
    $percentb = round(($partb / $wholeb) * 100, 2) . '%';
}
?>
<title>Percentage | Moneygment</title>

<center>
<div class="container p-3 m-3 text-center rounded shadow bg-white">
    <div class="container text-center pt-3">
        <h5>Percentage Calculator</h5>    
        <div class='dropdown-divider'></div>
        <p class="small text-muted">Tool to calculate percentages.</p>
    </div>
        <div class="row">
            <div class="col-sm m-3">
                <h5>Part</h5>   
                <form method="post" action="percent.php" >
                <div class="form-group">
                    <label for="formGroupExampleInput">Whole</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Whole" name="whole" value="<?php echo $whole;?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Percent</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Percent" name="percent" value="<?php echo $percent;?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Part</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Part" name="part" value="<?php echo $part;?>" readonly>
                </div>
                <button name="btnPart" type="submit" class="rounded-pill btn btn-primary">Compute</button> 
                </form>
            </div>

            

            <div class="col-sm m-3">
                <h5>Percent</h5>
                <form method="post" action="percent.php" >
                <div class="form-group">
                    <label for="formGroupExampleInput">Part</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Part" name="partb" value="<?php echo $partb;?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Whole</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Whole" name="wholeb" value="<?php echo $wholeb;?>" required>
                </div>

                <div class="form-group">
                    <label for="formGroupExampleInput">Percent</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Percent" name="percentb" value="<?php echo $percentb;?>" readonly>
                </div>
                <button name="btnPercent" type="submit" class="rounded-pill btn btn-primary">Compute</button> 
                </form>
            </div>
        </div>        
    </div>
</div>
</center>
</div>