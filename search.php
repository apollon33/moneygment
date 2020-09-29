<?php
session_start();
include("noerror.php");
include("headers.php");
include("conn.php");
include("nav.php");

if(!isset($_SESSION['susername']) || empty($_SESSION['spassword'])){
	header("location: login.php");
}

$search_key = $_GET['search_key'];

$sql = mysqli_query($conn,"SELECT * FROM tblusers WHERE (`username` LIKE '%".$search_key."%')");
$count = mysqli_num_rows($sql);

echo "<div class='container p-3'>";
if($search_key == null){
    echo "Please enter search key";
}else{
    if($count == 0){
        echo "User not found.";
    }else{
        while($search_results = mysqli_fetch_assoc($sql)){
            echo "
            <form method='get' action='transfer.php'>
                <div class='container'>
                    <div class='row'>
                        <div class='col'>
                            <img  src=".$search_results['picture']." style='width:10%'>
                            <h3>".$search_results['username']."</h3>
                            <a href='transfer.php?search_key=".$search_results['username']."' class='btn btn btn-success btn-block text-uppercase' >Transfer</a>         
                            <div class='dropdown-divider'></div>               
                        </div>                    
                    </div>                
                </div>
            </div>
            

            
            
            ";
        }
    }
}
echo "</div>";
?>