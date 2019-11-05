<?php
    /*
    * CREATE COMMENT FOR QUESTION
    *
    */

    # start session
        session_start();

    # import conenct database
        include_once __DIR__."/../database/connect.php";

    # create time insert
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $timestamp = date('Y-m-d H:i:s');

    # get user id
        $user_ids = $_SESSION['us_id'];

    # get question id
        $question_ids = $_GET['qs_id'];

    # get session id
        $session_ids = $_GET['ss_id'];
    
    # get data input
        $data_cmt = $_POST['comment'];

    #query mysql
        $sql = "INSERT INTO comments VALUES (NULL, '$question_ids', '$user_ids', '$data_cmt', '$timestamp', 0)";
        $result = $conn->query($sql);

        if(!$result){
            die("Error to insert to database");
        } else{
            header ("Location: session_detail.php?ss_id=$session_ids");
        }
?>