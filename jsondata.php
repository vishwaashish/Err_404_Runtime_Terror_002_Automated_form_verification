<?php 

$con = mysqli_connect("localhost", "root", "", "hackathon");
$query = mysqli_query($con, "SELECT * FROM data ");

$output = mysqli_fetch_all($query, MYSQLI_ASSOC);

$json = json_encode($output);

$filename ="usersdata.json";

if(file_put_contents("$filename", $json)){
    echo "File Created";
}else{
    echo "Not Created";
}
?>