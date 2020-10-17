<?php
$hello = $_POST["hello"];

if (isset($_POST["hello"])){
function showname(){
    //using global keyword
  global $hello;
  return $hello;
}
}
?>
<form method="post" action="hello.php">
    <input type="text" value="hello" name="hello">
    <input type="submit" name="hello">
</form>