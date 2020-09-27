<?php
include("noerror.php");
include("conn.php");
include("headers.php");

$username = $password = "";
$username = $_POST['username'];
$password = hash('sha256', $_POST['password']);
$usertable = "tbl" . $username;
$refno = "REG" . date("mdyhis");
$picture = "img/placeholder.png";

if(isset($_POST['register'])){
    if ($username === $_POST["password"]) {
        echo '
        <div class="container pt-3">
            <div class="alert-dismissible fade show text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-warning" role="alert">
                Username and Passowrd must be different.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
            ';
    }else{
        $query = mysqli_query($conn,"SELECT * FROM tblusers WHERE username='$username'");
        $count = mysqli_num_rows($query);
        if($count == 0){
            //insert new user
            $sql = mysqli_query($conn,"INSERT INTO tblusers (username, pword, picture) VALUES('$username', '$password', '$picture')");

            //create user table            
            $sqlnewtable = mysqli_query($conn, "CREATE TABLE $usertable (id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY, refno VARCHAR(255) NOT NULL,debit INT(11), credit INT(11), bal INT(11), notes VARCHAR(255) NOT NULL)");

            //insert default values
            $insertvalues = mysqli_query($conn, "INSERT INTO $usertable(refno, debit, credit, bal) VALUES('$refno', 0, 0, 0,'')");
            echo '            
                <div class="container pt-3">
                    <div class="alert-dismissible fade show text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-success" role="alert">
                        Successfully Registered. <a href="login.php">Login</a>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
                ';
        }else{
            echo '
            <div class="container pt-3">
                <div class="alert-dismissible fade show text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-danger" role="alert">
                    Username already taken.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        ';
        }
    }        
}

?>
<title>Register | Moneygment</title>
<div class="container pt-3">
    <div class="text-center col-sm-9 col-md-7 col-lg-5 mx-auto alert alert-danger" role="alert">
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
                            <input type="text" id="inputUsername" class="form-control" placeholder="Username" name="username" value="<?php echo $username;?>" required autofocus>
                            <label for="inputEmail">Username</label>
                        </div>

                        <div class="form-label-group">
                            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" value="<?php echo $_POST['password']?>" required>
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

