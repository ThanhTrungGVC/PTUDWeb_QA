<?php
	## import connect.php
	include "database/connect.php";

    $ss_id= $_POST["ss_id"];
    $password = $_POST["password"];

    $sql = "SELECT `ss_pass` FROM `sessions` WHERE `ss_id`='$ss_id'";
    $result = $conn->query($sql);
    $row = $result->fetch_array();
    $ss_pass = $row['ss_pass'];
    if ($password == $ss_pass) {
        header("Location: session_detail.php?ss_id=$ss_id");
    } else {
        echo "<script>
                alert('Mật khẩu sai!');
                window.history.back();
            </script>";
    }
    

?>