<?php
include_once "header.php";
?>
<h1>Oglasi</h1>

<a href="add_add.php" class="button">Nov oglas</a>
<br/><br/>
<div class="row">
    <?php
    include_once  "database.php";
    include_once "functions.php";
    $query = "SELECT * FROM adds WHERE date_start <= now() AND date_end>= now()";
    $stmt= $pdo->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch()){
        echo '<div class=col-4 col-12 medium>';
        echo '<span class= "image fit"><a href="add.php?id='.$row['id'].'"><img src="'.getImageFromCarId($row['car_id']).'" alt="Slika"/></a></span>';
        echo '<div>'.$row['title'].'</div>';
        echo '<div>'.$row['price'].'</div>';
        echo '</div>';
    }
    ?>
</div>
<?php
include_once "footer.php";
?>



