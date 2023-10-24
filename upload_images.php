<?php
session_start();
include_once 'header.php';
include_once 'connect.php';

if (isset($_POST['btnSubmit'])) {
    $ID = $_POST['ID'];
    $Name = $_POST['Name'];
    $Price = $_POST['Price'];
    $Des = $_POST['Des'];
    $cid = $_POST['Cat'];
    $sid = $_POST['Sup'];
    $img = str_replace(' ', '-', $_FILES['Toy_image']['name']); //tùy chỉnh hình ảnh
    $staffID = $_SESSION['id'];
    $storedImange = "./images/"; //đường dẫn lưu hình ảnh

    $flag = move_uploaded_file($_FILES['Toy_image']['tmp_name'], $storedImange . $img); //lưu hình vào upload vào trong project
    if ($flag) {
        $c = new Connect();
        $dblink = $c->connectToPDO(); //connectToMySQL();
        // $namep = $_GET['search'];//DÙng đối với PDO
        $sql = "INSERT INTO `toys`(`toyID`, `toyName`, `ToyPrice`, `Description`, `id`, `Cat_id`, `supID`, `toyImages`) 
        VALUES (?,?,?,?,?,?,?,?)"; //CONCAT('%',:namep,'%')'%..%' là thể hiện sự tìm kiếm
        // <1>
        $re = $dblink->prepare($sql); //query con trỏ chuột ở vị trí đầu tiên //prepare trong tìm kiếm: chuẩn bị
        // $re->bindParam(':namep',$namep, PDO::PARAM_STR);
        // $re->execute();//Chỉ dùng cho bindParam
        $stmt = $re->execute(array($ID, $Name, $Price, $Des, $staffID, $cid, $sid, "$img"));
        if ($stmt == TRUE) {
            echo "Congrats!";
        } else {
            echo "Failed!!!";
        }
    }
}
?>
<div id="main" class="container mt-4">
    <form class="form form-vertical" method="POST" enctype="multipart/form-data"> <!--upload được file cần có enctype -->
        <div class="form-body">
            <div class="row">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script>
                    $(document).ready(function() {
                        var delayTimer;
                        $('#id_input').on('input', function() {
                            clearTimeout(delayTimer);
                            var id = $(this).val(); // Lấy giá trị ID từ input
                            delayTimer = setTimeout(function() {
                                $.ajax({
                                    url: 'checkid.php', // Tên tệp PHP xử lý kiểm tra ID
                                    method: 'POST',
                                    data: {
                                        id: id
                                    },
                                    success: function(response, status, xhr) {
                                        console.log(response);
                                        if (response == 'duplicate') {
                                            $('#error_message').text('ID already exists'); // Hiển thị thông báo lỗi
                                        } else {
                                            $('#error_message').text(''); // Xóa thông báo lỗi nếu ID hợp lệ
                                        }
                                    },
                                    error: function(reponse) {
                                        console.log("false cmnr");
                                    }
                                });
                            }, 500); // Thời gian trễ (ms) trước khi gửi yêu cầu AJAX
                        });
                    });
                </script>
                <div class="col-12">
                    <div class="form-group">
                        <label for="image-vertical">Image</label>
                        <input type="file" name="Toy_image" id="Toy_image" class="form-control" value="">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">ID</label>
                    <input type="text" class="form-control" name="ID" id="id_input" placeholder="ID">
                    <div id="error_message"></div>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control" name="Name" id="exampleFormControlInput1" placeholder="Name">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Price</label>
                    <input type="text" class="form-control" name="Price" id="exampleFormControlInput1" placeholder="Price">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Description</label>
                    <input type="text" class="form-control" name="Des" id="exampleFormControlInput1" placeholder="Des">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Category</label>
                    <input type="text" class="form-control" name="Cat" id="exampleFormControlInput1" placeholder="Cat">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Supplier</label>
                    <input type="text" class="form-control" name="Sup" id="exampleFormControlInput1" placeholder="Sup">
                </div>
                <div class="col-12 d-flex mt-3 justify-content-center">
                    <button type="submit" class="btn btn-warning me-1 mb-1 rounded-pill" name="btnSubmit">Submit</button>
                </div>
            </div>
        </div>
    </form>
</div>