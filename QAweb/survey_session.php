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
	<!-- Javascript -->
	<script src="/QAweb/js/jquery-3.4.1.js"></script>
	<script src="/QAweb/js/popper.min.js"></script>
	<script src="/QAweb/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="/QAweb/fontawesome/js/all.js"></script>
	<link rel="stylesheet" href="/QAweb/css/style.css">
</head>

<body>
	<?php include "survey_ss_detail.php"; ?>
	<div class="container mb-5">
		<nav class="navbar navbar-expand-sm" style="background-color:#00ffff">
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

			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color:#333333;color:white;height:50px">
				MENU
			</button>

			<?php
			$id_tc = $_SESSION['us_id'];
			$sql_us = "SELECT * FROM users u
					INNER JOIN roles r ON u.role_id = r.role_id
					WHERE user_id = '$id_tc'";
			$result_us = $conn->query($sql_us);
			$row_us = $result_us->fetch_assoc();
			?>

			<div class="collapse navbar-collapse" id="collapsibleNavbar">
				<ul class="navbar-nav d-flex ml-auto">
					<li class="nav-item m-1">
						<a class="nav-link" href="#" data-toggle="collapse" data-target="#quanly" style="color:black;font-weight:bold;font-size: 20px">
							<img src="/QAweb/img/user.png" width="30px">
							<?php
							echo $row_us['name'];
							?>
						</a>
						<div class="text-primary">
							<div class="pl-2">
								<i class="fas fa-long-arrow-alt-left mb-1"></i>
								<a href="/QAweb/teacher/">Quay tro lai</a>
							</div>
						</div>
					</li>
				</ul>

			</div>
		</nav>
		<!-- Thông tin của 1 phiên -->
		<div class="winter-neva-gradient mt-4">
			<div class="pl-3 pt-2">
				<h2>Thông tin phiên: <strong><?php echo $row['ss_title']; ?></strong></h2>
			</div>
			<hr class="my-2">
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

				<?php if ($row['ss_status'] == 'action' && $row_us['role_id'] != 3) {
					echo "
						<div class='col-sm-4'>
							<!-- Nút lựa chọn -->
							<div class='input-group-btn mt-2'>
								<button style='margin-bottom:5px;' type='button' data-toggle='modal' data-target='#taophienkhaosat' class='btn btn-primary aqua-gradient btn-sm m-0'><i class='fa fa-plus' aria-hidden='true'</i></i> Tao phien khao sat</button>
							</div>
						</div>";
				} ?>

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
					<div class="modal-header">
						<h4 class="modal-title">Phien khao sat</h4>
						<button type="button" class="close" data-dismiss="modal">&times;</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="container">
								<form method="post" action="/QAweb/teacher/create_survey.php?ss_id=<?= $row['ss_id'] ?>">
									<div class="modal-body">
										<p>Nhập nội dung khao sat :</p>
										<input type="text" class="form-control" name="content">
										<div id="option" class="mx-4">
											<div class="fieldGroup">
												<div class="input-group mb-2">
													<input type="text" name="options[]" class="form-control" style="border-radius: 20px;" placeholder="Them lua chon">
													<div>
														<a href="javascript:void(0)" class="btn btn-danger remove" style="border-radius: 20px;">
															<i class="far fa-trash-alt"></i> Xoa
														</a>
													</div>
												</div>
											</div>
										</div>

										<div class="form-group fieldGroup">
											<div class="input-group">
												<div>
													<a href="javascript:void(0)" class="btn btn-success addMore">
														<i class="fas fa-plus"></i> Them lua chon</a>
												</div>
											</div>
										</div>
									</div>


									<input type="submit" name="submit" class="btn btn-primary" value="TAO KHAO SAT" />
								</form>
								<!-- add input option-->
								<div class="form-group fieldGroupCopy" style="display: none;">
									<div class="input-group mb-2">
										<input type="text" name="options[]" class="form-control" style="border-radius: 20px;" placeholder="Them lua chon" />
										<div>
											<a href="javascript:void(0)" class="btn btn-danger remove" style="border-radius: 20px;">
												<i class="far fa-trash-alt"></i> Xóa
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
				<h2>Danh sách các phien khao sat</h2>
			</div>
			<div>
				<hr class="my-2">
				<!--Câu hỏi 1-->
				<?php
				$i = 1;
				while ($row1 = $result_survey->fetch_assoc()) {
					?>
					<div class="container-fluid question">
						<div class="winter-neva-gradient">
							<!-- Phần câu hỏi -->
							<h5 class="m-3 pt-3 qs_i">
								<b style='color:#FFBF00'>
									<a href="" data-toggle='modal' data-target='#khaosat'>Khao sat <?php echo $i . ": " . $row1['survey_describe']; ?></a>
								</b>
								<div>
									<h6>
										<small class="text-muted">
											<p style="display: inline" class="mb-1">Người tạo: <?php echo $row['name']; ?></p>
											<!--Tên người đặt câu hỏi -->
											<p>Thời gian tạo: <?php echo $row1['start_time_survey']; ?></p><!-- Thời gian đặt câu hỏi -->
										</small>
										<?php
											if ($row_us['role_id'] != 3) {
												echo "<small class='text-muted'>
													<a href='delete.php?ss_id=" . $_GET['ss_id'] . "&survey_id=" . $row1['survey_id'] . "' onclick='return confirm('Bạn có chắc chắn muốn xóa câu hỏi');'> Xóa</a>
												</small>";
											} ?>
									</h6>
								</div>

							</h5>
						</div>
					</div>
					<!--chọn lựa chọn-->
					<div id="khaosat" class="modal fade" role="dialog">
						<div class="modal-dialog modal-lg">
							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title">Khảo sát <?php echo $i . ": " . $row1['survey_describe']; ?></h4>
									<button type="button" class="close" data-dismiss="modal">&times;</button>
								</div>
								<div class="modal-body">
									<div class="row">
										<div class="container">
											<form method="post" action="/QAweb/teacher/create_survey.php?ss_id=<?= $row['ss_id'] ?>">
												<div class="modal-body">
													<p>Các lựa chọn:</p>
												</div>
												<div class="container-fluid">
													gyudsgfsdguigfi
												</div>
												<input type="submit" name="submit" class="btn btn-primary" value="OK" />
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end chọn lựa chọn-->
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