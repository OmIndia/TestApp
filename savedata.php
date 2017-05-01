<?php 
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

/*$id      = $_POST['id'];
$dt = $_POST['dt'];
$sys = $_POST['sys'];
$dia = $_POST['dia'];
$sugar = $_POST['sugar'];
$temp = $_POST['temp'];
*/
$id      = $_GET['id'];
$dt = $_GET['dt'];
$sys = $_GET['sys'];
$dia = $_GET['dia'];
$sugar = $_GET['sugar'];
$temp = $_GET['temp'];

$query="";
$link = mysqli_connect("localhost","root","hariom","test");
       if (mysqli_connect_error()){
        die( "Connection error");
        }
    $query = "INSERT INTO patientdata (`Id`, `Testdate`,`Systolic`, `Diastolic`, `Sugar`, `Temp`) 
        VALUES ($id, $dt,$sys, $dia, $sugar, $temp)"; 
    /*$query = "INSERT INTO patientdata (`Id`, `Systolic`, `Diastolic`, `Sugar`, `Temp`) 
        VALUES ($id, $sys, $dia, $sugar, $temp);";  */
        //echo $query;
    //$result = mysqli_query($link,$query);
   // if ($result) {
       if (mysqli_query($link,$query)){

        //echo "Query was successful";
       
            echo 1;
           }    
 else  {
        echo -1;  //does not work Apr 23 2017
    }
    
mysqli_close($link);
 
?>