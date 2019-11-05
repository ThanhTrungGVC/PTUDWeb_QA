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

    // get info techer post
    if (isset($_POST['btn_create_ss'])) {
        # get input
        $input_title = $_POST['title_in'];
        $input_describe = $_POST['describe_in'];
        $input_time_start = $_POST['time_start_in'];
        $input_time_end = $_POST['time_end_in'];
        $input_pass = $_POST['pass_in'];

        # check input null


        # create time insert
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timestamp = date('Y-m-d H:i:s');
        // echo $timestamp;

        # cteate status sesion
        if($timestamp < $input_time_start) {
            $status = "open";
        } elseif ($timestamp >= $input_time_start AND $timestamp <= $input_time_end) {
            $status = "action";
        } elseif ($timestamp > $input_time_end) {
            $status = "close";
        }
        
        # get info teacher
        $us_create = $_SESSION['us_id'];
        // echo $us_create;
        
        $sql = "INSERT INTO sessions 
                VALUES (NULL ,'$us_create', '$input_title', '$input_describe', '$timestamp' , '$input_time_start', '$input_time_end', '$input_pass', '$status')";
        $result = $conn->query($sql);

        if (!$result) {
            // die
            die("Error create session. Try again!") ;
        } else{
            // success
            #echo "Create sesion success!";
        }
    }

?>