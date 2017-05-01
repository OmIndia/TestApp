<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");

$uid      = $_GET['uid'];
$pwd      = $_GET['pwd'];
//echo $pwd;
$pwd = md5($pwd);
//echo $pwd;

$link = mysqli_connect("localhost","root","hariom","test");
       if (mysqli_connect_error()){
        die( "Connection error");
        }
    //echo $uid;
    //echo $pwd;
    $query = "SELECT id from Users WHERE `userid`=$uid AND `password`='$pwd'";
    //echo $query;
    $result = mysqli_query($link,$query);
     //echo $result;
    $row = mysqli_fetch_assoc($result);
    $rtn = array();
   
    //echo $row;
    //echo "Here";
    if ($row) {

        $rtn = mysqli_fetch_array(mysqli_query($link,"SELECT Role,Patients.Id from Users join Patients on Users.Mobile=Patients.Mobile WHERE `userid`=$uid AND `password`='$pwd' AND `role`='P'"));
            //$role = $rtn['Role'];
            //echo $role;
        if ($rtn == null){
            $rtn = mysqli_fetch_array(mysqli_query($link,"SELECT Role from Users join Patients on Users.Mobile=Patients.Mobile WHERE `userid`=$uid AND `password`='$pwd' AND `role`='A'"));
        }
            $json = json_encode($rtn);
            //mysql_close($link);
            echo $json;
            

    }
      else  {
        echo -1;   
    }
    

?>