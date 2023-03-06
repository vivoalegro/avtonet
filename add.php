<?php
include_once 'header.php';
include_once "database.php";

$user_id = $_SESSION['user_id'];
$id = (int) $_GET['id'];

$query = "SELECT a.* , c.* , u.* , ci.title AS city FROM cars c INNER JOIN adds a ON a.car_id=c.id 
                                             INNER JOIN users u ON a.user_id=u.id 
                                            INNER JOIN  cities ci ON ci.id=u.city_id
                       WHERE a.id=? AND a.user_id=?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id, $user_id]);
//preverim, da obstaja oglas s temi pogoji v bazi
if ($stmt->rowCount() != 1) {
    header("Location: adds.php"); die();
}

$row = $stmt->fetch();
?>

<h1>Ogled oglasa</h1>
<div class="row gtr-200">
    <div class="col-6 col-12-medium">
        <h2>Podatki</h2>
        <div class="table-wrapper">
            <table>
                <tbody>
                <tr>
                    <td><strong>Znamka</strong></td>
                    <td><?php echo $row['brand']; ?></td>
                </tr>
                <tr>
                    <td><strong>Model</strong></td>
                    <td><?php echo $row['model']; ?></td>
                </tr>
                <tr>
                    <td><strong>Kilometri</strong></td>
                    <td><?php echo $row['km']; ?></td>
                </tr>
                <tr>
                    <td><strong>Kilovati</strong></td>
                    <td><?php echo $row['kw']; ?></td>
                </tr>
                <tr>
                    <td><strong>Prostornina</strong></td>
                    <td><?php echo $row['ccm']; ?></td>
                </tr>
                <tr>
                    <td><strong>Gorivo</strong></td>
                    <td><?php echo $row['fuel']; ?></td>
                </tr>
                <tr>
                    <td><strong>Letnik</strong></td>
                    <td><?php echo $row['year']; ?></td>
                </tr>
                <tr>
                    <td><strong>Cena</strong></td>
                    <td><?php echo $row['price']; ?></td>
                </tr>

                </tbody>
            </table>
        </div>
        <h2>Podatki o prodajalcu</h2>
        <div class="table-wrapper">
            <table>
                <tbody>
                <tr>
                    <td><strong>Ime in Priimek</strong></td>
                    <td><?php echo $row['first_name'].' '.$row['last_name']; ?></td>
                </tr>
                <tr>
                    <td><strong>E-pošta</strong></td>
                    <td><?php echo $row['email']; ?></td>
                </tr>
                <tr>
                    <td><strong>Telefon</strong></td>
                    <td><?php echo $row['phone']; ?></td>
                </tr>
                <tr>
                    <td><strong>Kraj</strong></td>
                    <td><?php echo $row['city']; ?></td>
                </tr>


                </tbody>
            </table>
        </div>
    </div>
    <div class="col-6 col-12-medium">
        <h2>Slike</h2>
        <div class="box alt">
            <div class="row gtr-50 gtr-uniform">

                <?php
                $query ="SELECT * FROM images WHERE car_id=?";
                $stmt =$pdo->prepare($query);
                $stmt->execute([$row['car_id']]);

                while ($image = $stmt->fetch()){
                    echo '<div class="col-4">';
                    echo '<span class="image fit">';
                    echo '<img src="'.$image['url'].'" alt="" />';
                    echo '</span>';
                    echo '</div>';
                }
                ?>




            </div>
        </div>


    </div>
</div>


<?php
include_once 'footer.php';
?>
