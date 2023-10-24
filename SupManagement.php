<?php
include_once 'header.php';
?>
<body>
<!-- Sidebar -->
<!-- div content -->
    <div id="main" class="container">     
        <div className="page-heading pb-2 mt-4 mb-2 ">
        <h1>Product Supplier</h1>
        </div>
        <form name="frm" method="post" action="">
      
        <p>
       <a href="Supplier.php" class="text-decoration-none"> Add</a>
        </p>
        <table id="tablesupplier" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th><strong>Supplier ID</strong></th>
                    <th><strong>Supplier Name</strong></th>
                    <th><strong>Phone Number</strong></th>
                    <th><strong>Address</strong></th>
                    <th><strong>Edit</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
             </thead>
			<tbody>
            <?php
                //put your code here
            include_once 'connect.php';
                    $conn = new Connect();
                    $db_link = $conn->connectToMySQL();
                    $sql = "select * from supplier";
                    $re = $db_link->query($sql);
                    while ($row = $re->fetch_assoc()):
            ?>
		<tr>
        <td><?=$row['supID']?></td>
        <td><?=$row['supName']?></td>
        <td><?=$row['PhoneNumber']?></td>
        <td><?=$row['Address']?></td>
        <td style = 'text-align:center'><a href="Supplier.php?sid=<?=$row['supID']?>"
        class="text-decoration-none">Edit</a></td>
        <td style = 'text-align:center'><a href="DeleteSup.php?sid=<?=$row['supID']?>"
        class="text-decoration-none">Delete</a></td>
            </tr>
            <?php
                endwhile;
            ?>
			</tbody>
        </table>  
 </form>
    </div> <!--main-->
   
</body>

</html>