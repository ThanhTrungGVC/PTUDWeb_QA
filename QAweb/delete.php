<?php
    /*
    * Xoa Du lieu
    *
    */

    # import connect database
        include "database/connect.php";

    # delete question
        if (isset($_GET['q_id'])) {
            $q_ids = $_GET['q_id'];
            $sql_del_q = "DELETE FROM questions WHERE question_id = '$q_ids'";
            $result = $conn->query($sql_del_q);
                
            if (!$result) {
                die('Error delete comment');
            } else{
                echo "<script>
                        window.history.back();
                    </script>";
            }
            
        }

    # delete comment
        if (isset($_GET['cmt_id'])) {
            $cmt_ids = $_GET['cmt_id'];
            $sql_del_cmt = "DELETE FROM comments WHERE cmt_id = '$cmt_ids'";
            $result = $conn->query($sql_del_cmt);
            
            if (!$result) {
                die('Error delete comment');
            } else{
                echo "<script>
                        window.history.back();
                    </script>";
            }
        }
?>