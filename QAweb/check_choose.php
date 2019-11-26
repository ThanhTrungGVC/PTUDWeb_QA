<?php
    /*
    * Xoa Du lieu
    *
    */
    session_start();
    # import connect database
        include "database/connect.php";
        if (isset($_SESSION['us_id'])){
        $us_id = $_SESSION['us_id'];
        }
        else{
            //Kiểm tra xem IP có phải là từ Share Internet
            if (!empty($_SERVER['HTTP_CLIENT_IP']))     
            {  
                $us_id = $_SERVER['HTTP_CLIENT_IP'];  
            }  
            //Kiểm tra xem IP có phải là từ Proxy  
            elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))    
            {  
                $us_id = $_SERVER['HTTP_X_FORWARDED_FOR'];  
            }  
            //Kiểm tra xem IP có phải là từ Remote Address  
            else  
            {  
                $us_id = $_SERVER['REMOTE_ADDR'];  
            }
        }

    # delete question
        if (isset($_POST['submit'])) {
            $check=$_POST['check'];

            $sql = "SELECT `survey_id`,`choose_id` FROM `survey_detail` WHERE `choose_title`= '$check'";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $choose_id = $row['choose_id'];
            $survey_id = $row['survey_id'];

            $sql2 = "SELECT * FROM `user_choose` WHERE `user_id`='$us_id'AND`survey_id`='$survey_id'";
            $result2 = $conn->query($sql2);

            if ($result2->num_rows > 0) {
                $row2 = $result2->fetch_assoc();
                if ($choose_id != $row2['choose_id']) {
                    $sql3 = "UPDATE `user_choose` SET `choose_id`='$choose_id' WHERE `survey_id`='$survey_id'";
                    $result3 = $conn->query($sql3);
                    echo 'ok2'."\t";
                    $choose_old = $row2['choose_id'];
                    $sql4 = "UPDATE `survey_detail` SET `num_choose`=`num_choose`-1 WHERE `choose_id`='$choose_old' AND `survey_id`='$survey_id'";
                    $result4 = $conn->query($sql4);
                    $sql5 = "UPDATE `survey_detail` SET `num_choose`=`num_choose`+1 WHERE `choose_id`='$choose_id' AND `survey_id`='$survey_id'";
                    $result5 = $conn->query($sql5);
                    if ($result5) {
                        echo "<script type='text/javascript'>                               
                                alert('Chọn thành công!');
                                window.history.back();
                            </script>";
                    }
                }
                else{
                    echo "<script type='text/javascript'>                               
                                alert('Đáp án này đã chọn rồi!');
                                window.history.back();
                            </script>";
                }           
            }
            else{
                $sql6 = "INSERT INTO `user_choose`(`stt`, `user_id`, `survey_id`, `choose_id`) VALUES (NULL, '$us_id', '$survey_id', '$choose_id')";
                $result6 = $conn->query($sql6);
                $sql7 = "UPDATE `survey_detail` SET `num_choose`=`num_choose`+1 WHERE `choose_id`='$choose_id' AND `survey_id`='$survey_id'";
                $result7 = $conn->query($sql7);
                if ($result7) {
                    echo "<script type='text/javascript'>                               
                            alert('Chọn thành công!');
                            window.history.back();
                        </script>";
                }
            }
            

        }

?>