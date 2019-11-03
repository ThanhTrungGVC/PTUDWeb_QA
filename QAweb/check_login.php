<?php

	/*
	* KIỂM TRA NGƯỜI DÙNG ĐĂNG NHẬP
	* - kết nối CSDL lấy thông tin
	* - so sánh với dữ liệu người dùng nhập
	* - kiểm tra phân quyền người dùng
	*/

	## start session
		session_start();

	## cookie


	## import connect.php
	include "database/connect.php";


	$check =false;

	if(isset($_POST['btn_login'])){
		// get input user post
		$input_user = $_POST["email"];
		$input_pass = $_POST["password"];
		$check = true;
	}

	// check input null
	if ($check && $input_user && $input_pass) {
		// get information from database
		# connect to database
		$sql = "SELECT user_id,role_id, user_names, user_pass, user_status FROM users u WHERE user_names = '$input_user' AND user_pass = '$input_pass'";
		$result = $conn->query($sql);

		if (!$result) {
			die("Error connect to database! Pleas try again!");
		}

		# get result
		if($result->num_rows > 0) {
			$row = $result->fetch_assoc();
			$sql_user = $row['user_names'];
			$sql_pass = $row['user_pass'];
			$sql_role = $row['role_id'];
			$sql_status = $row['user_status'];
		} else {
			$sql_user = "NULL";
			$sql_pass = "";
			$sql_role = "";
			$sql_status = "";
		}

	// check account
		if($input_user == $sql_user && $input_pass == $sql_pass){ // true
			# check status
			if($sql_status == "action"){	// true
				# set value session
				$_SESSION['us_id'] = $row['user_id'];
				
				# check role
				if ($sql_role <= 2){
					header('Location: teacher');	// go to page teacher
				} else {
					header('Location: index.php');	// go to page student
				}
			} else {  // false: account banning
				# TODO: baning account
				echo "Account is banning. Try again!";
			}
		}else{	// false: incorrect info account
			# TODO: re-input
			echo "
				<script>
					alert('Thông tin tài khoản hoặc mật khẩu không chính xác!');
				</script>
			";



		}

	}

	else echo "
				<script>
					alert('Bạn cần nhập đầy đủ thông tin để đăng nhập!');
				</script>
			";

	
?>