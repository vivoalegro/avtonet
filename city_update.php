<?php
include_once "session.php";
include_once "database.php";
admin_only();
$title = $_POST['title'];
$post_number = $_POST['post_number'];
$id = $_POST['id'];

//preverim če ima vnešen ime kraja
if (!empty ($title)) {
    $query = "UPDATE cities SET title=?,post_number=? WHERE id=?";
    $stmt = $pdo->prepare($query);//statement
    $stmt->execute([$title, $post_number,$id]);


}
header("Location: cities.php");
