<!DOCTYPE html> 
<html>
    <head>
        <title>Toys Store</title>
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
            <img src="../images/logo.jpg" alt="" width="100px" height="100px">
            </a>
            <!-- thiết kế logo để quay lại trang chủ dùng "index.php"-->
            <button class="navbar-toggler" type ="button" data-bs-toggle="collapse" 
            data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
                <style>
                    .dropdown:hover .dropdown-menu{
                        display: block;
                    }
                </style>
            </button>
             <!--thao tác sổ xuống-->
             <div class="collapse navbar-collapse justify-content-center" id="navbarMain">
                <div class="navbar-nav">
                    <a class="nav-link active" href="index.php">Home</a>
                    <!-- <a class="nav-link" href="cart.php">Cart</a> -->
                    <!-- <div class="dropdown">
                        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Manage</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">Candy</a>
                            <a class="dropdown-item" href="#">Snack</a>
                            <a class="dropdown-item" href="#">Drink</a>
                            <a class="dropdown-item" href="#">Combo</a>
                        </div>
                    </div> -->
                    <div class="dropdown">
                        <!-- <a href="./index.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Supplier</a> -->
                        <a class="nav-link active" href="./SupManagement.php">Supplier</a>
                        <!-- <div class="dropdown-menu">
                            <a class="dropdown-item" href="#">ID</a>
                            <a class="dropdown-item" href="#">Name</a>
                            <a class="dropdown-item" href="#">Phone</a>
                            <a class="dropdown-item" href="#">Address</a>
                            <a class="dropdown-item" href="#">Email</a>
                        </div> -->
                    </div>
                    <div class="dropdown">
                        <a class="nav-link active" href="./category_management.php">Manage Category</a>    
                        <div class="dropdown-menu">
                        <?php
                            include_once 'connect.php';
                            $c = new Connect();
                            $dblink = $c->connectToMySQL();
                            $sql = "SELECT * FROM toys INNER JOIN category c ON c.Cat_id = toys.Cat_id";
                            $re = $dblink->query($sql);
                            while($row = $re->fetch_row()):
                            ?>
                            <a class="dropdown-item" href="Cate.php?Cat_id=<?=$row[0]?>"><?=$row[1]?></a>
                           <?php
                           endwhile;
                           ?>
                        </div>
                    </div>
                        <a class="nav-link active" href="upload_images.php">Add</a>
                </div>
                <div class="navbar-nav ms-auto justify-content-center">
                    <?php
                        // if(isset($_SESSION['user_name'])):
                        if(isset($_COOKIE['cc_username'])):
                    ?>
                    <a href="" class="nav-item nav-link">Welcome,<?=$_COOKIE['cc_username']?></a>
                    <a href="logout.php" class="nav-item nav-link">Logout</a>   
                    <?php
                        else:
                    ?>
                    <a href="Login.php" class="nav-item nav-link">Login</a>
                    <a href="registration.php" class="nav-item nav-link">Register</a>
                    <?php
                    endif;
                    ?>
                    <?php
                    session_start();
                    ob_start();
                    ?>
                </div>
            </div>
    </nav>
    <body>
