<?php

    /*
    *   TẠO MỚI PHIÊN HỎI ĐÁP
    *       - check tài khoản giáo viên
    *       - khởi tạo phiên hỏi đáp theo các tham số
    */

    ## start session
        session_start();

    ## cookie


    ## import connect to database
        include_once __DIR__. "/../database/connect.php";

    # create time insert
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timestamp = date('Y-m-d H:i:s');
    // echo $timestamp;

    # check input null

    
    # get info teacher
    $ss_id = $_GET['ss_id'];

    # cteate status sesion
    $status = "action";

    // get info techer post
    if (isset($_POST['submit'])) {
        # get input
        $optionsArr = $_POST['options'];
        $content = $_POST['content'];

        if(!empty($optionsArr)){
            //database insert query goes here
            $sql= "INSERT INTO `survey`
            VALUES (NULL ,'$ss_id', '$content', '$timestamp' , '$timestamp', '$status')";
            $result = $conn->query($sql);

            $sql2 = "SELECT `survey_id`, `ss_id`, `survey_describe`, `start_time_survey`, `close_time_survey`, `survey_status` FROM `survey` WHERE `survey_describe`= '$content'";
            $result2 = $conn->query($sql2);
            $row2 = $result2->fetch_assoc();
            $survey_id = $row2['survey_id'];
            
            for($i = 0; $i < count($optionsArr); $i++){
                if(!empty($optionsArr[$i])){
                    //database insert query goes here
                    $options = $optionsArr[$i];                    
                    $sql1 = "INSERT INTO `survey_detail`
                            VALUES (NULL ,'$survey_id', '$options', 0)";
                    
                    $result1 = $conn->query($sql1);
                }
            }
            header("Location: survey_session.php?ss_id=$ss_id");
        }

        if (!$result) {
            // die
            die("Error create session. Try again!") ;
        } else{
            // success
            #echo "Create sesion success!";
        }
    }

?>