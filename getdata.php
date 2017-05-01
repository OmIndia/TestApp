<?php header('Access-Control-Allow-Origin: *');

$id      = $_GET['id'];


$link = mysqli_connect("localhost","root","hariom","test");
       if (mysqli_connect_error()){
        die( "Connection error");
        }
    $query = "SELECT testdate, systolic,diastolic,sugar,temp from patientdata WHERE id=$id";
    if ($result = mysqli_query($link,$query)) {

        //echo "Query was successful";
        $rowcount=mysqli_num_rows($result);
        $data = array();
        if ($rowcount > 0){
            
            while ($array = mysqli_fetch_row($result)) {
                $data[] = $array;
            }
           // while ($row = mysqli_fetch_array($result)){
                
            //print_r($row);
            // echo "<p> Patient Name is".$row['name']."</p>";   //works Apr 23 2017
            //echo $row['systolic'].$row['diastolic'].$row['sugar'].$row['temp'];   //works Apr 24 2017
            //echo $data;
            $json = json_encode($data);
            
             }
        //mysql_close($link);
        echo $json;
    }
      else  {
        echo -1;  //does not work Apr 23 2017
    }
    

?>