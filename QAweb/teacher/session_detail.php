<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Chi tiết phiên hỏi đáp</title>

	<!-- <link rel="shortcut icon" type="image/png" href="webimage/icon.png"/>



	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/css/mdb.min.css" rel="stylesheet">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.11/js/mdb.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/js/all.js"></script>
	<link rel="stylesheet" href="css/style.css">-->


	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> -->
	<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
	<!-- CSS, Boostrap -->
	<!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.css"> -->
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
	<link rel="stylesheet" href="css/style.css">
</head>

<body>
	<?php include "show_ss_detail.php"; ?>
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
					<h5>
						<b>Số lượng câu hỏi: </b> <?php echo $row['num_qs']; ?>
					</h5>
					<h5>
						<b>Số lượng khảo sát: </b> <?php echo 0; ?>
					</h5>
					<div>

					</div>
				</div>
				<div class="col-sm-4">
					<div>
						<h5>
							<b>Thời gian mở: </b>
						</h5>
						<h6>
							<?php echo $row['time_start']; ?>
						</h6>
					</div>
					<div>
						<h5>
							<b>Thời gian đóng:</b>
						</h5>
						<h6>
							<?php echo $row['time_end']; ?>
						</h6>
					</div>
				</div>

				<div class="col-sm-4">
					<!-- Nút lựa chọn -->
					<div>
						<div class="input-group-btn mt-2 d-inline">
							<button href="#" class="btn btn-primary aqua-gradient btn-sm m-0" type="submit" role="button">Sửa phiên</button>
						</div>
						<div class="input-group-btn mt-2 d-inline">
							<button class="btn btn-primary aqua-gradient btn-sm m-0" type="submit" role="button"><a href='delete.php?ss_id=<?= $row['ss_id'] ?>' class="text-white" style="text-decoration:none">Xóa phiên</a></button>
						</div>
					</div>
					<div class="input-group-btn mt-2">
						<button href="#" class="btn btn-primary aqua-gradient btn-sm m-0" type="submit" role="button"><a href='survey_session.php?ss_id=<?= $row['ss_id'] ?>' class="text-white" style="text-decoration:none">Quản lý khảo sát</a></button>
					</div>
					<?php if ($row['ss_status'] == 'action') {
						echo "
							<div class='input-group-btn mt-2'>
								<button href='#' class='btn btn-primary aqua-gradient btn-sm m-0' type='submit'
									role='button' data-toggle='modal' data-target='#taocauhoi'>Thêm câu hỏi </button>
							</div>
						";
					} ?>
				</div>

			</div>
		</div>

		<!-- show form add question -->
		<div class="modal" id="taocauhoi">
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
		</div>


		<!-- Các câu hỏi có trong phiên -->
		<div class="mt-4">
			<div class="pl-3 pt-2 text-center">
				<h2>Danh sách các câu hỏi</h2>
			</div>
			<div>
				<hr class="my-2">
				<!--Câu hỏi 1-->
				<?php
				$i = 1;
				while ($row_q = $result_q->fetch_assoc()) {
					?>
					<div class="container-fluid question">
						<div class="winter-neva-gradient">
							<!-- Phần câu hỏi -->
							<h5 class="m-3 pt-3 qs_i">
								<b <?php if ($row_q['role_id'] == 2) echo "style='color:#FFBF00;'"; ?>>Câu hỏi <?php echo $i . ": " . $row_q['content']; ?></b>
								<div>
									<h6>
										<small class="text-muted">
											<p style="display: inline" class="mb-1">Người tạo: <?php echo $row_q['name']; ?></p>
											<!--Tên người đặt câu hỏi -->
											<p style="display: inline; float: right; margin-right: 150px;"> Số câu trả lời: <?php echo $row_q['num_cmt']; ?></p>
											<p>Thời gian tạo: <?php echo $row_q['create_date']; ?></p><!-- Thời gian đặt câu hỏi -->
										</small>
										<small class="text-muted">
											<a href="delete.php?ss_id=<?php echo $_GET['ss_id']; ?>&q_id=<?php echo $row_q['question_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa câu hỏi');"> Xóa</a>
											<?php
												$us_ids = $_SESSION['us_id'];
												if ($row_q['user_id'] == $us_ids) {
													echo "<span> - </span><a href='#'>Sửa </a>";
												}
												?>
										</small>
									</h6>
								</div>

							</h5>

							<?php
								#include "delete.php";
								$qs_ids = $row_q['question_id'];
								$sql_c = "SELECT u.name, c.user_id, u.role_id, c.content, c.create_date, c.cmt_id, a.cmt_id AS 'DA' FROM comments c
											LEFT JOIN answers a ON a.cmt_id = c.cmt_id
											INNER JOIN users u ON c.user_id = u.user_id
											WHERE c.question_id = '$qs_ids'";
								$result_c = $conn->query($sql_c);

								while ($row_c = $result_c->fetch_assoc()) {
									?>
								<!-- Phần trả lời -->
								<div class="container-fluid anwser">
									<div>
										<div class="comment_c <?php if ($row_c['cmt_id'] == $row_c['DA']) echo 'Da'; ?>">
											<b class="text-primary c_left"><?php echo $row_c['name']; ?></b>
											<p class="mb-1 c_content c_right" <?php if ($row_c['role_id'] == 2) echo "style='color:#B43104; font-weight:bolder;'"; ?>>
												<?php echo $row_c['content']; ?><?php echo $row_c['cmt_id']; ?>
											</p>
										</div>
										<div>
											<h6>
												<small class="d-inline-block text-muted">
													<?php if ($_SESSION['us_id'] == $row_c['user_id'])
																echo "<a href='' data-toggle='modal' data-target='#myModal'>Sửa </a><span> - </span>"; ?>
													<a href="delete.php?ss_id=<?php echo $_GET['ss_id']; ?>&cmt_id=<?php echo $row_c['cmt_id']; ?>" onclick="return confirm('Ban co chac chan muon xoa');">Xóa</a>
													<span> - </span>
													<?php
															if ($row_c['cmt_id'] != $row_c['DA']) {
																?>
														<a href="add_comment.php?ss_id=<?php echo $_GET['ss_id'] ?>&qs_id=<?php echo $row_q['question_id'] ?>&cmt_id=<?php echo $row_c['cmt_id'] ?>">Chọn làm đáp án</a>
													<?php
															} else {
																?>
														<a href="add_comment.php?ss_id=<?php echo $_GET['ss_id'] ?>&qs_id=<?php echo $row_q['question_id'] ?>&cmt_id=<?php echo $row_c['cmt_id'] ?>&stt=del">Xóa đáp án đúng</a>
													<?php
															}
															?>

													<span> -- </span>
													<a><?php echo $row_c['create_date']; ?></a>
												</small>
												<!--MODAL-->
												<div class="modal fade" id="myModal" role="dialog">
													<div class="modal-dialog">

														<!-- Modal content-->
														<div class="modal-content">
															<div class="modal-header">
																<button type="button" class="close" data-dismiss="modal">&times;</button>
																<h4 class="modal-title">Sửa bình luận</h4>
															</div>
															<div class="modal-body">
																<form action="">
																	<input type="text" name="" id="">
																	<input type="text" name="" id="" value="<?php echo $row_c['cmt_id']; ?>"><?php echo $row_c['cmt_id']; ?>
																</form>
															</div>
															<div class="modal-footer">
																<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
															</div>
														</div>

													</div>
												</div>
												<!--END MODAL-->
											</h6>
										</div>
									</div>
								</div>
							<?php
								}
								?>

							<!-- Phần nhập câu trả lời-->
							<?php
								if ($row['ss_status'] == 'action') {
									?>
								<div class='container-fluid pb-3 anwser txt_as'>
									<form action="add_comment.php?ss_id=<?php echo $_GET['ss_id'] ?>&qs_id=<?php echo $row_q['question_id'] ?>" method='POST'>
										<input type='text' class='form-control' style='border-radius: 1rem;' name='comment' placeholder='Nhập câu trả lời'>
									</form>
								</div>
							<?php
								}
								?>
						</div>
					</div>
				<?php
					$i++;
				}
				?>
			</div>

		</div>
	</div>

</body>

</html>