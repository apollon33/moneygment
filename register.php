<?php
include("noerror.php");
include("conn.php");
include("headers.php");

$username = $password = "";
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
$usertable = "tbl" . $username;
$refno = "REG" . date("mdyhis");

if(isset($_POST['register'])){
    $query = mysqli_query($conn,"SELECT * FROM tblusers WHERE username='$username'");
    $count = mysqli_num_rows($query);
        if($count == 0){
            //insert new user
            $sql = mysqli_query($conn,"INSERT INTO tblusers (username, pword) VALUES('$username', '$password')");

            //create user table            
            $sqlnewtable = mysqli_query($conn, "CREATE TABLE $usertable (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, refno VARCHAR(255) NOT NULL,debit INT(11), credit INT(11), bal INT(11))");

            //insert default values
            $insertvalues = mysqli_query($conn, "INSERT INTO $usertable(refno, debit, credit, bal) VALUES('$refno', 0, 0, 0)");
            echo 'Successfully Registered. <a href="login.php">Login</a>';
        }else{
            echo 'Username exists.';
        }
}

?>

<div class="container pt-3">
    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-danger" role="alert">
        Please DO NOT share your password to anyone.
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center">Moneygment Register</h5>

                    <form class="form-signin" method="post" action="register.php">
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus>
                            <label for="inputEmail">Username</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit"name="register">Register</button>
                        <a href="login.php" class="btn btn-lg btn-success btn-block text-uppercase" >Login</a>

                        <div class="dropdown-divider"></div>
                        <center><p class="love">Made with <i class="icon ion-heart"></i> by <a target="_blank" href="http://fb.me/renzthegeek">Lorence</a></p></center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>