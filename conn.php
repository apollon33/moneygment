<?php

// Create connection
$conn = new mysqli("localhost","root","1234","db_rencebank");
//$conn = new mysqli("localhost","id14971600_admin","09272020Ldl@","id14971600_rencebnk");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


?>
