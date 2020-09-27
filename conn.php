<?php

// Create connection
$conn = new mysqli("localhost","root","1234","db_rencebank");
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>