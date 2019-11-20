<?php
# import connect database
include_once __DIR__ . "/../database/connect.php";

$id = $_GET['id'];
$sql = "SELECT * FROM `users` WHERE user_id = $id";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

#check form
if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$password = $_POST['password'];
	$sql1 = "UPDATE `users` SET `user_pass`='$password',`name`='$name' WHERE user_id = $id";
	$result1 = $conn->query($sql1);
	echo '<script>
			var result = confirm("Bạn muốn lưu lại thay đổi không?");
              	if(result)  {
                	alert("Thay đổi thành công!");
              	} else {
                  	alert("Không đổi!");
              	}
			if(result){  window.location = "/QAweb/"};
			</script>';
	

	
}

?>

<!DOCTYPE html>
<html>

<head>
	<title> web</title>
	<meta charset="utf-8">
	<!-- Import Boostrap css, js, font awesome here -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">  
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script> -->
	<link rel="stylesheet" href="/QAweb/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/QAweb/fontawesome/css/all.css">
	<!-- Javascript -->
	<script src="/QAweb/js/jquery-3.4.1.js"></script>
	<script src="/QAweb/js/popper.min.js"></script>
	<!-- <script src="bootstrap/js/bootstrap.js"></script> -->
	<script src="/QAweb/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/QAweb/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="/QAweb/jcarousel/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="/QAweb/jcarousel/jcarousel.responsive.js"></script>
	<script src="/js/bootstrap-show-password.js"></script>

	<script type="text/javascript" src="/bai1.js"> </script>

</head>

<body>
	<div class="container">
		<div class="text-center mt-3">
			<h1>SỬA ĐỔI THÔNG TIN</h1>
			<a href="/QAweb/">Quay trở lại trang chủ</a>
		</div>
		<hr class="mr-4">
		<div class="container">
			<div class="d-flex justify-content-center">
				<div class="col-sm-5">
					<img src="https://colorlib.com/etc/lf/Login_v1/images/img-01.png" alt="IMG">
				</div>
				<div class="col-sm-4">
					<form action="" method="post" class="needs-validation" novalidate>
						<div>
							<div class="mb-3">
								<label for="username">Tên tài khoản</label>
								<input type="text" readonly="" class="form-control" name="username" id="username" placeholder="First name" value="<?php echo $row['user_names'] ?>" required="">
							</div>

						</div>
						<div>
							<div class="mb-3">
								<label for="name">Tên người dùng</label>
								<input type="text" class="form-control" name="name" id ="name" placeholder="First name" value="<?php echo $row['name'] ?>" required="">
								<div class="valid-feedback">
									Đã đủ thông tin!
								</div>
								<div class="invalid-feedback">
									Vui lòng nhập tên người dùng!
								</div>
							</div>
						</div>
						<!-- <div>
							<div class="mb-3">
								<label for="Email">Email</label>
								<div class="input-group">
									<div class="input-group-prepend">
										<span class="input-group-text" id="inputGroupPrepend">@</span>
									</div>
									<input type="email" class="form-control" id="Email" placeholder="Email@gmail.com" pattern=".+@gmail.com" aria-describedby="inputGroupPrepend" title="Email có dạng:'abcd@gmail.com'" required="">
									<div class="valid-feedback">
										Đã đủ thông tin!
									</div>
									<div class="invalid-feedback">
										Vui lòng nhập đúng email và không bỏ trống!
									</div>
								</div>
							</div>
						</div> -->
						<div>
							<div class="mb-3">
								<label for="password">Mật khẩu</label>
								<input type="password" class="form-control" name="password" id="password" placeholder="First name" value="<?php echo $row['user_pass'] ?>" required="">
								<div class="input-group-addon">
									<input class="mr-1" type="checkbox" onclick="myFunction()">Hiện mật khẩu
								</div>
								<div class="valid-feedback">
									Đã đủ thông tin!
								</div>
								<div class="invalid-feedback">
									Vui lòng nhập tên người dùng!
								</div>
							</div>
						</div>
						<button class="btn btn-primary" type="submit" name="submit">ĐỔI THÔNG TIN</button>
					</form>
				</div>
			</div>

		</div>

	</div>



	<script>
		// Example starter JavaScript for disabling form submissions if there are invalid fields
		(function() {
			'use strict';
			window.addEventListener('load', function() {
				// Fetch all the forms we want to apply custom Bootstrap validation styles to
				var forms = document.getElementsByClassName('needs-validation');
				// Loop over them and prevent submission
				var validation = Array.prototype.filter.call(forms, function(form) {
					form.addEventListener('submit', function(event) {
						if (form.checkValidity() === false) {
							event.preventDefault();
							event.stopPropagation();
						}
						form.classList.add('was-validated');
					}, false);
				});
			}, false);
		})();
		function myFunction() {
  var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}

		// function testConfirmDialog() {

		// 	var result = confirm("Bạn muốn đổi mật khẩu ko?");


		// 	if (result) {
		// 		result1 = prompt("Nhập mật khẩu", "");
		// 		if(result1!=null){
		// 			alert("Mật khẩu mới " + result1);
		// 		}
		// 	} else {
		// 		alert("Bye!");
		// 	}
		// }
	</script>
</body>

</html>