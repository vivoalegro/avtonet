<?php
include_once  "session.php";
include_once "database.php";
admin_only();

$title = $_POST['title'];
$post_number = $_POST['post_number'];
//preverim če ima vnešen ime kraja
if(!empty ($title)) {
    $query = "INSERT INTO cities(title,post_number) VALUES (?,?)";
    $stmt = $pdo->prepare($query);//statement
    $stmt->execute([$title, $post_number]);


}
header("Location: cities.php");

