<?php
include("noerror.php");
include("conn.php");
include("headers.php");

$username = $password = "";
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
$usertable = "tbl" . $username;
$refno = "REG" . date("mdyhis");
$msg = $_GET['msg'];

echo '
    <div class="container text-center pt-3">
        <a href="http://www.moneygment.xyz/index.php"><img class="img-fluid max-width: 100%; height: auto;" src="img/logo2.png"  style="width:10%;"></a>
    </div>
    ';

if(isset($_POST['login'])){
    $sql = mysqli_query($conn, "SELECT * FROM tblusers WHERE username = '$username' AND pword = '$password'");
    $count = mysqli_num_rows($sql);
    
    if($count == 0){
        echo '
            <div class="container pt-3">
                <div class="row">
                    <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                        <div class=" text-center alert alert-danger">
                            <i class="fa fa-times-circle fa-3x"></i>
                            <p>Invalid Email or Password</p>
                        </div>
                    </div>
                </div>
            </div>
            ';
    }else{
        while ($check = mysqli_fetch_array($sql)){
            if(isset($check)){
                //store data in session
                session_start();
                $_SESSION["susername"] = $username;
                $_SESSION["spassword"] = $password;            
                $_SESSION["stable"] = $usertable;
                $_SESSION["spicture"] = $check["picture"];
                $_SESSION["semail"] = $check["email"];
                $_SESSION["sfname"] = $check["fname"];
                $_SESSION["slname"] = $check["lname"];
                $_SESSION["saccount_no"] = $check["account_no"];
                $_SESSION["sdob"] = $check["dob"];
                $_SESSION["sdate_reg"] = $check["date_reg"];
                $_SESSION["scateg"] = $check["categ"];
                $_SESSION["sstat"] = $check["stat"];
                $_SESSION["slastlogin"] = $check["lastlogin"];
                $_SESSION["slastchanged"] = $check["lastchanged"];
                $_SESSION["sgender"] = $check["gender"];
                include("saveip.php");
                header("location: home.php");
            }
        }

        include("refresh_bal.php");
        
    }


}

?>
<title>Login | Moneygment</title>

<div class="container p-3">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin">
                <div class="card-body">
                    <h5 class="card-title text-center mb-4">Login to Moneygment</h5>
                    <div class='dropdown-divider'></div>
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
                        <p class="text-center pt-3 small"><a href="register.php">Sign up for Moneygment</a></p>
                        
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>