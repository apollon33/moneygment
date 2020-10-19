<?php
include("noerror.php");
include("conn.php");
include("headers.php");

$username = $password = $email = $fname = $lname = $account_no =  "";
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
$email = $_POST['email'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$account_no = date("mdyhis");
$dob = $_POST['dob'];
$usertable = "tbl" . $username;
$refno = "REG" . date("mdyhis");
$picture = "img/placeholder.png";
$stat = "Busy";
$chars = 8;
$now = "";

echo '
    <div class="container text-center pt-3 pb-3">
        <a href="http://www.moneygment.xyz/index.php"><img class="img-fluid max-width: 100%; height: auto;" src="img/logo2.png"  style="width:10%;"></a>
    </div>
    ';

if(isset($_POST['register'])){
    if(strlen($_POST["password"]) < 8){
        echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-info-circle"></i> Password must be 8chars up.
            </div>
                ';
    }elseif($_POST["password"] !== $_POST["cpassword"]){
        echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-info-circle"></i> Password not match.
            </div>
            ';
    }elseif($username === $_POST["password"]){
        echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-ban"></i> Username and password must NOT be the same.
            </div>
            ';
    }else{        
        
        $query = mysqli_query($conn,"SELECT * FROM tblusers WHERE username='$username'");
        $count = mysqli_num_rows($query);
        if($count == 0){
            //insert new user
            $sql = mysqli_query($conn,"INSERT INTO tblusers (username, pword, picture, email, fname, lname, account_no, dob, date_reg, stat, lastlogin, ip, gender, lastchanged) VALUES('$username', '$password', '$picture', '$email', '$fname', '$lname', '$account_no', '$dob', CURRENT_TIMESTAMP, '$stat', CURRENT_TIMESTAMP, '', '', '')");
        
            //create user table            
            $sqlnewtable = mysqli_query($conn, "CREATE TABLE $usertable (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, refno VARCHAR(255) NOT NULL,debit INT(11), credit INT(11), bal INT(11), notes VARCHAR(255) NOT NULL, date_time VARCHAR(255) NOT NULL, categ VARCHAR(255) NOT NULL)");
        
            //insert default values
            $insertvalues = mysqli_query($conn, "INSERT INTO $usertable(refno, debit, credit, bal, notes, date_time, categ) VALUES('$refno', 0, 0, 0,'', CURRENT_TIMESTAMP, '')");
            include("saveip.php");
            
            echo '
                <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                    <i class="fa fa-check"></i> Thank you for registering!
                </div>
                ';
        }else{
            echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-exclamation"></i> Username already taken.
            </div>
            ';
        }
    }
}
?>
<title>Register | Moneygment</title>

<div class="container bg-white p-2 mb-3 rounded">
    <h5 class="text-center p-3">Create an account</h5>
    <div class='dropdown-divider'></div>
    <form class="form-signin p-3 was-validated" method="post" action="register.php">
        <div class="container">
            <p class="small">Please fill in this form to create an account. It's free and only takes a minute.</p>
            <div class="row">
                    <div class="col-sm">
                        <div class="form-label-group">
                            <label for="inputUsername">Username</label>
                            <input type="text" id="inputUsername"  class="form-control " placeholder="Username" name="username" value="<?php echo $username;?>" required autofocus>
                        </div>

                        <div class="form-label-group pb-3">
                            <label for="inputPassword">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password (8 characters minimum)" name="password" value="<?php echo $_POST['password']?>" required>

                            <label for="inputPassword">Confirm Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Re-type password" name="cpassword" value="<?php echo $_POST['cpassword']?>" required>
                            <small id="passwordHelpBlock" class="form-text text-muted">
                                Your password must be 8-20 characters long, contain letters and numbers, and must not contain spaces, special characters, or emoji.
                            </small>
                        </div>
                    </div>
                    
                    <div class="col-sm">
                        <div class="form-label-group">
                            <label for="inputFname">First</label>
                            <input type="text" id="inputFname" class="form-control " placeholder="First" name="fname" value="<?php echo $fname;?>" required autofocus>
                        </div>

                        <div class="form-label-group">
                            <label for="inputLname">Last</label>
                            <input type="text" id="inputLname" class="form-control" placeholder="Last" name="lname" value="<?php echo $lname;?>" required autofocus>
                        </div>

                        <div class="form-label-group">
                            <label for="inputEmail">Email</label>
                            <input type="text" id="inputEmail" class="form-control" placeholder="your@email.com" name="email" value="<?php echo $email;?>" required autofocus>
                        </div>

                        <div class="form-label-group">
                            <label for="inputDob">Date of birth</label>
                            <input type="date" id="inputDob" class="form-control" placeholder="MM/DD/YYYY" name="dob" value="<?php echo $dob;?>" required autofocus>
                            <label for="inputDobE" class="small text-muted">This will not be show publicly. Confirm your age.</label>
                        </div>

                        <small id="passwordHelpBlock" class="form-text text-muted pb-2">
                                By creating an account you agree to our <a href="privacy.php">Privacy Policy</a>.
                        </small>
                        <button class="btn btn-lg btn-primary btn-block rounded-pill" type="submit"name="register">Create my account</button>
                        <p class="text-center pt-3 small">Aleready a member? <a href="login.php">Login</a></p>
                    </div>
            </div>
        </div>
    </form>
</div>