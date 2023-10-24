<!-- <?php
    require_once 'connect.php';
    $conn = new Connect();
    $db_link = $conn->connectToPDO();
    if(isset($_GET['sid'])):
        $value = $_GET['sid'];
        $sqlSelect = "DELETE FROM `supplier` WHERE `supID` = ?";
        $stmt = $db_link->prepare($sqlSelect);
        $execute = $stmt->execute(array("$value"));
        if($execute){
            header("Location: SupManagement.php");
        }else{
            echo "Failed ".$execute;
        }
    endif;
?> -->
