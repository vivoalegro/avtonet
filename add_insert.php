<?php
include_once "session.php";
include_once "database.php";


$user_id = $_SESSION['user_id'];

$car_id = $_POST['car_id'];
$title = $_POST['title'];
$description = $_POST['description'];
$price = $_POST['price'];
$date_start = $_POST['date_start'];
$date_end = $_POST['date_end'];
//print_r($_POST);die();



//preverim če ima vnešen ime kraja
if(!empty ($title) && !empty($price) && !empty($date_start) && !empty($date_end)) {
    $query = "INSERT INTO adds(title,description,price,date_start,date_end,car_id,user_id) VALUES (?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($query);//statement
    $stmt->execute([$title,$description,$price,$date_start,$date_end,$car_id,$user_id]);
//die();

}
header("Location: adds.php");

