<?php
    /* Hiển thị thông tin chi tiết phiên
    *
    *
    *
    */

    # import connect database
        include_once __DIR__."/../database/connect.php";

    # check
    if ($_GET['ss_id']) {
        $session_ids = $_GET['ss_id'];
    }

    # get info session
    $sql = "SELECT s.ss_id, s.user_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status,
				(SELECT COUNT(*) FROM questions q WHERE q.ss_id = '$session_ids') AS 'num_qs', (SELECT COUNT(*) FROM survey WHERE survey.ss_id = '$session_ids') AS 'num_sur'
                FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_id = '$session_ids'";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	# get info question
	$sql_q = "SELECT q.question_id, u.name, u.user_id, u.role_id, q.create_date, q.content,
					(SELECT COUNT(*) FROM comments c WHERE c.question_id = q.question_id) AS 'num_cmt'
				FROM questions q
                INNER JOIN users u ON q.user_id = u.user_id  AND  q.ss_id = '$session_ids' 
                ORDER BY q.question_id DESC";
	$result_q = $conn->query($sql_q);

	# get info
	
?>