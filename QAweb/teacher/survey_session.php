<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Quản lý các khảo sát</title>

	<!-- <link rel="shortcut icon" type="image/png" href="webimage/icon.png"/>-->


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
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include "survey_ss_detail.php"; ?>
	<div class="container mb-5">
		<div class="rare-wind-gradient">
			<div class="container mx-sm-auto">
				<div class="row">
					<div class="d-flex float-left">
						<div class="d-inline-block p-2 pl-3 m-auto mr-sm-3">
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

					<div class="col-sm-9 p-0 float-right mr-0 align-self-center">
						<div class="float-right">
							<div class="dropdown">
								<?php
								if (!isset($_SESSION['us_id'])) {
									echo "<a class='nav-link deep-blue-gradient hover_color' href='login.php' style='color: #0b52d4;'> Đăng nhập </a>";
								} else {
									$id = $_SESSION['us_id'];
									$sql7 = "SELECT u.name, u.user_id, r.role_name, u.role_id FROM users u INNER JOIN roles r ON r.role_id = u.role_id WHERE u.user_id = '$id'";
									$result7 = $conn->query($sql7);
									$row7 = $result7->fetch_assoc();
									echo "
									<i class='fas fa-user'></i>
									<a class='dropdown-toggle' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
									" . $row7['name'] . "
									</a>
									";
								}
								?>
								<ul class="dropdown-menu dropdown-menu-right" style="left=-43px; min-width:205px">
									<li class="ml-3">
										<i class="far fa-user mr-1"></i> <?php echo $row7['name'] . " ( " . $row7['user_id'] . " )";  ?>
										<br>
										<i class="fas fa-graduation-cap"></i> Vai trò : <?php echo $row7['role_name']; ?>

									</li>

									<li class="dropdown-divider"></li>

									<li class="ml-3">
										<i class="fas fa-edit"></i>
										<a href="/QAweb/change_user.php?id=<?php echo $id?>">Cập nhập thông tin</a>
										<!-- <a href="SuaThongTinNguoiDung.php" data-toggle="modal" data-target="#suathongtin">Cập nhập thông tin</a> -->
									</li>

									<?php
									if ($row7['role_id'] <= 2) {
										echo "
										<li class='ml-3'>
										<i class='fas fa-history mr-1'></i> 
														<a href='/QAweb/teacher/'>Tư cách giao vien</a>
										</li>
										";
									}
									?>

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
	
		<!-- Thông tin của 1 phiên -->
		<div class="winter-neva-gradient mt-2">
			<div class="pl-3 pt-2">
				<h2>Thông tin phiên: <strong><?php echo $row['ss_title']; ?></strong></h2>
			</div>
			<hr class="my-2" style="height:1px;">
			<div class="row pl-3 py-2 ">
				<div class="col-sm-4">
					<div>
						<h5>
							<b>Chủ đề</b>
						</h5>
						<h6>
							<?php echo $row['ss_title']; ?>
						</h6>
					</div>

					<div>
						<h5>
							<b>Mô tả</b>
						</h5>
						<h6>
							<?php echo $row['ss_describe']; ?>
						</h6>
					</div>
					<h5>
						<b>Số lượng khảo sát: </b> <?php echo $row['num_sur']; ?>
					</h5>
				</div>
				<div class="col-sm-4">
					<div>
						<h5>
							<b>Thời gian mở: </b>
						</h5>
						<h6>
							<?php echo $row_sur['start_time_survey']; ?>
						</h6>
					</div>
				</div>
				<?php if ($row['ss_status'] == 'action'){
					echo "
						<div class='col-sm-4'>
							<!-- Nút lựa chọn -->
							<div class='input-group-btn mt-2'>
								<button style='margin-bottom:5px;' type='button' data-toggle='modal' data-target='#taophienkhaosat' class='btn btn-primary aqua-gradient btn-sm m-0'><i class='fa fa-plus' aria-hidden='true'</i></i> Tạo khảo sát</button>
							</div>
						</div>";
				}?>
				

			</div>
		</div>

		<!-- show form add question -->
		<!-- <div class="modal" id="taocauhoi">
			<form method="POST" action="/QAweb/create_question.php?ss_id=<?php echo $_GET['ss_id']; ?>">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header" style="background-color:#07eaea">
							<h4 class="modal-title" style="text-align:center;">THÊM MỚI CÂU HỎI</h4>
							<button class="close" data-dismiss="modal">&times;</button>
						</div>

						<div class="modal-body">
							<label>Nhập nội dung câu hỏi :</label>
							<input type="text" class="form-control" name="ip_add_question">
							<br>
						</div>

						<div class="modal-footer">
							<button type="button" class="btn btn-info">Đóng</button>
							<button type="submit" class="btn btn-success">Xác nhận</button>
						</div>
					</div>
				</div>
			</form>
		</div> -->

		<div id="taophienkhaosat" class="modal fade" role="dialog">
			<div class="modal-dialog modal-lg">
				<!-- Modal content-->
				<div class="modal-content">
					<div class="modal-header aqua-gradient">
						<h4 class="modal-title">Phiên khảo sát</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="container">
								<form method="post" action="/QAweb/teacher/create_survey.php?ss_id=<?= $row['ss_id'] ?>">
									<div class="modal-body">
										<h5>Nhập nội dung khảo sát:</h5>
										<input type="text" class="form-control" name="content" required>
										<div id="option" class="mx-4">
											<div class="fieldGroup">
												<div class="input-group mb-2">
													<input type="text" name="options[]" class="form-control" style="border-radius: 18px 0px 0px 18px;" placeholder="Them lua chon" required>
													<div class="input-group-append">
														<a class="btn btn-sm btn-danger m-auto remove" style="font-size: 15px; border-radius: 0px 18px 18px 0px;">
															<i class="fa fa-minus"></i>
														</a>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group fieldGroup">
											<div class="input-group">
												<div>
													<a href="javascript:void(0)" class="btn btn-success addMore m-0">
														<i class="fas fa-plus"></i><p class="d-inline ml-1">Thêm</p>
													</a>
												</div>
											</div>
										</div>
									</div>
									<hr style="height:1px;">

									<div class="float-right">
										<input type="submit" name="submit" class="btn btn-primary m-0" value="TẠO KHẢO SÁT" />
										<a type="button" name="close" class="btn btn-outline-primary waves-effect" data-dismiss="modal">Cancel</a>
									</div>
								</form>
								<!-- add input option-->
								<div class="form-group fieldGroupCopy" style="display: none;">
									<div class="input-group mb-2">
										<input type="text" name="options[]" class="form-control" style="border-radius: 18px 0px 0px 18px;" placeholder="Them lua chon" required>
										<div class="input-group-append">
											<a class="btn btn-sm btn-danger m-auto remove" style="font-size: 15px; border-radius: 0px 18px 18px 0px;">
												<i class="fa fa-minus"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


		<!-- Các câu hỏi có trong phiên -->
		<div class="mt-4">
			<div class="pl-3 pt-2 text-center">
				<h2>Danh sách các khảo sát</h2>
			</div>
			<div>
				<hr class="my-2" style="height:1px;">
				<!--Câu hỏi 1-->
				<?php
				$i = 1;
				while ( $row1 = $result_survey->fetch_assoc()) {
					?>
					<div class="container-fluid question">
						<div>
							<!-- Phần câu hỏi -->
							<h5 class="m-3 pt-3 qs_i">
								<b style='color:#FFBF00'>
									<a href="survey_detail.php?ss_id=<?php echo $_GET['ss_id']; ?>&survey_id=<?php echo $row1['survey_id']; ?>">Khảo sát <?php echo $i . ": " . $row1['survey_describe']; ?></a>
								</b>
								<div>
									<h6>
										<small class="text-muted">
											<i>
												<p style="display: inline" class="mb-1">Người tạo: <?php echo $row['name']; ?></p>
												<!--Tên người đặt câu hỏi -->
												<p class="m-0">Thời gian mở: <?php echo $row1['start_time_survey']; ?></p><!-- Thời gian đặt câu hỏi -->
												<?php if ($row1['survey_status']!="action") {?>
													<p class="mb-1">Thời gian đóng: <?php echo $row1['close_time_survey']; ?></p>
												<?php
												}?>
											</i>
											<span style="color:black;">Trạng thái hoạt động: <?php if($row1['survey_status']=="action"){echo "Đang hoạt động";}else{echo "Đã đóng";} ?></span>
										</small>
										<small class="text-muted d-block mt-2">
											<a href="delete.php?ss_id=<?php echo $_GET['ss_id']; ?>&survey_id=<?php echo $row1['survey_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa khảo sát');"> Xóa</a>
											<?php if ($row1['survey_status']=="action") {?>
											<span>-</span>
											<a href="/QAweb/close.php?ss_id=<?php echo $_GET['ss_id']; ?>&survey_id=<?php echo $row1['survey_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn đóng khảo sát');"> Đóng</a>
											<?php
											}?>
										</small>
									</h6>
								</div>

							</h5>
						</div>
					</div>
				<?php
					$i++;
				}
				?>
			</div>

		</div>

	</div>
	<script>
		$(document).ready(function() {
			//group add limit
			var maxGroup = 1000;

			//add more fields group
			$(".addMore").click(function() {
				if ($('body').find('.fieldGroup').length < maxGroup) {
					var fieldHTML = '<div class="fieldGroup">' + $(".fieldGroupCopy").html() + '</div>';
					let container = document.getElementById('option');
					let div = document.createElement('div');
					div.innerHTML = fieldHTML;
					container.appendChild(div);
				} else {
					alert('Maximum ' + maxGroup + ' groups are allowed.');
				}
			});

			//remove fields group
			$("body").on("click", ".remove", function() {
				$(this).parents(".fieldGroup").remove();
			});
		});
	</script>

</body>

</html>