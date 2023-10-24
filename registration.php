<!-- <!DOCTYPE html>
<html>
    <head>
        <title>Lam Bao Anh</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
         integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" 
         crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" 
        integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" 
        crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
         integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" 
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <meta name="viewport"content ="width:device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" 
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" 
        crossorigin="anonymous" referrerpolicy="no-referrer">
        <link rel="stylesheet" href="../css/hp.css">
    </head> -->
     <!--  -->
    

        <?php
        include_once 'header.php';
        include_once 'connect.php';
        if(isset($_POST['register'])){
            $gender = $_POST['gender'];
            $fullname = $_POST['username'];
            $password = $_POST['pass'];
            $email = $_POST['email'];
            $phone = $_POST['phone'];
            $dateBirthday = date('Y-m-d', strtotime($_POST['txtBrith']));
            $c = new Connect();
            $dblink = $c->connectToPDO(); //connectToMySQL();
            // $namep = $_GET['search'];//DÙng đối với PDO
            $sql = "INSERT INTO `users`(`email`, `fullname`, `gender`, 
            `address`, `password`, `role`, `phone`, `birthday`) VALUES (?,?,?,?,?,?,?,?)"; //CONCAT('%',:namep,'%')'%..%' là thể hiện sự tìm kiếm
            // <1>
            $re = $dblink->prepare($sql);//query con trỏ chuột ở vị trí đầu tiên //prepare trong tìm kiếm: chuẩn bị
            // $re->bindParam(':namep',$namep, PDO::PARAM_STR);
            // $re->execute();//Chỉ dùng cho bindParam
            $stmt = $re->execute(array("$email","$fullname", $gender,"CanTho",
            "$password","user","$phone","$dateBirthday"));
            if($stmt == TRUE){
                echo "Congrats!";
            }else{
                echo "Failed!!!";
            }

        }
        ?>
            <!-- <div class="container-fluid">
                <h2>Member Registration</h2> -->
                <form action="" id="form1" method="post" class="needs-validation">
                <?php
                    if(isset($_POST['register'])){
                     if(isset($_POST['username']) && isset($_POST['pass'])
                     && isset($_POST['password']) && isset($_POST['phone']) && isset($_POST['email']) 
                     && isset($_POST['gender']) && isset($_POST['country']) && isset($_POST['txtBirth']))
                     {
                         $username = htmlspecialchars($_POST['username']);
                         $pass = htmlspecialchars($_POST['pass']);
                         $password = htmlspecialchars($_POST['password']);
                         $phone = htmlspecialchars($_POST['phone']);
                         $email = htmlspecialchars($_POST['email']);
                         $gender = htmlspecialchars($_POST['gender']);
                         $country = htmlspecialchars($_POST['country']);
                         $txtBirth = htmlspecialchars($_POST['txtBirth']);
                            $result = "$username - $pass - $password - $phone - $email - $gender - $country - $txtBirth";
                     }
                 }
                    ?>
                    <?php
if (isset($_POST['register']))
{
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
                    <p style="color:Orange"><?php echo $result ?? "" ?></p> 
                    <form action="" method="POST">
                        <div class="row pb-3">
                       <label for="username" class="col-md-2 col-form-label">
                        Username(*): 
                       </label>
                       <div class="col-md-10">
                        <input type="text" name="username" id="username" required class="form-control">
                       </div>
                    </div>
                        <div class="row pb-3">
                        <label for="pass" class="col-md-2 col-form-label">
                            Password(*):
                        </label>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="pass" name="pass" value="">
                            <label for="floatingInput">Password</label>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <label for="password" class="col-md-2 col-form-label">
                            Confirm Password(*):
                        </label>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="password" name="password" value="">
                            <label for="floatingInput">Password</label>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <label for="phone" class="col-md-2 col-form-label">
                            Phone(*):
                        </label>
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control" id="phone" name="phone" value="">
                            <label for="floatingInput">Phone</label>
                        </div>
                    </div>
                    <div class="row pb-3">
                        <label for="email" class="col-md-2 col-form-label">
                            Email(*):
                        </label>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="email" name="email" value="">
                            <label for="floatingInput">Email</label>
                        </div>
                    </div>
                        <label for="gender" class="col-md-2 col-form-label">
                            Gender(*):
                        </label>
                        <div class="col-md-10 d-flex">
                            <div class="form-check">
                                <input type="radio" name="gender" id="maleRadio" checked class="form-check-input" value="0">
                                <label for="maleRadio"class="form-check-label">Male</label>
                            </div>
                            <div class="form-check mx-5">
                                <input type="radio" name="gender" id="FemaleRadio" class="form-check-input" value="Female">
                                <label for="FemaleRadio"class="form-check-label">Female</label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="gender" id="OtherRadio" class="form-check-input" value ="Other">
                                <label for="OtherRadio"class="form-check-label">Other</label>
                            </div>      
                    </div>
                       <div class="row pb-3">
                        <label for="country" class="col-md-2 col-form-label">
                            Country(*):
                        </label>
                        <div class="col-md-10">
                            <select id="country" class="form-select" name = "country">
                                <option selected>
                                    Choose your country
                                </option>
                                <option value="Vietnam">Vietnam</option>
                                <option value="UK">UK</option>
                                <option value="English">England</option>
                            </select>
                        </div>
                    </div>
                        <div class="row pb-3">
                    <label for="birthday" class="col-md-2 col-form-label">
                            Date of Birthday(*):
                    </label>
                            <div class="col-md-10">
                        <input type="date" name="txtBirth" id="birthday" required class="form-control">
                    </div>
                    </div>
                       <div class="row pb-3">
                    <div class="col-md-10 ms-auto" style="text-align: left;">
                        <input type="submit" value="Register" class="btn btn-primary" name="register" id="register">
                    </div>
                    </div>
                    
                </form>
            </div> 
         </body>
    </html> 
 <?php
    include_once 'footer.php';
    ?> 