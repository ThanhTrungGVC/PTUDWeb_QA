<?php include "create_session.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Quan Tri Cac Phien</title>
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
	<!-- CSS, Boostrap -->
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> -->
	<link rel="stylesheet" href="/QAweb/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/QAweb/fontawesome/css/all.css">
	<link rel="stylesheet" href="/QAweb/MDB/css/mdb.css">
	<!-- Javascript -->
	<script src="/QAweb/js/jquery-3.4.1.js"></script>
	<script src="/QAweb/js/popper.min.js"></script>
	<!-- <script src="bootstrap/js/bootstrap.js"></script> -->
	<script src="/QAweb/bootstrap/js/bootstrap.min.js"></script>
	<script src="/QAweb/MDB/js/mdb.js"></script>
	<script type="text/javascript" src="/QAweb/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="/QAweb/jcarousel/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="/QAweb/jcarousel/jcarousel.responsive.js"></script>
</head>
<body>
	<!--header-->
	<div class="rare-wind-gradient">
		<div class="container mx-sm-auto">
			<div class="row">
				<div class="d-flex float-left">
					<div class="d-inline-block p-2 m-auto mr-sm-3">
						<a href="/QAweb/index.php"><img src="/QAweb/img/logouet.png" width="60px"></a>
					</div>
					<div class="d-inline-block text-center m-auto">
					<div>
						<a href="/QAweb/index.php" class="text-dark">
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

				<div class="col-sm-9 p-0 float-right mr-0 align-self-center">
					<div class="float-right">
						<div class="dropdown">
							<?php
							if (!isset($_SESSION['us_id'])) {
								echo "<a class='nav-link' href='login.php' > Dang Nhap </a>";
							} else {
								$id = $_SESSION['us_id'];
								$sql = "SELECT u.name, u.user_id, r.role_name, u.role_id FROM users u INNER JOIN roles r ON r.role_id = u.role_id WHERE u.user_id = '$id'";
								$result = $conn->query($sql);
								$row = $result->fetch_assoc();
								echo "
								<i class='fas fa-user'></i>
								<a class='dropdown-toggle' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								" . $row['name'] . "
								</a>
								";
							}
							?>
							<ul class="dropdown-menu dropdown-menu-right" style="left=-43px; min-width:205px">
								<li class="ml-3">
								<i class="far fa-user mr-1"></i> <?php echo $row['name'] ;  ?>
									<br>
									<i class="fas fa-graduation-cap"></i> Vai trò : <?php echo $row['role_name']; ?>

								</li>

								<li class="dropdown-divider"></li>

								<li class="ml-3">
									<i class="fas fa-edit"></i>
									<a href="/QAweb/change_user.php?id=<?php echo $id?>">Cập nhập thông tin</a>
								</li>
								<li class='ml-3'>
									<i class='fas fa-history mr-1'></i> 
									<a href="/QAweb">Tư cách người dùng</a>
								</li>


								<li class="dropdown-divider"></li>

								<li class="ml-3">
								<i class="fas fa-sign-out-alt mr-1"></i>
								<a href="/QAweb/logout.php">Đăng xuất</a>
								</li>
							</ul>

						</div>

					</div>

				</div>

			</div>
		</div>
	</div>

	<!--end header-->

	
    <div class="card">
    	<div class="card-body">
    		<div style="background-color:#999999;width:100%;height:800px;">

	    		<nav class="navbar navbar-expand-sm" style="background-color:gray;width:100%;">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#danhsachphienhoidap" style="background-color:#333333;color:white;height:50px">
				        Danh sách
				    </button>
	 
				    <div class="collapse navbar-collapse">
				        <ul class="navbar-nav mr-auto" style="background-color:#00ffff">
				            <li class="nav-item m-1">
				                <a class="nav-link" href="#" data-toggle="collapse" data-target="#danhsachphienhoidap" style="color:black;font-weight:bold;font-size: 20px">Danh sách phiên hỏi đáp <img src="/QAweb/img/danhsachqa.png" width="50px"></a>
				            </li>
				        </ul>
					</div>
					
					<button class="navbar-toggler" type="button" data-toggle="modal" 
						data-target="#taophienhoidap" style="background-color:#333333;color:white;height:50px">
				        Tạo phiên
				    </button>
	 
				    <div class="collapse navbar-collapse">
				        <ul class="navbar-nav ml-auto" style="background-color:#00ffff">
				            <li class="nav-item m-1">
								<a class="nav-link" href="#" data-toggle="modal" data-target="#taophienhoidap" 
								style="color:black;font-weight:bold;font-size:20px;width:304px;text-align:right;">Tạo phiên hỏi đáp <img src="/QAweb/img/danhsachqa.png" width="50px"></a>
				            </li>
				        </ul>
				    </div>

					<!-- <button class="navbar-toggler" type="button" data-toggle="modal" 
						data-target="#taophienkhaosat" style="background-color:#333333;color:white;height:50px">
				        Khảo sát
				    </button>
	 
				    <div class="collapse navbar-collapse">
				        <ul class="navbar-nav ml-auto" style="background-color:#00ffff">
				            <li class="nav-item m-1">
				                <a class="nav-link" href="#" data-toggle="modal" data-target="#taophienkhaosat" style="color:black;font-weight:bold;font-size: 20px">Tạo phiên khảo sát <img src="/QAweb/img/danhsachqa.png" width="50px"></a>
				            </li>
				        </ul>
				    </div> -->

				</nav>

				<div class="modal" id="taophienhoidap">
			         <div class="modal-dialog">
			            <div class="modal-content">
			               <div class="modal-header" style="background-color:#07eaea">
			                  <h4 class="modal-title" style="text-align:center;">TẠO PHIÊN HỎI ĐÁP</h4>
			                  <button class="close" data-dismiss="modal">&times;</button>
			               </div>
			       			<form action="" method="POST">
								<div class="modal-body">
									<label class="m-0">TIÊU ĐỀ:</label>
									<input name="title_in" type="text" class="form-control mb-2" required>
									<label class="m-0">MÔ TẢ:</label>
									<textarea name="describe_in" class="form-control mb-3" rows="5" id="comment" required></textarea></textarea>
									<label class="m-0"> Thời gian bắt đầu: </label> 
									<div class="mb-2">
										<input name="time_start_in" type="datetime-local" value="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
										$timestamp = date('Y-m-d H:i');$timestamp = str_replace(' ', 'T', $timestamp); echo $timestamp;?>" min="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
										$timestamp = date('Y-m-d H:i');$timestamp = str_replace(' ', 'T', $timestamp); echo $timestamp;?>"> <br>
									</div>
									<label class="m-0"> Thời gian kết thúc: </label>
									<div class="mb-2">
										<input name="time_end_in" type="datetime-local" min="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
										$timestamp = date('Y-m-d H:i');$timestamp = str_replace(' ', 'T', $timestamp); echo $timestamp;?>" required> <br>
									</div>
									<label class="m-0" class="m-0">Mật khẩu: </label>
									<div class="mb-2">
										<input name="pass_in" type="password" style="min-width: 222px;"> 
									</div>
								</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
									<button type="submit" class="btn btn-primary" name="btn_create_ss">Xác nhận</button>
								</div>
			       			</form>
			            </div>
			         </div>
      		    </div>
				

				<div class= "container-fluid collapse" id="danhsachphienhoidap">
			        <div class= "row justify-content-start">
			            <div class ="col-md-3" style="background-color:#00ff00">
			               <div>
				               	<a href="index.php?status=action">
				               		Phiên hỏi đáp đang hoạt động
				               	</a>
			           	   </div>
			               <br>
			               <div >
				               	<a href="index.php?status=open">
								   Phiên hỏi đáp chuan bi mo
				               	</a>
			           	   </div>
			               <br>
			               <div >
				               	<a href="index.php?status=close">
								   Phiên hỏi đáp đa dong
				               	</a>
			           	   </div>
			            </div>
			        </div>
				</div>
				
				<?php include("show_session.php");?>
			</div>
			
		</div>
		
	</div>
	
	
</body>
<script type="text/javascript">
	function loadphien(){
		var xmlhttp;
	        if (window.XMLHttpRequest)
	            {
	                xmlhttp = new XMLHttpRequest();
	            }
	        else
	            {
	                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	            }

	     xmlhttp.onreadystatechange = function()
	                {
	                    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) 
	                    {
	                        document.getElementById("saukhichonphien").innerHTML = xmlhttp.responseText;
	                    }
	                };

	    xmlhttp.open("GET", "saukhichonphien.php", true);
	 	xmlhttp.send();
 	}

</script>
</html>