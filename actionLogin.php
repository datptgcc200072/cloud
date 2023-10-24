<?php
        include_once("connect.php");
        session_start();

        if (isset($_POST['btnLogin'])) {
            if (isset($_POST['pass']) && isset($_POST['email'])) {
                // echo $pass = $_POST['pass'];
                // echo $email = $_POST['email'];
                $c = new Connect();
                $dblink = $c->connectToPDO();
                $sql = "SELECT * FROM staff WHERE email = ? and password = ?";
                $stmt = $dblink->prepare($sql);
                $re = $stmt->execute(array("$email", "$pass"));
                $numrow = $stmt->rowCount();
                $row = $stmt->fetch(PDO::FETCH_BOTH);
                if ($numrow == 1) {
                    // echo "Login successfully";
                    setcookie("cc_username", $row['fullname'], time() + 3600);
                    setcookie("cc_id", $row['id'], time() + 3600);
                    $_SESSION['id'] =  $row['id'];
                    echo $_SESSION['id'];
                    header("Location: index.php");
            //     } else {
            //         echo "Something wrong with your info<br>";
            //     }
            // } else {
            //     echo "Please enter your info";
            // }
        }
    }
}