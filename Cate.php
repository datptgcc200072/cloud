<?php
    include_once 'header.php';
?>
        <br><br>
        <h2>Snack-Shop</h2>
        <div class="row">
    <?php
        include_once 'connect.php';
        $c = new Connect();
        $dblink = $c->connectToPDO();
        $Cat_id = $_GET['Cat_id'];
        $sql = "SELECT * FROM category c, product p WHERE c.Cat_id=p.pCat_id AND Cat_id=?";
        $result = $dblink->prepare($sql);
        $result->execute(array("$Cat_id"));
        $row = $result->fetchAll(PDO::FETCH_BOTH);
            foreach($row as $r):
    ?>

    <div class="col-md-3 pb-3"  style="">
        <div class="card" style="">
            <img src="images/<?=$r['pImage']?>" class="card-img-top" alt="Product1>" style="margin: auto; width: 200px;"/>
                <div class="card-body" style="position: absolute; top: 200px;">
                    <!-- id -->
                    <a href="detail1.php" class="text-decoration-none">
                    <h7 class="" style="color:black;"> <?=$r['pName']?> </h7></a>
                    <h6 class="card-subtitle mb-2 text-muted">
                        <div style="color:red; font-size: larger;"><?=$r['pPrice']?><span>&#8363;</span> </div></h6>
                </div>
        </div>
    </div>
    <?php
        endforeach;
    ?>
</div>