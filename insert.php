
<?php
//insert.php;

if(isset($_POST["item_name"]))
{
 $connect = new PDO("mysql:host=localhost;dbname=hackathon", "root", "");
 $order_id = uniqid();
 $nameuniqueid = uniqid();
 
 $username = $_POST['username'];
 for($count = 0; $count < count($_POST["item_name"]); $count++)
 {  
  $query = "INSERT INTO data 
  (uniqueid, title, description, enable,name,nameuniqueid,type) 
  VALUES (:order_id, :item_name, :item_quantity, :item_unit, :username,:nameuniqueid,:validation)
  ";
  $statement = $connect->prepare($query);
  $statement->execute(
   array(
    ':order_id'   => $order_id,
    ':nameuniqueid'   => $nameuniqueid,
    ':username'   => $username,
    ':item_name'  => $_POST["item_name"][$count], 
    ':item_quantity' => $_POST["item_quantity"][$count], 
    ':item_unit'  => $_POST["item_unit"][$count],
    ':validation'  => $_POST["validation"][$count]
   )
  );
 }
 $result = $statement->fetchAll();
//  if(isset($result))
//  {
//   echo 'ok';
//  }
 if(isset($result)){
    echo json_encode(array("status" => 2));
 }else{
    echo json_encode(array("status" => 1));
 }
}


if(isset($_POST["updated"])){
 $connect = mysqli_connect("localhost","root","","hackathon");
 $id = $_POST['id'];
 $title = $_POST['title1'];
 $description = $_POST['description1'];

 $update =mysqli_query($connect," UPDATE data set `title`= '$title' , `description` = '$description' where `id` ='$id' ");

 if($update){
    echo json_encode(array("status" => 2));
 }
}



?>