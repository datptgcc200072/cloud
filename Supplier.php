<?php
ob_start();
include_once 'header.php';
?>
<body>
<!-- Sidebar -->
<!-- div content -->
    <div id="main" class="container">     
        <div className="page-heading pb-2 mt-4 mb-2 ">
        <h1>Product Supplier</h1>
        </div>
        <?php
           //put your code here
           require_once 'connect.php';
    $conn = new Connect();
    $db_link = $conn->connectToPDO();
    if(isset($_GET['sid'])):
        $value = $_GET['sid'];
        $sqlSelect = "SELECT * FROM `supplier` WHERE supID = ?";
        $stmt = $db_link->prepare($sqlSelect);
        $stmt->execute(array("$value"));
        if($stmt->rowCount()>0):
            $re = $stmt->fetch(PDO::FETCH_ASSOC);
            $supName = $re['supName'];      
        endif;
    endif;
    if(isset($_POST['txtID'])&& isset($_POST['txtName'])):
        $sid = $_POST['txtID'];
        $sname = $_POST['txtName'];
        $sphone = $_POST['txtPhone'];
        $address = $_POST['txtAddress'];
        // $cdes = $_POST['txtDes'];
        if(isset($_POST['btnAdd'])):
        //    echo $sid;
        //    echo $sname;
        //    echo $sphone;
        //    echo $address; 
            $sqlInsert = "INSERT INTO `supplier` (`supID`, `supName`, `PhoneNumber`, `Address`) VALUES (?, ?, ?, ?);";
            $stmt = $db_link->prepare($sqlInsert);
            $execute = $stmt->execute(array("$sid", "$sname", "$sphone", "$address"));
            if($execute){
                header("Location: SupManagement.php");
            }else{
                echo"Failed".$execute;
            }
        else:
            $sqlUpdate = "UPDATE `supplier` SET `supID`= ?,`supName`= ?,`PhoneNumber`= ?,`Address`=? WHERE 1 `SupID` =?";
            $stmt = $db_link->prepare($sqlUpdate);
            $execute = $stmt->execute(array("$sid","$sname","$sid"));
            if($execute){
                header("Location: SupManagement.php");
            }else{
                echo "Failed".$execute;
            }
        endif;
    endif;  
    ob_end_flush();
        ?>
        <form id="form1" name="form1" method="post" action="" class="form-horizontal" role="form">
            <div class="form-group pb-3">
                    <label for="txtTen" class="col-sm-2 control-label">Supplier ID(*):  </label>
                    <div class="col-sm-10">
                            <input type="text" name="txtID" id="txtID" class="form-control" placeholder="Supplier ID"
                             value='<?php echo isset($_GET["sid"])?($_GET["sid"]):"";?>'>
                    </div>
            </div>	
            <div class="form-group pb-3">
                    <label for="txtTen" class="col-sm-2 control-label">Supplier Name(*):  </label>
                    <div class="col-sm-10">
                            <input type="text" name="txtName" id="txtName" class="form-control" placeholder="Supplier Name" 
                            value="<?php echo isset($supName)?($supName):"";?>">
                    </div>
            </div>
            <div class="form-group pb-3">
                    <label for="txtPhone" class="col-sm-2 control-label">PhoneNumber(*):  </label>
                    <div class="col-sm-10">
                            <input type="text" name="txtPhone" id="txtPhone" class="form-control" placeholder="PhoneNumber" 
                            value="<?php echo isset($PhoneNumber)?($PhoneNumber):"";?>">
                    </div>
            </div>
            <div class="form-group pb-3">
                    <label for="txtAddress" class="col-sm-2 control-label">Address(*):  </label>
                    <div class="col-sm-10">
                            <input type="text" name="txtAddress" id="txtAddress" class="form-control" placeholder="Address" 
                            value="<?php echo isset($Address)?($Address):"";?>">
                    </div>
            </div>
            
            
            <div class="form-group pb-3">
                <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit"  class="btn btn-primary" name="<?php echo isset($_GET["sid"])?"btnEdit":"btnAdd"; ?>"
                         id="btnAction" value='<?php echo isset($_GET["sid"])?"Edit":"Add new"; ?>'/>
                        <input type="button" class="btn btn-primary" name="btnIgnore"  id="btnIgnore" value="Back to list" onclick="window.location.href='SupManagement.php'" />
                </div>
            </div>
        </form>
    </div> <!--main-->
</body>

</html>