
<?php 
include_once 'header.php';       
?>
<div class="container px-4 py-5">
    <?php
    if(isset($_GET['id'])):
        $pID = $GET['id'];
        require_once 'connect.php';
        $conn = new Connect();
        $db_link = $comn->connectToPDO();
        $sql = "SELECT * FROM product WHERE PID  = ?";
        $stmt = $db_link->prepare($sql);
        $stmt->execute(array($pID));
        $re = $stmt->fetch(PDO::FETCH_BOTH);
    ?>
    <h2><?=$re['pName']?></h2>
    <div style="display:flex; font-weight:bold;">
    <div class="picture">
        <img scr="/images/<?=$re['pImage']?>" width="90%"/>
    </div>
    <ul style="list-style-type:none ;" class="list-group">
            Price: <li class="list-group-item"><?=$re['pPrice']?></li>
            Quantity: <li class ="list-group-item"><?=$re['pQuantity']?></li>
            Description: <li class ="list-group-item"><?=$re['pDesc']?></li>
   <hr>
    <from action="cart.php" method="GET">
        <div class="col-lg-9">
            <input type="hidden" name="pid" value="<?=$pid?>">
            <input type="submit" class="btn btn-primary shop-button"
            name="btnAdd" value="Add to cart"/>
        </div>
    </form>
    </ul>
</div>
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

