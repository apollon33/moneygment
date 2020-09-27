<?php
include("noerror.php");
include("conn.php");
include("headers.php");

$username = $password = "";
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
$usertable = "tbl" . $username;
$refno = "REG" . date("mdyhis");

if(isset($_POST['login'])){
    $sql = "SELECT * FROM tblusers WHERE username = '$username' AND pword = '$password'";
    $result = mysqli_query($conn, $sql);
    while ($check = mysqli_fetch_array($result)){
        if(isset($check)){
            //store data in session
            session_start();
            $_SESSION["susername"] = $username;
            $_SESSION["spassword"] = $password;
            $_SESSION["stable"] = $usertable;
            header("location: index.php");

            //fetch required data
            $sqldata = mysqli_query($conn,"SELECT * FROM $usertable");
            while($row = mysqli_fetch_assoc($sqldata)) {
                $_SESSION["sbal"] = $row["bal"];
            }
        }else{
            echo "<script>alert('Login failed: Invalid username or password.')</script>";
        }
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
                    <h5 class="card-title text-center">Moneygment Login</h5>
                    <form class="form-signin" method="post" action="login.php">
                        <div class="form-label-group">
                            <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus>
                            <label for="inputEmail">Username</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                            <label for="inputPassword">Password</label>
                        </div>

                        <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit" name="login">Login</button>
                        <a href="register.php" class="btn btn-lg btn-success btn-block text-uppercase" >Register</a>
                        <div class="dropdown-divider"></div>
                        <center><p class="love">Made with <i class="icon ion-heart"></i> by <a target="_blank" href="http://fb.me/renzthegeek">Lorence</a></p></center>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>