<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");


$mob = $_GET['mob'];


$query="";

$link = mysqli_connect("localhost","root","hariom","test");
    if (mysqli_connect_error()){
        die( "Connection error");
        }
    
            $rtn = mysqli_fetch_assoc(mysqli_query($link,"SELECT `Id` from patients WHERE `Mobile`=$mob"));
            $id = $rtn['Id'];
            echo $id;
            
  
?>