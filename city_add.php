<?php
include_once 'header.php'
admin_only();
?>

    <h1>Vnos kraja</h1>

    <form action="city_insert.php" method="post">
        <div class="row gtr-uniform">
            <div class="col-12">
                <input type="text" name="title" placeholder="Vnesi ime kraja" required = "required"/>
            </div>
            <div class="col-12">
                <input type="text" name="post_number" placeholder="Vnesi poštno številko"/>
            </div>
            <div>
                <input type="submit" value="Shrani" class="primary"/>
            </div>
        </div>
    </form>


<?php
include_once 'footer.php'
?>