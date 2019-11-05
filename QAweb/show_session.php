<?php
	/*
	* HIỂN THỊ DANH SÁCH CÁC PHIÊN HỎI ĐÁP
	* index.php  => tất cả các phiên
	* index.php?status=action  => phiên đang hoạt động
	* index.php?status=open    => phiên chuẩn bị mở
	* index.php?status=close   => phiên đã được đóng
    */

	## import connect.php
		include "database/connect.php";

	# set timezone
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$time = date('Y-m-d H:i:s');

	# apdate status action for database
	$sql = "SELECT ss_id, time_start, time_end FROM sessions WHERE time_start < '$time' AND ss_status = 'open'";
	$result = $conn->query($sql);

	if(!$result) {
		die("error sql");
	}

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$id = $row['ss_id'];
			$sql1 = "UPDATE sessions SET ss_status = 'action' WHERE ss_id = '$id'";
			$result1 = $conn->query($sql1);

			if (!$result1) {
				die("ERROR AUTO UPDATE!");
			}
		}
	}

	# apdate status close for database
	$sql = "SELECT ss_id, time_start, time_end FROM sessions WHERE time_end < '$time' AND ss_status = 'action'";
	$result = $conn->query($sql);

	if(!$result) {
		die("error sql");
	}

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$id = $row['ss_id'];
			$sql1 = "UPDATE sessions SET ss_status = 'close' WHERE ss_id = '$id'";
			$result1 = $conn->query($sql1);

			if (!$result1) {
				die("ERROR AUTO UPDATE!");
			}
		}
	}

    ## get id techer
    if (isset($_SESSION['us_id'])) {
        $us_create = $_SESSION['us_id'];
    }
	

	## create query
	if(!isset($_GET['status'])) {
		$sql = "SELECT s.ss_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status
				FROM sessions s INNER JOIN users u ON s.user_id = u.user_id";
	} elseif($_GET['status'] == 'action') {
		$sql = "SELECT s.ss_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status
				FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_status = 'action'";
	} elseif($_GET['status'] == 'close') {
		$sql = "SELECT s.ss_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status
				FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_status = 'close'";
	}

	$result = $conn->query($sql);

	#check query
	if (!$result) {
		die('Error to show session. Pleas try again!');
	}

	# show data
	$i = 1;
	if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($row['ss_status'] == "action") {
                $stt  = "Đang hoạt động";
            } elseif($row['ss_status'] == "close"){
                $stt = "Không hoạt động";
            }

            echo "
                <div class= 'container-fluid'>
                    <div class= 'row'>
                        <div class ='col-md-12' style='background-color:white'>
                            <div class='card m-3' style='float:left;'></div>

                            <div class='card m-3'>
                                <div style='margin-left: 30px;'>
                                    <p>TÊN PHIÊN: <a href='session_detail.php?ss_id=".$row['ss_id']."' style='text-transform: uppercase;'><strong>". $row['ss_title'] ."</strong></a></p>
                                    <p><strong>Người tạo:</strong> ". $row['name'] ."
                                    <p><strong>Thời gian bắt đầu:</strong> ". $row['time_start'] ." &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong>Thời gian kết thúc:</strong> ". $row['time_end'] ." 
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong>Số câu hỏi:</strong> 5
                                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <strong>Trạng thái:</strong> ". $stt ."</p>
                                </div>	
                            </div>
                        </div>
                    </div>
                </div>

                <div class= 'container-fluid'>
                    <div class= 'row'>
                        <div class ='col-md-12' style='background-color:#e5e5e5;height:40px'></div>
                    </div>
                </div>
            ";
            $i++;
        }
	} else {
		echo "Hien tai khong co phien nao!";
	}
?>