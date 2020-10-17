<?php
include("noerror.php");
$file = $_POST["file"];
if (!file_exists($file)) {
    echo "not";
}else{
    echo "exists";
}
?>
<form method="post" action="filecheck.php">
    <input type="text" name="file">
    <input type="submit" name="check" value="check">
</form>