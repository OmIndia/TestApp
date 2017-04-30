<?php header('Access-Control-Allow-Origin: *');

$uid      = $_GET['uid'];
$pwd      = $_GET['pwd'];


$link = mysqli_connect("localhost","root","hariom","test");
       if (mysqli_connect_error()){
        die( "Connection error");
        }
    $query = "SELECT * from Users WHERE userid=$uid AND password=$pwd;";
    $result = mysqli_query($link,$query)
    if ($result) {

        echo 1;
    }
      else  {
        echo -1;   
    }
    

?>