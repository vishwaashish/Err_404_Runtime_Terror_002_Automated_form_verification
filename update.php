<?php 

$con = mysqli_connect("localhost","root","","hackathon");



// ##################################################################
// Update Data
 if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$sql = "UPDATE `data` 
	SET `title`='$title',
	`description`='$description'
	
    WHERE id=$id";
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode" => 1));
	} else {
		echo json_encode(array("statusCode" => 2));
	}
	mysqli_close($con);
}

if (isset($_POST['update11'])) {
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];
	$enable = $_POST['enable'];
	$sql = "UPDATE `data` 
	SET `title`='$title',
	`description`='$description',
	`enable` ='$enable'
	
    WHERE id=$id";
	if (mysqli_query($con, $sql)) {
		echo json_encode(array("statusCode" => 1));
	} else {
		echo json_encode(array("statusCode" => 2));
	}
	mysqli_close($con);
}
