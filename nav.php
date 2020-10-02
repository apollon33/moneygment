<?php
session_start();
include("conn.php");
$picture = $_SESSION["spicture"];
$username = $_SESSION["susername"];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php">Moneygment</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Transaction
        </a>
        <div class="dropdown-menu"  aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="deposit.php">Income</a>
          <a class="dropdown-item" href="withraw.php">Expense</a>
          <a class="dropdown-item" href="transfer.php">Transfer</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="history.php"> History</a>
        </div>
      </li>

    </ul>

    <form class="form-inline my-2 my-lg-0 "method="get" action="search.php">
      <div class="input-group ">
        <input type="text" name="search_key" class="form-control " placeholder="Search User...">
          <div class="input-group-prepend ">
            <button class="input-group-text mr-sm-2" id="basic-addon1"><i class=" fa fa-search" aria-hidden="true"></i></button>
          </div>
      </div>
    </form>

    
        
    <img class="" alt="<?php echo $username;?>" data-animation="true" src="<?php echo $picture;?>" width="30" height="30"  alt="" data-container="body" data-toggle="popover" data-html="true" data-placement="bottom" data-content="
    <?php
    echo "
      <p class='small text-muted ' >Signed in as <a class='text-decoration-none' href='profile.php'><strong>$username</strong></a></p>
      ";
    ?>
    <div class='dropdown-divider'></div>
    <a href='profile.php'>Profile</a>
    <div class='dropdown-divider'></div>
    <a href='logout.php'>Logout</a>
    ">
  </div>
</nav>