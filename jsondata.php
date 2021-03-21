<?php 

$con = mysqli_connect("localhost", "root", "", "hackathon");
$query = mysqli_query($con, "SELECT * FROM data Where name='$name' ");
?>