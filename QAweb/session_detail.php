<?php
## start session
session_start();

## import connect.php
include "database/connect.php";

?>
<!DOCTYPE html>
<html>

<head>
	<title></title>
	<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> -->
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> -->
	<link rel="stylesheet" href="/QAweb/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="/QAweb/MDB/css/mdb.css">
	<!-- Javascript -->
	<script src="/QAweb/js/jquery-3.4.1.js"></script>
	<script src="/QAweb/js/popper.min.js"></script>
	<script src="/QAweb/bootstrap/js/bootstrap.min.js"></script>
	<script src="/QAweb/MDB/js/mdb.js"></script>
	<script type="text/javascript" src="/QAweb/fontawesome/js/all.js"></script>
	<script type="text/javascript" src="/QAweb/jcarousel/jquery.jcarousel.min.js"></script>
	<script type="text/javascript" src="/QAweb/jcarousel/jcarousel.responsive.js"></script>
	<link rel="stylesheet" href="css/main.css">
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
								echo "<a class='nav-link deep-blue-gradient hover_color' href='login.php' style='color: #0b52d4;'> Đăng nhập </a>";
							} else {
								$id = $_SESSION['us_id'];
								$sql1 = "SELECT u.name, u.user_id, r.role_name, u.role_id FROM users u INNER JOIN roles r ON r.role_id = u.role_id WHERE u.user_id = '$id'";
								$result1 = $conn->query($sql1);
								$row1 = $result1->fetch_assoc();
								echo "
								<i class='fas fa-user'></i>
								<a class='dropdown-toggle' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
								" . $row1['name'] . "
								</a>
								";
							}
							?>
							<ul class="dropdown-menu dropdown-menu-right" style="left=-43px; min-width:205px">
								<li class="ml-3">
									<i class="far fa-user mr-1"></i> <?php echo $row1['name'];  ?>
									<br>
									<i class="fas fa-graduation-cap"></i> Vai trò : <?php echo $row1['role_name']; ?>

								</li>

								<li class="dropdown-divider"></li>

								<li class="ml-3">
									<i class="fas fa-edit"></i>
									<a href="/QAweb/change_user.php?id=<?php echo $id ?>">Cập nhập thông tin</a>
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

	<?php
	# get id session
	if ($_GET['ss_id']) {
		$id_session = $_GET['ss_id'];

		$sql = "SELECT s.ss_id,u.role_id, u.user_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status,
				(SELECT COUNT(*) FROM questions q WHERE q.ss_id = s.ss_id) AS 'num_qs'
                FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_id = '$id_session'";

		$result = $conn->query($sql);

		if (!$result) {
			die('Error connect to datatbase session. Please try again!');
		} else {
			$row = $result->fetch_assoc();
			if ($row['ss_status'] == "action") {
				$stt = "Đang hoạt động";
			} elseif ($row['ss_status'] == "close") {
				$stt = "Đã đóng";
			}
		}

		# get info question
		$sql_q = "SELECT q.question_id, u.name, u.user_id, u.role_id, q.create_date, q.content,
					(SELECT COUNT(*) FROM comments c WHERE c.question_id = q.question_id) AS 'num_cmt'
				FROM questions q
				INNER JOIN users u ON q.user_id = u.user_id  AND  q.ss_id = '$id_session'
				ORDER BY q.question_id DESC";
		$result_q = $conn->query($sql_q);
	}
	?>


	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12" style="background-color:#007fff">
				<div class="card m-3" style="float:left;">
					<img src="/QAweb/img/user.png" width="140px">
				</div>
				<div class="card m-3">
					<div class="mx-auto">
						<p style="display:inline;">TÊN PHIÊN HỎI ĐÁP:&emsp;&emsp;&emsp;&emsp;
							<strong style="text-transform: uppercase; color: blue; font-size: 30px;">
								<?php echo $row['ss_title']; ?>
							</strong>
						</p>
						<p style="float: right;">Trạng thái: <?php echo $stt; ?> </p>
						<p>MÔ TẢ: <?php echo $row['ss_describe']; ?></p>
						<p>ĐĂNG BỞI : <span style="color:red"><?php echo $row['name']; ?></span></p>
						<span>THỜI GIAN BẮT ĐẦU : <?php echo $row['time_start']; ?></span>
						<span style="margin-left: 100px;">THỜI GIAN KẾT THÚC : <?php echo $row['time_end']; ?></span>
						<span style="margin-left: 248px;">SỐ CÂU HỎI : <?php echo $row['num_qs']; ?></span>
					</div>
				</div>
			</div>
		</div>
	</div>


	<nav class="navbar navbar-expand-sm" style="background-color:#e5e5e5;width:100%;">
		<?php
		if ($stt == "Đang hoạt động") {
			echo "
						<div class='collapse navbar-collapse'>
							<ul class='navbar-nav ' style='background-color:#00ff00;margin-left: 15%'>
								<li class='nav-item '>
									<a class='nav-link' href='#' data-toggle='modal' data-target='#datcauhoi' style='color:black;font-weight:bold;font-size: 20px'>Đặt câu hỏi</a>
								</li>
							</ul>
            			</div>
					";
		}
		?>

		<ul class="navbar-nav " style="background-color:#00ff00;margin-right: 15%">
			<li class="nav-item ">
				<a class="nav-link" href="survey_session.php?ss_id=<?= $row['ss_id'] ?>" style=";color:black;font-weight:bold;font-size: 20px">phiên khao sát</a>
			</li>
		</ul>

	</nav>
	<!-- show form add question -->
	<div class="modal" id="datcauhoi">
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

	<div class="container-fluid">
		<div class="row">
			<?php
			$i = 1;
			while ($row_q = $result_q->fetch_assoc()) { ?>
				<div class="col-md-12" style="background-color:#e5e5e5;border-bottom: 1px outset;">
					<div class="card m-3" style="float:left;">
						<img src="/QAweb/img/user.png" width="90px">
					</div>
					<div class="card m-3" style="background: #A9A9F5;">
						<div class="pl-2">
							<p>Câu hỏi <?php echo $i; ?>:<strong <?php if ($row_q['role_id'] == 2) echo "style='color:#FF0000;'"; ?>> <?php echo $row_q['content']; ?></strong></p>
							<p>Đăng bởi : <span><b><?php echo $row_q['name']; ?></b></span></p>
							<span>Số câu trả lời: <?php echo $row_q['num_cmt']; ?>. Số lượt thích: <?php echo 0; ?></span>
							<?php
								if (isset($_SESSION['us_id'])) {
									$us_ids = $_SESSION['us_id'];
									if ($row_q['user_id'] == $us_ids) {
										?>
									<a href="delete.php?q_id=<?php echo $row_q['question_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
									<span> - </span>
									<a href='' data-toggle='modal' data-target='#mySession<?php echo $row_q['question_id'];?>'>Sửa </a>
							<?php
									}
								}
								?>
						</div>
						<div id="mySession<?php echo $row_q['question_id']?>" class="modal fade" tabindex="-6" role="dialog">
							<div class="modal-dialog modal-lg">
								<!-- Modal content-->
								<div class="modal-content aqua-gradient">
									<div class="modal-body">
										<div class="row">
											<div class="container">
												<form method="post" action="/QAweb/edit_session.php">
													<div>
														<div class="modal-header p-0 p-1">
														<h5>Sửa nội dung:</h5>
														<button type="button" class="close" data-dismiss="modal">&times;</button>
														</div>
														<div class="input-group">
															<input type="text" class="form-control" name="question_content" value="<?php echo $row_q['content']; ?>" required>
															<input type="hidden" class="form-control" name="question_id" value="<?php echo $row_q['question_id']; ?>" required>
															<input type="hidden" class="form-control" name="ss_id" value="<?php echo $_GET['ss_id']; ?>" required>
															<div class="input-group-append">
																<input type="submit" name="edit_question1" class="btn btn-primary m-0" style="padding: 9px;" value="Sửa" />
															</div>
														</div>
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php
						$qs_ids = $row_q['question_id'];
						$sql_c = "SELECT u.name, c.user_id, c.content, c.create_date, u.role_id, c.cmt_id, a.cmt_id AS 'DA' FROM comments c
								LEFT JOIN answers a ON a.cmt_id = c.cmt_id
								INNER JOIN users u ON c.user_id = u.user_id
								WHERE c.question_id = '$qs_ids'";
						$result_c = $conn->query($sql_c);

						while ($row_c = $result_c->fetch_assoc()) {
							?>
						<div class="col-md-11 px-4" style="float: right;margin-top: -10px;">

							<div class="comment_c <?php if ($row_c['cmt_id'] == $row_c['DA']) echo 'Da'; ?> mb-2">
								<b class="text-primary c_left"><?php echo $row_c['name']; ?></b>
								<p class="mb-1 c_content c_right" <?php if ($row_c['role_id'] == 2) echo "style='color:#B43104; font-weight:bolder;'"; ?>>
									<?php echo $row_c['content']; ?>
								</p>
							</div>
							<div>
								<?php
										if (isset($_SESSION['us_id'])) {
											$us_ids = $_SESSION['us_id'];
											if ($row_c['user_id'] == $us_ids) {
												?>
										<a href='delete.php?cmt_id=<?php echo $row_c['cmt_id']; ?>' style='float: left;margin-left: 3%'>Xóa câu trả lời </a>
										<span>-</span>
										<a  href='' data-toggle='modal' data-target='#myModal<?php echo $row_c['cmt_id'];?>'> Chỉnh sửa câu trả lời </a>
								<?php
											}
										}
										?>
							</div>
							<!--MODAL-->
							<div id="myModal<?php echo $row_c['cmt_id']?>" class="modal fade" tabindex="-6" role="dialog">
								<div class="modal-dialog modal-lg">
									<!-- Modal content-->
									<div class="modal-content aqua-gradient">
										<div class="modal-body">
											<div class="row">
												<div class="container">
													<form method="post" action="/QAweb/edit_session.php">
														<div>
															<div class="modal-header p-0 p-1">
															<h5>Sửa nội dung:</h5>
															<button type="button" class="close" data-dismiss="modal">&times;</button>
															</div>
															<div class="input-group">
																<input type="text" class="form-control" name="comment_content" value="<?php echo $row_c['content']; ?>" required>
																<input type="hidden" class="form-control" name="comment_id" value="<?php echo $row_c['cmt_id']; ?>" required>
																<input type="hidden" class="form-control" name="ss_id" value="<?php echo $_GET['ss_id']; ?>" required>
																<div class="input-group-append">
																	<input type="submit" name="edit_comment1" class="btn btn-primary m-0" style="padding: 9px;" value="Sửa" />
																</div>
															</div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!--END MODAL-->
						</div>
					<?php
						}
						?>
					<!-- Phần nhập câu trả lời-->
					<?php
						if ($row['ss_status'] == 'action') {
							if (isset($_SESSION['us_id'])) {?>
								<div class='col-md-11 float-right px-4 mb-3'>
								<form action="add_comment.php?ss_id=<?php echo $_GET['ss_id'] ?>&qs_id=<?php echo $row_q['question_id'] ?>" method='POST'>
									<div style="margin-right: 115px;">									
										<input type='text' class='form-control' style='border-radius: 1rem;' name='comment' placeholder='Nhập câu trả lời'>
									</div>
								</form>
							</div>
							<?php
							}else{?>
							<div class='col-md-11 float-right px-4 mb-3'>
								<form action="add_comment.php?ss_id=<?php echo $_GET['ss_id'] ?>&qs_id=<?php echo $row_q['question_id'] ?>" method='POST'>
									<div style="margin-right: 115px;">
										<div class="input-group mb-3">    
											<input type='text' class='form-control' name='comment' style="border-radius: 18px 0px 0px 18px;" placeholder='Nhập câu trả lời' required>
											<input type="text" class="form-control col-sm-2" name='name' placeholder="Nhập tên (Bắt buộc)" required>
											<input type="submit" class="btn blue-gradient btn-sm px-3 m-auto" name='submit' style="border-radius: 0px 18px 18px 0px;font-size:14px;" value="Gửi">
										</div>
									</div>
								</form>
							</div>
							<?php
							}
						}
						?>
				</div>
			<?php
				$i++;
			}
			?>
		</div>
	</div>
	<br>

</body>

</html>