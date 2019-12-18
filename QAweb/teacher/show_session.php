<?php
/*
 * HIỂN THỊ DANH SÁCH CÁC PHIÊN HỎI ĐÁP
 * index.php  => tất cả các phiên
 * index.php?status=action  => phiên đang hoạt động
 * index.php?status=open    => phiên chuẩn bị mở
 * index.php?status=close   => phiên đã được đóng
 */

## import connect.php
include_once __DIR__ . "/../database/connect.php";

# set timezone
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date('Y-m-d H:i:s');

# apdate status action for database
$sql = "SELECT ss_id, time_start, time_end FROM sessions WHERE time_start < '$time' AND ss_status = 'open'";
$result = $conn->query($sql);

if (!$result) {
	die("error sql");
}

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
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

if (!$result) {
	die("error sql");
}

if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
		$id = $row['ss_id'];
		$sql1 = "UPDATE sessions SET ss_status = 'close' WHERE ss_id = '$id'";
		$result1 = $conn->query($sql1);

		if (!$result1) {
			die("ERROR AUTO UPDATE!");
		}
	}
}

## get id techer
$us_create = $_SESSION['us_id'];

## create query
if (!isset($_GET['status'])) {
	$sql = "SELECT s.ss_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status, (SELECT COUNT(*) FROM questions q WHERE q.ss_id = s.ss_id) AS 'num_qs'
				FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE u.user_id = '$us_create'
				ORDER BY s.create_date DESC";
} elseif ($_GET['status'] == 'action') {
	$sql = "SELECT s.ss_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status, (SELECT COUNT(*) FROM questions q WHERE q.ss_id = s.ss_id) AS 'num_qs'
				FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_status = 'action' AND u.user_id = '$us_create'
				ORDER BY s.create_date DESC";
} elseif ($_GET['status'] == 'open') {
	$sql = "SELECT s.ss_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status, (SELECT COUNT(*) FROM questions q WHERE q.ss_id = s.ss_id) AS 'num_qs'
				FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_status = 'open' AND u.user_id = '$us_create'
				ORDER BY s.create_date DESC";
} elseif ($_GET['status'] == 'close') {
	$sql = "SELECT s.ss_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status, (SELECT COUNT(*) FROM questions q WHERE q.ss_id = s.ss_id) AS 'num_qs'
				FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_status = 'close' AND u.user_id = '$us_create'
				ORDER BY s.create_date DESC";
}

$result = $conn->query($sql);

#check query
if (!$result) {
	die('Error to show session. Pleas try again!');
}

# show data
$i = 1;
if ($result->num_rows > 0) {
	?>
		<table border="1" width="100%" style="margin-top: 30px;">
			<tr style="text-align: center; background-color: blueViolet;">
				<th colspan="11"><h2> DANH MUC CAC PHIEN HOI DAP</h2></th>
			</tr>
			<tr style="text-align: center; background-color: blue;">
				<th>STT</th>
				<th>ID</th>
				<th>TITLE</th>
				<th>QUESTIONS</th>
				<th>CREATE DATE</th>
				<th>START</th>
				<th>END</th>
				<th>PASSWORD</th>
				<th>STATUS</th>
				<th colspan="2">ACTION</th>
			</tr>

			<?php
while ($row = $result->fetch_assoc()) {
		echo "
					<tr height = '60'>
						<td style='text-align: center;'> " . $i . " </td>
						<td style='text-align: center;' width='60'> " . $row['ss_id'] . " </td>
						<td><h5>" . $row['ss_title'] . "</h5></td>
						<td style='text-align: center;'> " . $row['num_qs'] . " </td>
						<td style='text-align: center;'> " . $row['create_date'] . " </td>
						<td style='text-align: center;'> " . $row['time_start'] . " </td>
						<td style='text-align: center;'> " . $row['time_end'] . " </td>
						<td> " . $row['ss_pass'] . " </td>
						<td style='text-align: center;'> " . $row['ss_status'] . " </td>
						<td style='text-align: center;'><a href='session_detail.php?ss_id=" . $row['ss_id'] . "'>Chi tiết</a></td>
						<td style='text-align: center;'><a href='/QAweb/close.php?ss_id=" . $row['ss_id'] . "'>Đóng</a></td>
					</tr>
				";
		$i++;
	}
	?>

		</table>

	<?php
} else {
	echo "Hien tai khong co phien nao!";
}
?>