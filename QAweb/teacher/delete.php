<?php
    /*
    * Xoa Du lieu
    *
    */

    # import connect database
        include_once __DIR__."/../database/connect.php";

    # get session id
        if ($_GET['ss_id']) {
            $ss_ids = $_GET['ss_id'];
        }

    # check delete button click
        #if(isset($_POST['Del_cmt'])){
            # get comment id
            if ($_GET['cmt_id']) {
                $cmt_ids = $_GET['cmt_id'];
                echo "dmmm";
                $sql_del_cmt = "DELETE FROM comments WHERE cmt_id = '$cmt_ids'";
                $result = $conn->query($sql_del_cmt);
                
                if (!$result) {
                    die('Error delete comment');
                } else{
                    header("Location: session_detail.php?ss_id=$ss_ids");
                }
            }
        #}
?>