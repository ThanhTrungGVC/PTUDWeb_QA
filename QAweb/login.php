<!DOCTYPE html>
<html>

<head>
	<title>Question-Answer</title>

	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
	<!-- CSS, Boostrap -->
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fontawesome/css/all.css">
	<link rel="stylesheet" href="MDB/css/mdb.css">
	<!-- Javascript -->
	<script src="js/jquery-3.4.1.js"></script>
	<script src="js/popper.min.js"></script>
	<!-- <script src="bootstrap/js/bootstrap.js"></script> -->
	<script src="bootstrap/js/bootstrap.min.js"></script>
	<script src="MDB/js/mdb.js"></script>
	<script type="text/javascript" src="fontawesome/js/all.js"></script>
	<script type="text/javascript" src="jcarousel/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="jcarousel/jcarousel.responsive.js"></script>
</head>

<body>
	<!--header-->
	<div class="navbar navbar-expand-sm rare-wind-gradient p-0">
		<div class="container mx-sm-auto">
			<div style="width:inherit">
				<div class="d-flex float-left">
					<div class="d-inline-block p-2 m-auto mr-sm-3">
						<a href="index.php"><img src="/QAweb/img/logouet.png" width="60px"></a>
					</div>
					<div class="d-inline-block text-center m-auto">
					<div>
						<a href="index.php" class="text-dark">
							<h2 class="d-block mb-0">
								QA-UET
							</h2>
							<h6 class="d-block mb-0">
								<small>
									Nơi trao đổi của mọi người
								</small>
							</h6>
						</a>
					</div>
				</div>
				</div>

				<div style="display: flex; height: 76px;">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color:#333333;color:white;height:50px">
						MENU
					</button>

					<div class="collapse navbar-collapse" id="collapsibleNavbar">
						<ul class="navbar-nav ml-auto nav-fill">
							<li class="nav-item m-1">
								<a class="nav-link active" style="font-weight:bold;font-size:20px;background-color:#7f7f7f">Đăng Nhập</a>
							</li>
							<li class="nav-item m-1">
								<a class="nav-link" href="#" data-toggle="collapse" data-target="#gioithieu" style="color:black;font-weight:bold;font-size: 20px">Giới Thiệu</a>
							</li>
							<li class="nav-item m-1">
								<a class="nav-link" href="#" data-toggle="collapse" data-target="#huongdan" style="color:black;font-weight:bold;font-size: 20px">Hướng Dẫn</a>
							</li>
						</ul>
					</div>

				</div>


			</div>
		</div>
	</div>

	<!--end header-->

	<div class="container-fluid collapse" id="gioithieu">
		<div class="row justify-content-end">
			<div class="col-md-3" style="background-color:#00ffff">
				<p>Đây là Website thảo luận và giải đáp thắc mắc cho cộng đồng sinh viên Đại Học Công Nghệ-Đại Học Quốc Gia Hà Nội.
					Được thiết kế nhằm mục đích giúp đỡ sinh viên.</p>
			</div>
		</div>
	</div>

	<div class="container-fluid collapse" id="huongdan">
		<div class="row justify-content-end">
			<div class="col-md-3" style="background-color:#00ffff">
				<p>Các bạn truy cập vào đường link sau để xem hướng dẫn : </p>
				<a href="http://112.137.129.30/qa/documentation">http://112.137.129.30/qa/documentation</a>
			</div>
		</div>
	</div>

	<div class="card">
		<div class="card-header" align="center">
			<h2 style="font-size:60px">QA - UET</h2>
			<h3>BY UETer - FOR UETer</h3>
			<div style="width:40%;height:5px;background-color:#00bfbf"></div>
		</div>
		<div class="card-body" align="center">
			<div style="background-color:#999999;width:50%;">
				<p style="font-size:20px;" class="pt-3">Đăng Nhập Bằng Tài Khoản UETMAIL</p>
				<div>
					<form method="POST" action="check_login.php">
						<div class="row m-2">
							<div class="col-md-3 col-sm-5 p-0 m-auto" style="font-weight:bold;">Tài Khoản : </div>
							<div class="col-md-9 col-sm-6 p-0 pr-5">
								<input name="email" type="text" class="form-control" placeholder="Email" title="Nhập đầy đủ thông tin" required>
							</div>
						</div>

						<div class="row m-2 w-100"></div>
						<div class="row m-2 w-100"></div>

						<div class="row m-2">
							<div class="col-md-3 col-sm-5 p-0 m-auto" style="font-weight:bold;">Mật Khẩu : </div>
							<div class="col-md-9 col-sm-6 p-0 pr-5">
								<input name="password" type="password" class="form-control" placeholder="Password" title="Nhập đầy đủ thông tin" required>
							</div>
						</div>

						<div class="row m-2 w-100"></div>
						<div class="row m-2 w-100"></div>

						<div class="row m-2 justify-content-center pb-3">
							<button type="submit" class="btn btn-primary">Đăng Nhập</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="card-footer" style="height:180px;background-color:#191919;color:white" align="left">
			<p class="card-text m-3">Thông tin liên hệ : </p>
			<p class="card-text m-3">SĐT : 012345678</p>
			<p class="card-text m-3">Email : xxx@gmail.com</p>
		</div>
	</div>
</body>

</html>