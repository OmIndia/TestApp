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
$name = $_GET['name'];
$addr = $_GET['addr'];
$mob = $_GET['mob'];
$ed = $_GET['ed'];

$query="";
$link = mysqli_connect("localhost","root","hariom","test");
    if (mysqli_connect_error()){
        die( "Connection error");
        }
    $query = "INSERT INTO patients (`Name`,`Address`,`Mobile`,`Enrolldate`) 
        VALUES ($name, $addr,$mob, $ed);"; 
    //echo $query;
    $result= mysqli_query($link,$query);
    if ($result){

        //echo "Query was successful";
       
            //echo 1;
         $rtn = mysqli_fetch_assoc(mysqli_query($link,"SELECT `Id` from patients WHERE `Mobile`=$mob"));
            $id = $rtn['Id'];
            echo $id;
           }    
 else  {
        echo -1; 
    }
    

?>