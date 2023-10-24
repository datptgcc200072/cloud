<?php

$id = $_POST['id'];
include_once 'connect.php';

$c = new Connect();
$dblink = $c->connectToPDO(); //connectToMySQL();
$sql = "select * from toys where toyID = ?";
$stmt = $dblink->prepare($sql); 
$re = $stmt->execute(array($id));
$numrow = $stmt->rowCount();
$row = $stmt->fetch(PDO::FETCH_BOTH);
if($numrow == 1){
    echo 'duplicate';
}
else
{ echo 'No duicate';}
