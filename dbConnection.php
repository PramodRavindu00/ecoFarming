

<?php

$serverName="localhost";
$userName="root";
$password="";
$dbName = "ecofarming.gov.lk";

$conn=mysqli_connect($serverName,$userName,$password,$dbName);
if($conn){
    echo "<script>console.log('connected')</script>";
}
else{
    echo "<script>console.log('not connected')</script>";
}

?>