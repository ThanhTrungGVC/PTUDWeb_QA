<?php
	/*
	* KẾT NỐI TỚI CƠ SỞ DỮ LIỆU mySQL
	* - đọc file lấy dữ liệu đầu vào
	* - tạo kết nối
	*/

	# input data
		$hostname = "localhost";
		$username = "root";
		$password = "";
		$database = "qa";

	# connect
		$conn = mysqli_connect($hostname, $username, $password, $database);
		mysqli_set_charset($conn, 'UTF8');

	# check connect
		if (!$conn) {
			die("Sorry, Error for connect to mysql!");
		}
?>