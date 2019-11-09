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
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
</head>
<body>


<nav class="navbar navbar-expand-sm" style="background-color:#00ffff">
		<div class="navbar-nav navbar-expand">
			<ul class="navbar-nav ml-md-5">
				<li class="nav-item p-2 ml-md-5">
					<a href="index.php"><img src="/QAweb/img/logouet.png" width="60px"></a>
				</li>
				<li class="nav-item p-2">
					<a href="index.php"><img src="/QAweb/img/logoqa.png" width="60px"></a>
				</li>
			</ul>
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color:#333333;color:white;height:50px">
	        MENU
        </button>
	 
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav ml-auto">
	            <li class="nav-item m-1">
                    <?php
                        if(!isset($_SESSION['us_id'])){
                            echo "<a class='nav-link' href='login.php' > Dang Nhap </a>";
                        } else {
                            $id = $_SESSION['us_id'];
                            $sql = "SELECT u.name, u.user_id, r.role_name, u.role_id FROM users u INNER JOIN roles r ON r.role_id = u.role_id WHERE u.user_id = '$id'";
                            $result = $conn->query($sql);
                            $row = $result->fetch_assoc();
                            echo "
                                <a class='nav-link' href='' data-toggle='collapse' data-target='#quanly' 
                                        style='color:black;font-weight:bold;font-size: 20px'>
                                        <img src='/QAweb/img/user.png' width='30px'>
                                " . $row['name'] . "</a>
                            ";
                        }
                    ?>
	            </li>
	        </ul>
	    </div>
    </nav>
    
    <div class= "container-fluid collapse" id="quanly">
         <div class= "row justify-content-end">
            <div class ="col-md-3" style="background-color:#007fff">
            	<div class="card m-3" style="float:left;">
            		<img src="/QAweb/img/user.png" width="80px">	
            	</div>
            	<div class="card m-3" style="background-color:#e5e5e5">
            		<div class="row">
            			<div class="col-md-9">
            				<img src="/QAweb/img/user.png" width="30px"> <?php echo $row['name'] . " ( ". $row['user_id'] . " )";  ?>
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="/QAweb/img/mu.png" width="30px"> Vai tro : <?php echo $row['role_name']; ?>
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
							<img src="/QAweb/img/donghonguoc.png" width="30px"> 
							<a href="SuaThongTinNguoiDung.php">Cập nhập thông tin</a>
            			</div>
					</div>
                    <?php
                        if ($row['role_id'] <= 2){
                            echo "
                                <div class='row'>
                                    <div class='col-md-9'>
                                        <img src='/QAweb/img/donghonguoc.png' width='30px'> 
                                        <a href='teacher/'>Tư cách giao vien</a>
                                    </div>
                                </div>
                            ";
                        }
                    ?>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="/QAweb/img/donghocat.png" width="30px"> <a href="logout.php">Dang xuat</a>
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

            $sql = "SELECT s.ss_id,u.user_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status,
				(SELECT COUNT(*) FROM questions q WHERE q.ss_id = s.ss_id) AS 'num_qs'
                FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_id = '$id_session'";
                
            $result = $conn->query($sql);

            if (!$result) {
                die('Error connect to datatbase session. Please try again!');
            } else{
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
				INNER JOIN users u ON q.user_id = u.user_id  AND  q.ss_id = '$id_session'";
				$result_q = $conn->query($sql_q);
        }
    ?>


	<div class= "container-fluid">
         <div class= "row">
            <div class ="col-md-12" style="background-color:#007fff">
            	<div class="card m-3" style="float:left;">
            		<img src="/QAweb/img/user.png" width="140px">	
            	</div>
            	<div class="card m-3">
            		<div>
                        <p style="display:inline;">TÊN PHIÊN HỎI ĐÁP:&emsp;&emsp;&emsp;&emsp;
                            <strong style="text-transform: uppercase; color: blue; font-size: 30px;"> 
                                <?php echo $row['ss_title']; ?>
                            </strong>
                        </p>
                        <p style="float: right; margin-right: 50px;">Trạng thái: <?php echo $stt; ?> </p>
            			<p>MÔ TẢ: <?php echo $row['ss_describe']; ?></p>
            			<p>ĐĂNG BỞI : <span style="color:red"><?php echo $row['name']; ?></span></p>	
                        <span>THỜI GIAN BẮT ĐẦU : <?php echo $row['time_start']; ?></span>
                        <span style="margin-left: 150px;">THỜI GIAN KẾT THÚC : <?php echo $row['time_end']; ?></span>
                        <span style="margin-left: 250px;">SỐ CÂU HỎI : <?php echo $row['num_qs']; ?></span>
            		</div>	
            	</div>
            </div>
         </div>
    </div>

    
		<nav class="navbar navbar-expand-sm" style="background-color:#e5e5e5;width:100%;">
			<?php
				if($stt == "Đang hoạt động"){
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
                    <a class="nav-link" href="khaosat.php"  style=";color:black;font-weight:bold;font-size: 20px">phiên khao sát</a>
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

    <div class= "container-fluid">
		<div class= "row">
		<?php 
		$i = 1;
		while($row_q = $result_q->fetch_assoc()){ ?>
			<div class ="col-md-12" style="background-color:#e5e5e5">
            	<div class="card m-3" style="float:left;">
            		<img src="/QAweb/img/user.png" width="90px">
            	</div>
            	<div class="card m-3" style="background: #A9A9F5;">
            		<div>
            			<p>Câu hỏi <?php echo $i; ?>:<strong <?php if($row_q['role_id'] == 2) echo "style='color:#FF0000;'"; ?>> <?php echo $row_q['content']; ?></strong></p>
            			<p>Đăng bởi : <span><b><?php echo $row_q['name']; ?></b></span></p>	
            			<span>Số câu trả lời: <?php echo $row_q['num_cmt']; ?>. Số lượt thích: <?php echo 0; ?></span>
						<?php
							if (isset($_SESSION['us_id'])){
								$us_ids = $_SESSION['us_id'];
								if($row_q['user_id'] == $us_ids){
									?>
									<a href="delete.php?q_id=<?php echo $row_q['question_id']; ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa?');">Xóa</a>
									<span> - </span>
									<a href='#'>Sửa </a>
									<?php
								}
							}
						?>
            		</div>
            	</div>
				<?php
					$qs_ids = $row_q['question_id'];
					$sql_c = "SELECT u.name, c.user_id, c.content, c.create_date, u.role_id, c.cmt_id, a.cmt_id AS 'DA' FROM comments c
								LEFT JOIN answers a ON a.cmt_id = c.cmt_id
								INNER JOIN users u ON c.user_id = u.user_id
								WHERE c.question_id = '$qs_ids'";
					$result_c = $conn->query($sql_c);

					while($row_c = $result_c->fetch_assoc()){
				?>
					<div class="col-md-11" style="float: right;margin-top: -10px;">
						
						<div class="comment_c <?php if($row_c['cmt_id'] == $row_c['DA']) echo 'Da'; ?>">
							<b class="text-primary c_left"><?php echo $row_c['name']; ?></b>
							<p class="mb-1 c_content c_right" 
								<?php if($row_c['role_id'] == 2) echo "style='color:#B43104; font-weight:bolder;'"; ?>>
								<?php echo $row_c['content']; ?>
							</p>
						</div>
						<div>
							<?php
								if (isset($_SESSION['us_id'])){
									$us_ids = $_SESSION['us_id'];
									if($row_c['user_id'] == $us_ids){
										?>
										<a href='delete.php?cmt_id=<?php echo $row_c['cmt_id']; ?>' style='float: left;margin-left: 3%' >Xóa câu trả lời  </a>
										<span>-</span>
										<a href='#' > Chỉnh sửa câu trả lời </a>
										<?php
									}
								}
							?>
						</div>
					</div>
				<?php
					}
				?>
				<!-- Phần nhập câu trả lời-->
				<?php
						if($row['ss_status'] == 'action'){
						?>
							<div class='container-fluid pb-3 anwser txt_as'>
								<form action="add_comment.php?ss_id=<?php echo $_GET['ss_id']?>&qs_id=<?php echo $row_q['question_id']?>" method='POST'>
									<input type='text' class='form-control' style='border-radius: 1rem;' name='comment'
											placeholder='Nhập câu trả lời'>
								</form>
							</div>
						<?php
						}
					?>
			</div><?php
			$i ++;
		}
		?>
		</div>
    </div>

</body>

</html>
