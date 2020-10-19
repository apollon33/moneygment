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
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-times"></i> That is an incorrect username / password combination.
            </div>
            ';
    }else{
        echo '
            <div style="position: fixed; bottom: 8px; left: 16px; z-index: 1;" class=" toast toast-body" data-autohide="true" data-delay="10000">
                <i class="fa fa-check-circle"></i> Success! Please wait for redirection...
            </div>

            <script> 
                window.setTimeout(function(){
                window.location.href = "home.php";
                }, 3000);
            </script>
            ';
        include("refresh_data.php");
        //header("location: home.php");
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
                    <h5 class="card-title text-center mb-2">Welcome back!</h5>
                    <div class='dropdown-divider'></div>
                    <form class="form-signin pt-2" method="post" action="login.php">
                        <div class="form-label-group">
                            <label for="inputEmail">Username</label>
                            <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" required autofocus>
                        </div>

                        <div class="form-label-group pb-3 pt-3">
                            <label for="inputPassword">Password</label>
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                        </div>

                        
                        <button class="btn btn-lg btn-primary btn-block text-uppercase rounded-pill" type="submit" name="login">Login</button>
                        <p class="text-center pt-3 small"><a href="register.php">Sign up for Moneygment</a></p>
                        
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>