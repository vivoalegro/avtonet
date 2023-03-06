<?php
include_once "session.php";
include_once "database.php";
admin_only();
$id =$_GET['id'];
$query = "DELETE FROM cities WHERE id =?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

header("Location: cities.php");
