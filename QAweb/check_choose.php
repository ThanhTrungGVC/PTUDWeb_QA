<?php
    /*
    * Xoa Du lieu
    *
    */
    session_start();
    # import connect database
        include "database/connect.php";
        $us_id = $_SESSION['us_id'];

    # delete question
        if (isset($_POST['submit'])) {
            $check=$_POST['check'];
            echo $check."\n";
            echo $us_id;
            $sql = "SELECT `choose_id` FROM `survey_detail` WHERE `choose_title`= '$check'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $choose_id = $row['choose_id'];
            echo $choose_id;

            $sql2 = "SELECT * FROM `user_choose` WHERE `user_id`='$us_id'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                echo 'ok1';
                if ($choose_id != $row2['choose_id']) {
                    $sql3 = "UPDATE `user_choose` SET `choose_id`='$choose_id' WHERE `user_id`='$us_id'";
                    $result3 = $conn->query($sql3);
                    echo 'ok2';
                    $choose_old = $row2['choose_id'];
                    $sql4 = "UPDATE `survey_detail` SET `num_choose`=`num_choose`-1 WHERE `choose_id`='$choose_old'";
                    $result4 = $conn->query($sql4);
                    $sql5 = "UPDATE `survey_detail` SET `num_choose`=`num_choose`+1 WHERE `choose_id`='$choose_id'";
                    $result5 = $conn->query($sql5);
                }                  
            }
            else{
                $sql6 = "INSERT INTO `user_choose`(`stt`, `user_id`, `choose_id`) VALUES (NULL, '$us_id', '$choose_id')";
                $result6 = $conn->query($sql6);
                echo 'ok3';
                $sql5 = "UPDATE `survey_detail` SET `num_choose`=`num_choose`+1 WHERE `choose_id`='$choose_id'";
                $result5 = $conn->query($sql5);
            }
            

        }

?>