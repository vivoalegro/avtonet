<?php
include_once "header.php";
include_once "database.php";
admin_only();
$id =$_GET['id'];

$query = "SELECT * FROM cities WHERE id=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

$row = $stmt->fetch();

?>

    <h1>Vnos kraja</h1>

    <form action="city_update.php" method="post">
        <input type="hidden" value="<?php echo $row['id'];?>" name="id" />
        <div class="row gtr-uniform">
            <div class="col-12">
                <input type="text" value="<?php echo $row['title'];?>" name="title" placeholder="Vnesi ime kraja" required = "required"/>
            </div>
            <div class="col-12">
                <input type="text" value="<?php echo $row['post_number'];?>"name="post_number" placeholder="Vnesi poštno številko"/>
            </div>
            <div>
                <input type="submit" value="Shrani" class="primary"/>
            </div>
        </div>
    </form>


<?php
include_once 'footer.php'
?>