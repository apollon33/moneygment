<?php
if(!isset($_SESSION['susername']) || empty($_SESSION['spassword'])){
	header("location: login.php");
}
?>
