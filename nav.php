<?php
session_start();
include("conn.php");
$picture = $_SESSION["spicture"];
$username = $_SESSION["susername"];
$fname = $_SESSION["sfname"];
$lname = $_SESSION["slname"];
$stat = $_SESSION["sstat"];
?>
<nav class="navbar navbar-expand-md navbar-light bg-light py-0">
  <a class="navbar-brand" href="home.php">
    <img src="img/brand.png" width="30" height="30" alt="">
  </a>
  <button class="navbar-toggler py-0" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Add
        </a>
        <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="deposit.php"><i class="fa fa-plus-square mr-2"></i>Income</a>
          <a class="dropdown-item" href="withraw.php"><i class="fa fa-minus-square mr-2"></i>Expense</a>
          <!--<a class="dropdown-item" href="transfer.php"><i class="fa fa-paper-plane"></i> Transfer</a>-->
      </li>

      <a class="nav-link" href="history.php" >
        Records
      </a>

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tools
        </a>
        <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="loancalc.php"><i class="fa fa-calculator mr-2"></i>Loan Calculator</a>
          <a class="dropdown-item" href="percent.php"><i class="fa fa-percent mr-2"></i>Percent</a>
          <!--<a class="dropdown-item" href="chat.php" ><i class="fa fa-comments"></i> Chat</a>-->
        </div>
      </li>


      

    </ul>

    <!--<form class="form-inline my-2 my-lg-0 "method="get" action="search.php">
      <div class="input-group ">
        <input type="text" name="search_key" class="form-control " placeholder="Search User...">
          <div class="input-group-prepend ">
            <button class="input-group-text mr-sm-2" id="basic-addon1"><i class=" fa fa-search" aria-hidden="true"></i></button>
          </div>
      </div>
    </form>-->

    
        
    
    <ul class="navbar-nav ">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img class="rounded-circle  border border-secondary" alt="<?php echo $username;?>" src="<?php echo $picture;?>" width="30" height="30"> <?php echo ucwords($fname);?>
        </a>
        <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="profile.php"><i class="fa fa-user mr-2" aria-hidden="true"></i>Profile</a>
          <a class="dropdown-item" href="logout.php"><i class="fa fa-sign-out mr-2"></i>Logout</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
