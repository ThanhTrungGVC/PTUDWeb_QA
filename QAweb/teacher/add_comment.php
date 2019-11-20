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
        if(isset($_SESSION['us_id'])){
            $user_ids = $_SESSION['us_id'];
        }        

    # get question id
        if(isset($_GET['qs_id'])){
            $question_ids = $_GET['qs_id'];
        }

    # get session id
        if(isset($_GET['ss_id'])){
            $session_ids = $_GET['ss_id'];
        }
    
    # get data input
        if($_POST['comment']){
            $data_cmt = $_POST['comment'];
        }

    #query mysql
        if(isset($_GET['cmt_id'])){     // insert if teacher choose comment to answer 
            $cmt_ids = $_GET['cmt_id'];
            # get status
            if(isset($_GET['stt'])){            // nếu trạng thái xóa ==> xóa đáp án đúng
                $stt_i = $_GET['stt'];
                $sql = "DELETE FROM answers WHERE cmt_id = '$cmt_ids'";
            } else{                             // nếu trạng thái rỗng ==> add làm đáp án
                $sql = "INSERT INTO answers VALUES (NULL, '$question_ids', '$cmt_ids')";
            }
        } else{
            $sql = "INSERT INTO comments VALUES (NULL, '$question_ids', '$user_ids', '$data_cmt', '$timestamp', 0)";
        }
        
        $result = $conn->query($sql);

        if(!$result){
            die("Error to insert to database");
        } else{
            header ("Location: session_detail.php?ss_id=$session_ids");
        }
?>