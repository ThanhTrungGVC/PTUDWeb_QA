<?php

	/*
	* KIỂM TRA NGƯỜI DÙNG ĐĂNG NHẬP
	* - kết nối CSDL lấy thông tin
	* - so sánh với dữ liệu người dùng nhập
	* - kiểm tra phân quyền người dùng
	*/

	#session

	#cookie

	// Lấy thông tin người dùng nhập vào
	$input_email = $_POST["email"];
	$input_pass = md5($_POST["password"]);

	// Lấy thông tin từ CSDL
		# connect to database
			### TODO

		# Lấy kết quả
			$sql_email = "admin";
			$sql_pass  = md5("1234");

	# Kiểm tra thông tin tài khoản
	if($input_email == $sql_email && $input_pass == $sql_pass){ // đúng
		# lấy phân quyền
			$position = "giao vien";
		# kiểm tra phân quyền
			if ($position == "giao vien"){
				header('Location: /teacher');	// chuyển tới trang của giáo viên
			} elseif ($position = "hoc sinh") {
				header('Location: /student');	// chuyển tới trang của học sinh
			}
	}else{	// sai
		# xử lý: yêu cầu người dùng nhập lại
		echo "Thông tin tài khoản hoặc mật khẩu không chính xác!";
	}

?>