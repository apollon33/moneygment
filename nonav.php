<?php
if(isset($_SESSION['susername'])){
	include("nav.php");
}else{
    echo "<div class='container text-center pt-3'>
        <a class='text-warning' href='index.php'>Moneygment</a>
        </div>
        ";
}
?>