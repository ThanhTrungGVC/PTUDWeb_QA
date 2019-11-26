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
            if (isset($_GET['cmt_id'])) {
                $cmt_ids = $_GET['cmt_id'];
                $sql_del_cmt = "DELETE FROM comments WHERE cmt_id = '$cmt_ids'";
                $result = $conn->query($sql_del_cmt);
                
                if (!$result) {
                    die('Error delete comment');
                } else{
                    header("Location: session_detail.php?ss_id=$ss_ids");
                }
            }

            # delete questions
            if (isset($_GET['ss_id']) && !isset($_GET['q_id']) && !isset($_GET['survey_id']) && !isset($_GET['cmt_id'])) {
                echo "jfidsjisdsdnvdsj";
                $ss_id1= $_GET['ss_id'];
                $sql_ss = "DELETE FROM `sessions` WHERE `ss_id`=$ss_id1";
                $result_ss = $conn->query($sql_ss);

                $sql_q = "SELECT * FROM `questions` WHERE `ss_id`= $ss_id1";
                $result = $conn->query($sql_q);
                $row = $result->fetch_assoc();
                $question_id = $row['question_id'];

                $sql_sur = "SELECT * FROM `survey` WHERE `ss_id`";
                $result1 = $conn->query($sql_sur);
                $row1 = $result1->fetch_assoc();
                $survey_id = $row1['survey_id'];
                # delete questions
                $sql_del_q = "DELETE FROM questions WHERE `ss_id`=$ss_id1";
                $result2 = $conn->query($sql_del_q);
                # delete comment
                $sql_del_cmt = "DELETE FROM comments WHERE `question_id`=$question_id";
                $result2 = $conn->query($sql_del_cmt);
                # delete answwers
                $sql_del_ans = "DELETE FROM `answers` WHERE `question_id`=$question_id";
                $result4 = $conn->query($sql_del_ans);
                # delete survey
                $sql_del_sur = "DELETE FROM `survey` WHERE `ss_id`=$ss_id1";
                $result5 = $conn->query($sql_del_sur);
                # delete survey_detail
                $sql_del_sur_detail = "DELETE FROM `survey_detail` WHERE `survey_id`=$survey_id";
                $result6 = $conn->query($sql_del_sur_detail);

                if ($result1) {
                    echo "<script type='text/javascript'>
                            window.location='/QAweb/teacher/';
                            alert('Xóa phiên thành công!');
                            </script>";
                } else {
                    echo "<script type='text/javascript'>
                            window.location='/QAweb/teacher/';
                            alert('Xóa phiên thất bại!');
                            </script>";
                }
                
                
            }

            # delete question
            if (isset($_GET['q_id'])) {
                $q_ids = $_GET['q_id'];
                $sql_del_q = "DELETE FROM questions WHERE question_id = '$q_ids'";
                $result = $conn->query($sql_del_q);
                    
                if (!$result) {
                    die('Error delete comment');
                } else{
                    header("Location: session_detail.php?ss_id=$ss_ids");
                }
                
            }
            #delete survey
            if (isset($_GET['survey_id'])) {
                $survey_id = $_GET['survey_id'];
                $sql1 = "DELETE FROM survey WHERE survey_id = '$survey_id'";
                $result1 = $conn->query($sql1);
                $sql2 ="DELETE FROM `survey_detail` WHERE survey_id = '$survey_id'";
                $result2 = $conn->query($sql2);
                if (!$result1) {
                    die('Error delete comment');
                } else{
                    header("Location: survey_session.php?ss_id=$ss_ids");
                }
                
            }
            

            // if(isset($_GET['choose_id'])){
            //     $choose_id = $_GET['choose_id'];
            //     $survey_id = $_GET['survey_id'];
            //     $sql_o = "DELETE FROM survey_detail WHERE choose_id = '$choose_id'";
            //     $result_o = $conn->query($sql_o);
            //     // if (!$result_o) {
            //     //     die('Error delete comment');
            //     // } else{
            //     //     header("Location: survey_detail.php?ss_id=$ss_ids&survey_id=$survey_id");
            //     // }
            // }

        #}
?>