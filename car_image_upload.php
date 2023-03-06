
<?php
include_once "session.php";
include_once "database.php";



$target_dir = "uploads/";
$tmp_name = date('YmdHisu').strtolower(basename($_FILES["file"]["name"]));
$target_file = $target_dir . $tmp_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image

    $check = getimagesize($_FILES["file"]["tmp_name"]);
    if($check !== false) {

        $uploadOk = 0;
    }




// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {

    $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 1) {

} else {
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
     $query = "INSERT INTO images(url,car_id) VALUES(?,?)";
     $stmt =$pdo->prepare($query);
     $stmt->execute([$target_file,$_POST['id']]);


     header("Location: car.php?id=".$_POST['id']);
    }
}
?>

