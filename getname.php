<?php header('Access-Control-Allow-Origin: *');

$id      = $_GET['id'];


/*   May 1 2017 - next 4 lines needed for localhost so commented for Heroku
$link = mysqli_connect("localhost","root","hariom","test");
       if (mysqli_connect_error()){
        die( "Connection error");
        }
        */
$url = parse_url(getenv("CLEARDB_DATABASE_URL"));
 
$server = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["path"], 1);
 
//$conn = new mysqli($server, $username, $password, $db);
$link = mysqli_connect($server, $username, $password, $db);
if (mysqli_connect_error()){
        die( "Connection error");
        }


    $query = "SELECT name from patients WHERE id=$id";
    if ($result = mysqli_query($link,$query)) {

        //echo "Query was successful";
        $rowcount=mysqli_num_rows($result);
        if ($rowcount > 0){
            while ($row = mysqli_fetch_array($result)){
                
            //print_r($row);
            // echo "<p> Patient Name is".$row['name']."</p>";   //works Apr 23 2017
            //echo $row['name'];  works Apr 23 2017
            echo json_encode($row['name']);
           }
    
    } else  {
        echo -1;  //does not work Apr 23 2017
    }
    }

 /*       $rowcount=mysqli_num_rows($result);
        if ($rowcount > 0){
            echo "Success";
        }else {
            echo "Fail";
        }
    }
    */
    /*
if(array_key_exists('callback', $_GET)){

    header('Content-Type: text/javascript; charset=utf8');
    header('Access-Control-Allow-Origin: http://www.example.com/');
    header('Access-Control-Max-Age: 3628800');
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');

    $callback = $_GET['callback'];
    echo $callback.'('.json_encode($result).');';

}else{
    // normal JSON string
    header('Content-Type: application/json; charset=utf8');

    echo json_encode($result);
}
*/
?>