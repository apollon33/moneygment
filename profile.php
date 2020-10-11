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
$newpic = "img/" .$username . ".jpg";
$usertable = $_SESSION["stable"];

$refno = "RES" . date("mdyhis");


if(isset($_POST['update'])){
    if($enterpword == $oldpword ){
        //update user    
        $sql = mysqli_query($conn, "UPDATE tblusers SET fname='$fname', lname='$lname',  picture='$newpic', dob='$dob', email='$email', stat='$status' WHERE username = '$username'");

        //new data
        $_SESSION["spicture"] = $picture;
        $_SESSION["semail"] = $email;
        $_SESSION["sfname"] = $fname;
        $_SESSION["slname"] = $lname;
        $_SESSION["sdob"] = $dob;
        $_SESSION["sstat"] = $stat;
        echo '
                <div class="container pt-3">
                    <div class="row">
                        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                            <div class=" text-center alert alert-success">
                                Your profile have been updated! <br>Re-login account to see the effect.
                            </div>
                        </div>
                    </div>
                </div>
                ';        
    }else{
        echo '
            <div class="container pt-3">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class=" text-center alert alert-warning">
                            Please enter your current password to save changes.
                        </div>
                    </div>
                </div>
            </div>
            '; 
    }
    
}



?>
<title>Profile | Moneygment</title>

<form action="profile.php" method="post" class="form-signin">
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body " style="text-align: center">
                        <h5 class="card-title text-center">Profile</h5>
                        <img  class="rounded-circle img-thumbnail" src="<?php echo $_SESSION["spicture"];?>" alt="John" style="width:30%">
                        
                        <h1 class="m-0"><?php echo $username;?></h1><br>
                        <div class="form-label-group">
                            <select name="status" class="form-control">
                                <option value="Busy" <?php if ($_SESSION["sstat"] == 'Busy') echo ' selected="selected"'; ?>>Busy</option>
                                <option value="Available" <?php if ($_SESSION["sstat"] == 'Available') echo ' selected="selected"'; ?>>Available</option>
                            </select>
                        </div>
                        <span class="small text-muted m-0">Member since: <?php echo $_SESSION["sdate_reg"];?></span>&nbsp;<span class="small text-muted m-0">Last login: <?php echo $_SESSION["slastlogin"];?></span>
                        <div class='dropdown-divider'></div>
                        <h5 class="bg-success rounded">Account No.: <strong><?php echo $_SESSION["saccount_no"];?></strong></h5>
                        <div class="form-label-group" >
                            <input class="form-control" type="text" name="fname" value="<?php echo $_SESSION["sfname"];?>">
                            <label for="inputFname">First name</label>
                        </div>
                        
                        <div class="form-label-group" >
                            <input class="form-control" type="text" name="lname" value="<?php echo $_SESSION["slname"];?>">
                            <label for="inputLname">Last name</label>
                        </div>    

                        <div class="form-label-group" >
                            <input class="form-control" type="text" name="picture" value="<?php echo $_SESSION["spicture"];?>">
                            <label for="inputPicture">Picture</label>
                        </div> 

                        <div class="form-label-group" >
                            <input class="form-control" type="text" name="dob" value="<?php echo $_SESSION["sdob"];?>">
                            <label for="inputDob">Date of birth</label>
                        </div>

                        <div class="form-label-group" >                   
                            <input class="form-control" type="text" name="email" value="<?php echo $_SESSION["semail"];?>"> 
                            <label for="inputEmail">Email</label>
                        </div>

                        
                        
                        <div class="dropdown-divider"></div>

                        <div class="form-label-group" >                   
                            <input class="form-control" type="password" name="enterpword" placeholder="Enter current password"> 
                            <label for="inputenterpword">Current Password</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="update">Update</button>
                        <div class="dropdown-divider"></div>
                        <div class="container">
                            <p class="small text-muted">If you would like to delete your account please contact us through the contact form on the Dashboard page of your account.
Please note that deleted accounts can not be restored.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

<div class="container">
                            <form action="profile.php" method="post">
                                
                            </form>
                        </div>
<?php include("footer.php");?>
