<?php
    /* Hiển thị thông tin chi tiết phiên khao sat
    *
    *
    *
    */
    # import connect database
        include_once __DIR__."/../QAweb/database/connect.php";

    # check
    if ($_GET['ss_id']) {
        $session_ids = $_GET['ss_id'];
    }

    # get info session
    $sql = "SELECT s.ss_id, s.user_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status,
				(SELECT COUNT(*) FROM survey sv WHERE sv.ss_id = '$session_ids') AS 'num_sv'
                FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_id = '$session_ids'";
    $result = $conn->query($sql);
	$row = $result->fetch_assoc();
	
	# get info question
	// $sql_q = "SELECT q.question_id, u.name, u.user_id, u.role_id, q.create_date, q.content,
	// 				(SELECT COUNT(*) FROM comments c WHERE c.question_id = q.question_id) AS 'num_cmt'
	// 			FROM survey sv
	// 			INNER JOIN users u ON sv.user_id = u.user_id  AND  sv.ss_id = '$session_ids'";
    // $result_q = $conn->query($sql_q);
    $sql_survey = "SELECT survey.survey_id, survey.survey_describe, survey.start_time_survey, survey.close_time_survey, survey.survey_status,
                    (SELECT COUNT(*) FROM survey WHERE survey.ss_id = '$session_ids') AS 'num_survey'
                    FROM survey WHERE survey.ss_id = '$session_ids' ORDER BY survey.survey_id DESC";
    $result_survey = $conn->query($sql_survey);
    
    $sql_survey = "SELECT survey.survey_id, survey.survey_describe, survey.start_time_survey, survey.close_time_survey, survey.survey_status,
                    (SELECT COUNT(*) FROM survey WHERE survey.ss_id = '$session_ids') AS 'num_survey'
                    FROM survey WHERE survey.ss_id = '$session_ids'";
    $result_sur = $conn->query($sql_survey);
    $row_sur = $result_sur->fetch_assoc();

	# get info
	
?>