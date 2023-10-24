<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Snack Shop</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
         crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" 
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
         integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <meta name="viewport"
        content ="width:device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer">
    </head>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a href= "https://www.facebook.com/nguyetcan.tran.357/" class="navbar-brand">
        <img src="../images/123.jpg" alt="" width="80px" height="80px">
        </a> 
       thiết kế logo để quay lại trang chủ dùng "index.php"-->
       <!-- <button class="navbar-toggler" type ="button" data-bs-toggle="collapse" 
        data-bs-target="#navbarMain">
            <span class="navbar-toggler-icon"></span>
            <style>
                .dropdown:hover .dropdown-menu{
                    display: block;
                }
            </style>
        </button>
         thao tác sổ xuống--> 
         <!-- <div class="collapse navbar-collapse" id="navbarMain">
            <div class="navbar-nav">
                <a class="nav-link active" href="#">Home</a>
                <a class="nav-link" href="#">Cart</a>
                <div class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Shop</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Candy</a>
                        <a class="dropdown-item" href="#">Snack</a>
                        <a class="dropdown-item" href="#">Drink</a>
                    </div>
                </div>
            </div>
            <div class="navbar-nav ms-auto">
                <a href="" class="nav-item nav-link">Welcome to Snack Shop</a>
                <a href="Logout.html" class="nav-item nav-link">Logout</a>
            </div>
        </div>
    </div>
</nav> --> 
<body>
    <?php
        include_once 'header.php';
    ?>
    <div class="container">
        <h2 style="text-align: center; ">Toys Store</h2>
        <div class="row">
                <div class="row d-flex justify-content-center align-items-center p-3">
                    <div class="col-md-8">
                        <div class="search">
                            <i class="fa fa-search cus-fa"></i>
                            <form class="example1" action="Search.php">     
                                <input type="text" class="form-control" placeholder="Search..."  name="search">
                                <button class="btn btn-primary" name="btnSearch">Search</button>
                            </form>  
                        </div>
                    </div>
                </div> 
                <?php
                include_once 'connect.php';
                $c = new Connect();
                $dblink = $c->connectToMySQL();
                $sql = "SELECT * FROM toys";
                // <1>
                $re = $dblink->query($sql);//query con trỏ chuột ở vị trí đầu tiên
                // $row1 = $re->fetch_row();// fetch_row Thứ tự cột trong dữ liệu
                // echo $row1[5];
                // echo "<br>";
                // $re->data_seek(0);//data_seek di chuyển con trỏ lại vị trí ban đầu
                if($re->num_rows>0):
                    while($row=$re->fetch_assoc()):// fetch_assoc dựa trên tên cột dữ liệu
                ?>
                <div class="col-md-4 pb-3">
                    <div class="card">
                        <img
                        src="./images/<?=$row['toyImages']?>" class="card-img-top"
                        alt="Toys1>" style="margin: auto;
                        width: 200px; bottom:auto;"/>
                        <div class="card-body" style="color:black;">
                        <a href="detail1.php?id=<?=$row['toyID']?>" class="text-decoration-none"><h5 class="card-title" style="color: black;">
                            <?=$row['toyName']?>
                        </h5></a>
                        <h6 class="card-subtitle mb-2" style="color: red;"><span></span><?=$row['ToyPrice']?></h6>
                        <!-- <a href="cart.php" class="btn btn-primary">Add to Cart</a> -->
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            else:
                echo "Not found";
            endif;
            ?>
        </div>
    </div>
</body>
<?php
    include_once 'footer.php';
?>