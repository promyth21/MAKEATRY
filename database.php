<?php 
$hostName="localhost";
$userName="root";
$password="";
$databaseName="makeatry";
$connect = mysqli_connect($hostName,$userName,$password,$databaseName);
if(!$connect){
    die("DataBase Error");
}
else{
// echo "Connected";
}
?>