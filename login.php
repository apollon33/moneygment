<?php
include("noerror.php");
include("conn.php");
include("headers.php");

$username = $password = "";
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
$usertable = "tbl" . $username;
$refno = "REG" . date("mdyhis");

echo '
    <div class="container text-center pt-3">
        <a href="http://www.moneygment.xyz/index.php"><img src="img/logo2.png"  style="width:10%;"></a>
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
                            Invalid Email or Password
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
                header("location: index.php");
    
                //fetch required data
                $sqldata = mysqli_query($conn,"SELECT * FROM $usertable");
                while($row = mysqli_fetch_assoc($sqldata)) {
                    $_SESSION["sbal"] = $row["bal"];
                }
            }
        }
    }


}

?>
<title>Login | Moneygment</title>

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
                        <p class="text-center pt-3"><a href="register.php">Not using Moneygment? Get started today!</a></p>
                        <div class="dropdown-divider"></div>
                        <p class="love text-center">Made with <i class="icon ion-heart"></i> by <a target="_blank" href="http://fb.me/renzthegeek">Lorence</a></p>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>