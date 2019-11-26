<?php
include "database/connect.php";

if (isset($_GET['ss_id']) && !isset($_GET['survey_id'])) {

    # create time insert
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timestamp = date('Y-m-d H:i');

    # get input
    $ss_id = $_GET['ss_id'];
    $sql = "UPDATE `sessions` SET `time_end`='$timestamp', `ss_status`='close' WHERE `ss_id`='$ss_id' ";
    $result = $conn->query($sql);
    if($result){
        echo "<script>
                window.location='/QAweb/teacher/';
                alert('Đã đóng phiên!');
            </script>";
    }    
}

if (isset($_GET['survey_id'])) {
    # create time insert
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timestamp = date('Y-m-d H:i');

    # get input
    $ss_id = $_GET['ss_id'];
    $survey_id = $_GET['survey_id'];
    $sql = "UPDATE `survey` SET `close_time_survey`='$timestamp',`survey_status`='close' WHERE `survey_id`='$survey_id' ";
    $result = $conn->query($sql);
    if($result){
        echo "<script>
                window.location='/QAweb/teacher/survey_session.php?ss_id=$ss_id';
                alert('Đã đóng khảo sát!');
            </script>";
    }
}

?>