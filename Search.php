<?php
include_once 'header.php';
?>

<?php
if (isset($_POST['register'])){
    $username = isset($_POST['username']) ? trim($_POST['username']) :'';
    $pass = isset($_POST['Pass']) ? trim($_POST['Pass']) :'';
    $password = isset($_POST['Password']) ? trim($_POST['Password']) :'';

    if (strlen($username) >= 30){
        echo "<p style= 'color:red'> You username must be less than 30.</p>";
    }
    if (strlen($pass) <5){
        echo "<p style= 'color:red'> You password must be greater than 5.</p>";
    }
    if ($pass != $password){
        echo "<p style= 'color:red'> Password and Confirm Password is wrong.</p>";
    }
    }
?> 

    <div class="container px-4 py-5"> 
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
 <!-- <div class="search">
 <div class="container">
   <div class="input-group">
     <span class="inputgroup"><i class="fa fa-search"></i></span>
             <input type="text" class="form-control" placeholder="Search">
      <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        <label for="floatingInput">Search</label>
  </div>
 </div>
 </div> -->
    <h2>All product</h2>
        <div class="row"> 
            <?php
                include_once 'connect.php';
                $c = new Connect();
                $dblink = $c->connectToPDO(); //connectToMySQL();
                $namet = $_GET['search'];//DÙng đối với PDO
                $sql = "SELECT * FROM toys WHERE toyName LIKE ?"; //CONCAT('%',:namep,'%')'%..%' là thể hiện sự tìm kiếm
                // <1>
                $re = $dblink->prepare($sql);//query con trỏ chuột ở vị trí đầu tiên //prepare trong tìm kiếm: chuẩn bị
                // $re->bindParam(':namep',$namep, PDO::PARAM_STR);
                // $re->execute();//Chỉ dùng cho bindParam
                $re->execute(array("%$namet%"));
                $rows = $re->fetchAll(PDO::FETCH_BOTH);
                foreach($rows as $r):
                // $row1 = $re->fetch_row();// fetch_row Thứ tự cột trong dữ liệu
                // echo $row1[5];
                // echo "<br>";
                // $re->data_seek(0);//data_seek di chuyển con trỏ lại vị trí ban đầu 
                // if($re->num_rows>0):
                // while($row=$re->fetch_assoc()):// fetch_assoc dựa trên tên cột dữ liệu
                ?> 
             <div class="col-md-4 pb-3">
                        <div class="card">
                            <img
                            src="images/<?=$r['toyImages']?>"
                            class="card-img-top"
                            alt="Product1>" style="margin: auto;
                            width: 300px;"
                            />
                            <div class="card-body">
                            <a href="detail.php?canid=<?=$r['toyID']?>" class="text-decoration-none"><h5 class="card-title">
                                <?=$r['toyName']?>
                            </h5></a>
                            <h6 class="card-subtitle mb-2 text-muted"><span></span><?=$r['ToyPrice']?></h6>
                            <a href="#" class="btn btn-primary">Add to Cart</a>
                            </div>
                        </div>
                </div> 
             <?php
                endforeach;
                // else:
                //     echo "Not found";
            
            ?>
                </div>
        </div>
    </html> 
    <!-- <?php
    include_once 'footer.php';
    ?> -->