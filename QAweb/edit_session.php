<?php
include "database/connect.php";
if (isset($_POST['btn_create_ss'])) {
    # get input
    $id = $_POST['id'];
    $input_describe = $_POST['describe_in'];
    $input_time_start = $_POST['time_start_in'];
    $input_time_end = $_POST['time_end_in'];
    $input_pass = $_POST['pass_in'];

    # create time insert
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timestamp = date('Y-m-d H:i');

    if($input_time_end < $input_time_start) {
        
        // header("Location:/QAweb/teacher/session_detail.php?ss_id=$id");
        echo "<script>
                window.location='/QAweb/teacher/session_detail.php?ss_id=$id';
                result = alert('Thời gian kết thúc sớm hơn thời gian bắt đầu!');
            </script>";
    }
    elseif($input_time_start > $timestamp){
        $status = "open";
        $sql = "UPDATE `sessions` SET `ss_describe`='$input_describe', `time_start`='$input_time_start',`time_end`='$input_time_end',`ss_pass`='$input_pass',`ss_status`='$status' WHERE `ss_id`='$id' ";
        $result = $conn->query($sql);
        echo "<script>
                window.location='/QAweb/teacher/session_detail.php?ss_id=$id';
                result = alert('Thay đổi thành công!');
            </script>";
    }
    else{
        $status = "action";
        $sql = "UPDATE `sessions` SET `ss_describe`='$input_describe', `time_start`='$input_time_start',`time_end`='$input_time_end',`ss_pass`='$input_pass',`ss_status`='$status' WHERE `ss_id`='$id' ";
        $result = $conn->query($sql);
        echo "<script>
                window.location='/QAweb/teacher/session_detail.php?ss_id=$id';
                result = alert('Thay đổi thành công!');
            </script>";
    }

    
}

if (isset($_POST['edit_question'])) {
    # get input
    $ss_id = $_POST['ss_id'];
    $question_content = $_POST['question_content'];
    $question_id = $_POST['question_id'];

    $sql = "UPDATE `questions` SET `content`='$question_content' WHERE `question_id`='$question_id'";
    $result = $conn->query($sql);
    if($result){
        echo "<script>
                window.location='/QAweb/teacher/session_detail.php?ss_id=$ss_id';
                result = alert('Thay đổi thành công!');
            </script>";
    }    
}

if (isset($_POST['edit_comment'])) {
    # get input
    $ss_id = $_POST['ss_id'];
    $comment_content = $_POST['comment_content'];
    $comment_id = $_POST['comment_id'];

    $sql = "UPDATE `comments` SET `content`='$comment_content' WHERE `cmt_id`='$comment_id'";
    $result = $conn->query($sql);
    if($result){
        echo "<script>
                window.location='/QAweb/teacher/session_detail.php?ss_id=$ss_id';
                result = alert('Thay đổi thành công!');
            </script>";
    }    
}

if (isset($_POST['edit_question1'])) {
    # get input
    $ss_id = $_POST['ss_id'];
    $question_content = $_POST['question_content'];
    $question_id = $_POST['question_id'];

    $sql = "UPDATE `questions` SET `content`='$question_content' WHERE `question_id`='$question_id'";
    $result = $conn->query($sql);
    if($result){
        echo "<script>
                window.location='/QAweb/session_detail.php?ss_id=$ss_id';
                result = alert('Thay đổi thành công!');
            </script>";
    }    
}

if (isset($_POST['edit_comment1'])) {
    # get input
    $ss_id = $_POST['ss_id'];
    $comment_content = $_POST['comment_content'];
    $comment_id = $_POST['comment_id'];

    $sql = "UPDATE `comments` SET `content`='$comment_content' WHERE `cmt_id`='$comment_id'";
    $result = $conn->query($sql);
    if($result){
        echo "<script>
                window.location='/QAweb/session_detail.php?ss_id=$ss_id';
                result = alert('Thay đổi thành công!');
            </script>";
    }    
}
?>