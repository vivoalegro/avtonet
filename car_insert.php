<?php
include_once "session.php";
include_once "database.php";


$user_id = $_SESSION['user_id'];

$brand = $_POST['brand'];
$model = $_POST['model'];
$year = $_POST['year'];
$km = $_POST['km'];
$kw = $_POST['kw'];
$ccm = $_POST['ccm'];
$fuel = $_POST['fuel'];



//preverim če ima vnešen ime kraja
if(!empty ($brand) && !empty($model)) {
    $query = "INSERT INTO cars(brand,model,year,km,kw,ccm,fuel,user_id) VALUES (?,?,?,?,?,?,?,?)";
    $stmt = $pdo->prepare($query);//statement
    $stmt->execute([$brand,$model,$year,$km,$kw,$ccm,$fuel,$user_id]);


}
header("Location: cars.php");
