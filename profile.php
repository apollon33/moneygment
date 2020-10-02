<?php
session_start();
include("noerror.php");
include("conn.php");
include("headers.php");
include("nav.php");
include("redirect.php");



$picture = $_SESSION["spicture"];
$username = $_SESSION["susername"];
$newpicture = $_POST["newpicture"];
$email = $_SESSION["semail"];
$fname = $_SESSION["fname"];
$lname = $_SESSION["lname"];
$account_no = $_SESSION["account_no"];
$dob = $_SESSION["dob"];
$date_reg = $_SESSION["date_reg"];

if(isset($_POST['update'])){
    //update user    
    $sql = mysqli_query($conn, "UPDATE tblusers SET picture='$newpicture' WHERE username = '$username'");

    echo '
            <div class="container pt-3">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class=" text-center alert alert-success">
                            Profile updated!
                        </div>
                    </div>
                </div>
            </div>
            ';
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
                        <img class="rounded-circle img-thumbnail" src="<?php echo $picture;?>" alt="John" style="width:30%">
                        <h1 class="m-0"><?php echo $username;?></h1><br>
                        <p class="small text-muted m-0">member since: <?php echo $date_reg;?></p>
                        <div class='dropdown-divider'></div>
                        <h5 class="bg-success rounded">Account No.: <strong><?php echo $account_no;?></strong></h5>
                        <div class="form-label-group" >
                            <input class="form-control" type="text" name="fname" value="<?php echo $fname;?>">
                            <label for="inputFname">First name</label>
                        </div>
                        
                        <div class="form-label-group" >
                            <input class="form-control" type="text" name="lname" value="<?php echo $lname;?>">
                            <label for="inputLname">Last name</label>
                        </div>

                        <div class="form-label-group" >
                            <input class="form-control" type="text" name="picture" value="<?php echo $picture;?>">
                            <label for="inputPicture">Picture</label>
                        </div> 

                        <div class="form-label-group" >
                            <input class="form-control" type="text" name="dob" value="<?php echo $dob;?>">
                            <label for="inputDob">Date of birth</label>
                        </div>

                        <div class="form-label-group" >                   
                            <input class="form-control" type="text" name="email" value="<?php echo $email;?>"> 
                            <label for="inputEmail">Email</label>
                        </div>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="update">Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php include("footer.php");?>
