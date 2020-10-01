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

echo '
    <div class="container text-center pt-3">
        <a href="http://www.moneygment.xyz/index.php"><img src="img/logo2.png"  style="width:10%;"></a>
    </div>
    ';

if(isset($_POST['register'])){
    if ($username === $_POST["password"]) {
        echo '
        <div class="container pt-3">
            <div class="alert-dismissible fade show text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-warning" role="alert">
                Username and Passowrd must be different.
            </div>
        </div>
            ';
    }else{
        $query = mysqli_query($conn,"SELECT * FROM tblusers WHERE username='$username'");
        $count = mysqli_num_rows($query);
        if($count == 0){
            //insert new user
            $sql = mysqli_query($conn,"INSERT INTO tblusers (username, pword, picture, email, fname, lname, account_no, dob, date_reg) VALUES('$username', '$password', '$picture', '$email', '$lname', '$fname', '$account_no', '$dob', now())");

            //create user table            
            $sqlnewtable = mysqli_query($conn, "CREATE TABLE $usertable (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, refno VARCHAR(255) NOT NULL,debit INT(11), credit INT(11), bal INT(11), notes VARCHAR(255) NOT NULL), date_time VARCHAR(255) NOT NULL), categ VARCHAR(255) NOT NULL)");

            //insert default values
            $insertvalues = mysqli_query($conn, "INSERT INTO $usertable(refno, debit, credit, bal) VALUES('$refno', 0, 0, 0,'')");
            echo '            
                <div class="container pt-3">
                    <div class="alert-dismissible fade show text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-success" role="alert">
                        Successfully Registered. <br>Your Account No.: is '.$account_no.' <br><a href="login.php">Login</a>
                    </div>
                </div>
                ';
        }else{
            echo '
            <div class="container pt-3">
                <div class="alert-dismissible fade show text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-danger" role="alert">
                    Username already taken.
                </div>
            </div>
        ';
        }
    }        
}

?>
<title>Register | Moneygment</title>



<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Create your account</h5>

                    <form class="form-signin" method="post" action="register.php">
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" value="<?php echo $username;?>" required autofocus>
                            <label for="inputUsername">Username</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="inputFname" class="form-control" placeholder="First" name="fname" value="<?php echo $fname;?>" required autofocus>
                            <label for="inputFname">First</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="inputLname" class="form-control" placeholder="Last" name="lname" value="<?php echo $lname;?>" required autofocus>
                            <label for="inputLname">Last</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="inputEmail" class="form-control" placeholder="Email" name="email" value="<?php echo $email;?>" required autofocus>
                            <label for="inputEmail">Email</label>
                        </div>

                        <div class="form-label-group">
                            <input type="text" id="inputDob" class="form-control" placeholder="MM/DD/YYYY" name="dob" value="<?php echo $dob;?>" required autofocus>
                            <label for="inputDob">Date of birth</label><br>
                            <label for="inputDobE" class="small text-muted">This will not be show publicly. Confirm your age.</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']?>" required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"name="register">Register</button>
                        <a href="login.php" class="btn btn-lg btn-success btn-block text-uppercase" >Login</a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

