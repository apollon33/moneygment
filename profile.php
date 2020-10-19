<?php

session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");
include("redirect.php");



$picture = $_POST["picture"];
$oldpword = $_SESSION["spassword"];
$username = $_SESSION["susername"];
$enterpword = hash('sha256', $_POST["enterpword"]);
$picture = $_POST["picture"];
$email = $_POST["email"];
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$dob = $_POST["dob"];
$status = $_POST["status"];
$newpic = $_POST["picture"];
$usertable = $_SESSION["stable"];
$gender = $_SESSION["sgender"];
$lastchanged = $_SESSION["slastchanged"];
$lastchange = date('D M j G:i:s T Y');

$refno = "RES" . date("mdyhis");



if(isset($_POST['btnChangePw'])){
    $currentpword= hash('sha256', $_POST["currentpword"]);
    $newpword= hash('sha256', $_POST["newpword"]);
    $cnewpword= hash('sha256', $_POST["cnewpword"]);
    if($currentpword == $oldpword ){
        if(strlen($_POST["newpword"]) < 8){
            echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-ban mr-2"></i>Password must be 8chars up.
            </div>
                ';
        }elseif($_POST["newpword"] !== $_POST["cnewpword"]){
            echo '
                <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                    <i class="fa fa-info-circle"></i> Password not match.
                </div>
                ';
        }elseif($username === $_POST["newpword"]){
            echo '
                <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                    <i class="fa fa-ban"></i> Username and password must NOT be the same.
                </div>
                ';
        }else{
            //update password    
            $sqlupdatepw = mysqli_query($conn, "UPDATE tblusers SET pword='$newpword' WHERE username = '$username'");
            echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-check-circle"></i> Success! Logging you out...
            </div>

            <script> 
                window.setTimeout(function(){
                window.location.href = "login.php";
                }, 3000);
            </script>
            ';
        }
    }else{
        echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-ban mr-2"></i>Please enter your current password.
            </div>
                ';
    }
}


if(isset($_POST['update'])){
    //gender
    $male_status = 'unchecked';
    $female_status = 'unchecked';

    $selected_radio = $_POST['gender2'];
    if ($selected_radio == 'male') {
        $male_status = 'checked';
    }elseif ($selected_radio == 'female') {
        $female_status = 'checked';
    }

    if($enterpword == $oldpword ){
        //update user    
        $sql = mysqli_query($conn, "UPDATE tblusers SET fname='$fname', lname='$lname',  picture='$newpic', dob='$dob', email='$email', stat='$status', lastchanged='$lastchange', gender='$gender' WHERE username = '$username'");

        //new data
        $_SESSION["spicture"] = $picture;
        $_SESSION["semail"] = $email;
        $_SESSION["sfname"] = $fname;
        $_SESSION["slname"] = $lname;
        $_SESSION["sdob"] = $dob;
        $_SESSION["sstat"] = $stat;
        $_SESSION["sgender"] = $gender;
        $_SESSION["slastchanged"] = $lastchange;
        echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-check-circle"></i> Your profile have been updated!
            </div>
                ';  
        include("refresh_data.php");      
    }else{
        echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-ban"></i> Please enter your current password to save changes.
            </div>
            '; 
    }
    
}



?>
<title>Profile | Moneygment</title>

<form action="profile.php" method="post" class="form-signin was-validated">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body " style="text-align: center">
                        <h5 class="card-title text-center">Profile</h5>
                        <div class='dropdown-divider'></div>
                        <p class="text-muted small">Basic info, like your name and photo, that you use on Moneygment</p>
                        <img  class="rounded-circle img-thumbnail" src="<?php echo $_SESSION["spicture"];?>" alt="John" style="width:30%">
                        
                        <h4 class="m-0"><?php echo $_SESSION["sfname"];?> <?php echo $_SESSION["slname"];?></h4>
                        </div>

                        <div class="p-2">
                        <div class="form-label-group">
                            <select name="status" class="form-control">
                                <option value="Busy" <?php if ($_SESSION["sstat"] == 'Busy') echo ' selected="selected"'; ?>>Busy</option>
                                <option value="Available" <?php if ($_SESSION["sstat"] == 'Available') echo ' selected="selected"'; ?>>Available</option>
                            </select>
                        </div>
                        <center><span class="small text-muted m-0"><i class="fa fa-clock-o text-muted mr-2"></i>Joined on <?php echo $_SESSION["sdate_reg"];?></span>&nbsp;<span class="small text-muted m-0">Last login: <?php echo $_SESSION["slastlogin"];?></span></center>
                        <div class='dropdown-divider'></div>
                        <h5 class="bg-success rounded text-center">Account No.: <strong><?php echo $_SESSION["saccount_no"];?></strong></h5>
                        <div class="form-label-group" >
                            <label for="inputFname">First name</label>
                            <input class="form-control" type="text" name="fname" value="<?php echo ucfirst($_SESSION["sfname"]);?>">
                        </div>
                        
                        <div class="form-label-group" >
                            <label for="inputLname">Last name</label>
                            <input class="form-control" type="text" name="lname" value="<?php echo ucfirst($_SESSION["slname"]);?>">
                        </div>    

                        <div class="form-label-group" >
                            <label for="inputPicture">Picture</label>
                            <input class="form-control" type="text" name="picture" value="<?php echo $_SESSION["spicture"];?>">
                        </div> 

                        <div class="form-label-group" >
                            <label for="inputDob">Date of birth</label>
                            <input class="form-control" type="date" name="dob" value="<?php echo date_format($_SESSION["sdob"], 'dd/mm/yyyy');?>">
                        </div>

                        <div class="form-label-group" >
                            <label for="inputDob">Gender</label>
                            <input class="form-control" type="text" name="gender" value="<?php echo ucfirst($_SESSION["sgender"]);?>">
                        </div>


                        <div class="field form-inline radio">
                            <label class="radio" for="txtContact">Gender</label>
                            <input class="radio" type="radio" name="gender2" value="male" <?PHP print $male_status; ?> /> <span>Male</span>
                            <input class="radio" type="radio" name="gender2" value="female" <?PHP print $female_status; ?> /> <span>Female</span>
                        </div>
                        <div class="form-label-group" >      
                            <label for="inputEmail">Email</label>             
                            <input class="form-control" type="text" name="email" value="<?php echo $_SESSION["semail"];?>"> 
                        </div>

                        
                        
                        <div class="dropdown-divider"></div>

                        <div class="form-label-group pb-2" >          
                            <label for="inputenterpword">Current Password</label>         
                            <input class="form-control" type="password" name="enterpword" placeholder="Enter current password"> 
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase rounded-pill" type="submit" name="update">Update</button>
                        <a data-toggle="modal" data-target="#exampleModal" class="btn btn-lg btn-outline-primary btn-block text-uppercase rounded-pill" >Change Password</a>

                        <div class="dropdown-divider"></div>
                        <div>
                            <p class="text-muted small text-center">Last changed <?php echo $lastchanged;?></p>
                        </div>
                        <div class="container">
                            <p class="small text-muted text-center">If you would like to delete your account please contact us through the contact form on the Dashboard page of your account.
Please note that deleted accounts can not be restored.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<form action="profile.php" method="post" class="form-signin was-validated">
<!-- Modal Change password Download -->

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content ">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
                <div class="modal-body ">
                    <div class="form-label-group pb-2" >          
                        <label for="inputenterpword">Current Password</label>         
                        <input class="form-control" type="password" name="currentpword" placeholder="" required> 
                    </div>

                    <div class="form-label-group pb-2" >          
                        <label for="inputenterpword">New Password</label>         
                        <input class="form-control" type="password" name="newpword" placeholder="" required> 
                    </div>

                    <div class="form-label-group pb-2" >          
                        <label for="inputenterpword">Confirm New Password</label>         
                        <input class="form-control" type="password" name="cnewpword" placeholder="" required> 
                    </div>
                </div>
        
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-success rounded-pill" data-dismiss="modal">Cancel</button><button  class="btn btn-success rounded-pill" type="submit" name="btnChangePw">Change</button>
            </div>
            </div>
        </div>
    </div>
</form>
<?php include("footer.php");?>
