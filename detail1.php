<?php 
include_once 'header.php';       
?>
<div class="container px-4 py-5">
    <?php
    if(isset($_GET['id'])):
        $ID = $_GET['id'];
        require_once 'connect.php';
        $conn = new Connect();
        $db_link = $conn->connectToPDO();
        $sql = "SELECT * FROM toys WHERE toyID  = ?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($ID));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
    <h2><?=$re['toyName']?></h2>
    <ul style="list-style-type:none ;" class="list-group">
            Price: <li class="list-group-item"><?=$re['ToyPrice']?></li>
            <!-- Quantity: <li class ="list-group-item"><?=$re['pQuantity']?></li> -->
            Description: <li class ="list-group-item"><?=$re['Description']?></li>
    </ul>
    <form action="" method="GET">
        <div class="col-lg-9">
            <input type="hidden" name="pid" value="<?=$ID?>">
            <input type="submit" class="btn btn-primary shop-button"
            name="btnAdd" value="Add to cart"/>
    </form>
<?php
    else:
?>
<h2>Nothing to show</h2>
<?php
    endif;
?>
</div>
<?php
    include_once 'footer.php';
?>
