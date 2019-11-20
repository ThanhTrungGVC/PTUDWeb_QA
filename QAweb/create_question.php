<?php
    /*
    *   CHECK AND INSERT USER CREATE QUESTION
    *
    *
    */

    # start session
        session_start();

    # import connect database
    include  "database/connect.php";

    # create time insert
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    $timestamp = date('Y-m-d H:i:s');

    # get id session
    if ($_GET['ss_id']) {
        $get_ss_id = $_GET['ss_id'];
    }

    # get id user
    if (isset($_SESSION['us_id'])) {
        $get_us_id = $_SESSION['us_id'];
    } else {
        $get_us_id = 6;     // user hide
    }

    #get info input
    $ip_question = $_POST['ip_add_question'];

    #check data
    // TODO

    # query mysql
    $sql = "INSERT INTO questions VALUES (NULL, '$get_ss_id', '$get_us_id', '$ip_question', '$timestamp', '0')";

    # respon
    $result = $conn->query($sql);

    # check
    if (!$result) {
        die("error insert to database!");
    } else {
        echo "<script>
          window.history.back();
        </script>";
    }

?>