<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "weather_db";

$conn = mysqli_connect($servername, $username, $password, $database);

if($conn){
    // echo "SQL connected";
}else{
    echo "Failed to connect SQL".mysqli_connect_error();
}

if(isset($_GET['q'])){
    $cityName = $_GET['q'];
}else{
    $cityName = "Christchurch";
}

$selectAllData="SELECT * FROM weather WHERE city = '$cityName'";
$result = mysqli_query($conn,$selectAllData);
if(mysqli_num_rows($result)>0){
    while($row=mysqli_fetch_assoc($result)){
        $rows[]= $row;
    }
    
    $json_data = json_encode($rows); //converts associative array to JSON format;
    echo $json_data;

    header('Content-Type: application/json');


}
















?>