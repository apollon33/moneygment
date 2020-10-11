<?php
session_start();
include("noerror.php");
include("headers.php");
include("conn.php");
include("nav.php");
include("redirect.php");

$search_key = $_GET['search_key'];

$sql = mysqli_query($conn,"SELECT * FROM tblusers WHERE (`username` LIKE '%".$search_key."%')");
$count = mysqli_num_rows($sql);

echo "    
    <div class='container p-3'>
    <div class='container font-weight-bold'>Results for '".$search_key."'</div>
    ";
if($search_key == null){
    echo "Please enter search key";
}else{
    if($count == 0){
        echo "User not found.";
    }else{
        while($search_results = mysqli_fetch_assoc($sql)){
            echo "
            <form method='get' action='transfer.php'>
                <div class='media  border-bottom border-top border-warning m-2 p-2 text-white bg-dark'>
                    <img class='align-self-center mr-3 img-thumbnail ' style='width:10%;' src=".$search_results['picture']." alt='Generic placeholder image'>
                    <div class='media-body'>
                        <h5 class='mt-0'>".$search_results['username']."</h5>
                        <p class='small'>Status: <span class='text-danger'>".$_SESSION["sstat"]."</span></p>
                        <p>Details here.</p>                        
                        <p class='mb-0'><a href='transfer.php?search_key=".$search_results['username']."' class='btn btn btn-success  text-uppercase' >Transfer</a> </p>
                    </div>
                </div>
            

            
            
            ";
        }
    }
}
echo "</div>";
?>