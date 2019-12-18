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
	<?php include "show_ss_detail.php"; ?>
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
														<a href='/QAweb/teacher/'>Tư cách giao viên</a>
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
			<hr>
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
						<b>Số lượng khảo sát: </b> <?php echo $row['num_sur']; ?>
					</h5>
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
							<button href="#" class="btn btn-primary aqua-gradient btn-sm m-0" type="submit" role='button' data-toggle='modal' data-target='#sua'>Sửa phiên</button>
						</div>
						<div class="input-group-btn mt-2 d-inline">
							<a href='delete.php?ss_id=<?= $row['ss_id'] ?>'>
								<button class="btn btn-primary aqua-gradient btn-sm m-0" type="submit" role="button" onclick="return confirm('Bạn chắc chắn muốn xóa phiên?');">Xóa phiên</button>
							</a>
						</div>
					</div>
					<div class="input-group-btn mt-2">
						<a href='survey_session.php?ss_id=<?= $row['ss_id'] ?>'>
							<button href="#" class="btn btn-primary aqua-gradient btn-sm m-0" type="submit" role="button">Quản lý khảo sát</button>
						</a>
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

		<!-- hiện form sửa thông tin phiên  -->
		<div class="modal" id="sua">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header" style="background-color:#07eaea">
						<h4 class="modal-title" style="text-align:center;">TẠO PHIÊN HỎI ĐÁP</h4>
						<button class="close" data-dismiss="modal">&times;</button>
					</div>
					<form action="/QAweb/edit_session.php" method="POST">
						<div class="modal-body">
							<label>TIÊU ĐỀ:</label>
							<input name="title_in" type="text" class="form-control" value="<?php echo $row['ss_title']; ?>" disabled>
							<input type="hidden" name="id" value="<?php echo $row['ss_id']; ?>">
							<label>MÔ TẢ:</label>
							<textarea name="describe_in" class="form-control mb-3" rows="5" id="comment"><?php echo $row['ss_describe']; ?></textarea>
							<label> Thời gian bắt đầu: </label>
							<div>
								<input name="time_start_in" type="datetime-local" value="<?php $start = $row['time_start'];
								$start = str_replace(' ', 'T', $start);
								echo $start;?>" min="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
								$timestamp = date('Y-m-d H:i');$timestamp = str_replace(' ', 'T', $timestamp); echo $timestamp;?>"><br>
							</div>
							<label> Thời gian kết thúc: </label>
							<div>
								<input name="time_end_in" type="datetime-local" value="<?php $end = $row['time_end'];
								$end = str_replace(' ', 'T', $end);
								echo $end;?>" min="<?php date_default_timezone_set('Asia/Ho_Chi_Minh');
								$timestamp = date('Y-m-d H:i');$timestamp = str_replace(' ', 'T', $timestamp); echo $timestamp;?>"><br>
							</div>
							<label>Mật khẩu: </label>
							<div>
								<input name="pass_in" type="text" style="min-width: 222px;" value="<?php echo $row['ss_pass'];?>">
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
		<!-- End hiện form sửa thông tin phiên  -->

		<!-- Các câu hỏi có trong phiên -->
		<div class="mt-4">
			<div class="pl-3 pt-2 text-center">
				<h2>Danh sách các câu hỏi</h2>
			</div>
			<div>
				<hr>
				<!--Câu hỏi 1-->
				<?php
				$i = 1;
				while ($row_q = $result_q->fetch_assoc()) {
					?>
					<div class="container-fluid question">
						<div class="winter-neva-gradient py-2">
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
													echo "<span> - </span><a href='' data-toggle='modal' data-target='#mySession".$row_q['question_id']."'>Sửa </a>";
												}
												?>
										</small>
										<!--MODAL-->
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
																				<input type="submit" name="edit_question" class="btn btn-primary m-0" style="padding: 9px;" value="Sửa" />
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
												<?php echo $row_c['content']; ?>
											</p>
										</div>
										<div>
											<h6>
												<small class="d-inline-block text-muted">
													<?php if ($_SESSION['us_id'] == $row_c['user_id'])
																echo "<a href='' data-toggle='modal' data-target='#myModal".$row_c['cmt_id']."'>Sửa </a><span> - </span>"; ?>
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
																						<input type="submit" name="edit_comment" class="btn btn-primary m-0" style="padding: 9px;" value="Sửa" />
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