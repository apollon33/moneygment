<?php
session_start();
include("conn.php");
$picture = $_SESSION["spicture"];
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="index.php">Moneygment</a>
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
          <a class="dropdown-item" href="deposit.php">Deposit</a>
          <a class="dropdown-item" href="withraw.php">Withraw</a>
          <a class="dropdown-item" href="transfer.php">Transfer</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="history.php">Transaction History</a>
        </div>
      </li>

    </ul>
    <div class="dropdown">
      <button class="btn btn-outline-primary my-2 my-sm-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <img src="<?php echo $picture;?>" style="width:30px; height:30px;">
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" href="profile.php">Profile</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item " href="logout.php">Logout</a>
      </div>
    </div>
  </div>
</nav>