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

            $sql = "SELECT s.ss_id, s.ss_title, s.ss_describe, u.name, s.create_date, s.create_date, s.time_start, s.time_end, s.ss_pass, s.ss_status
                FROM sessions s INNER JOIN users u ON s.user_id = u.user_id WHERE s.ss_id = '$id_session'";
                
            $result = $conn->query($sql);

            if (!$result) {
                die('Error connect to datatbase session. Please try again!');
            } else{
                $row = $result->fetch_assoc();
            }
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
                        <p style="float: right; margin-right: 50px;">Trang thai: <?php echo $row['ss_status']; ?> </p>
            			<p>MÔ TẢ: <?php echo $row['ss_describe']; ?></p>
            			<p>ĐĂNG BỞI : <span style="color:red"><?php echo $row['name']; ?></span></p>	
                        <span>THỜI GIAN BAT DAU : <?php echo $row['time_start']; ?></span>
                        <span style="margin-left: 150px;">THỜI GIAN KET THUC : <?php echo $row['time_end']; ?></span>
                        <span style="margin-left: 250px;">SO CAU HOI : <?php echo 5; ?></span>
            		</div>	
            	</div>
            </div>
         </div>
    </div>

    
        <nav class="navbar navbar-expand-sm" style="background-color:#e5e5e5;width:100%;">
					<button class="navbar-toggler" type="button" data-toggle="modal" data-target="#datcauhoi" style="background-color:#00ff00;color:black;height:50px">
				        Đặt câu hỏi
				    </button>
	 
				    <div class="collapse navbar-collapse">
				        <ul class="navbar-nav mr-auto" style="background-color:#00ff00">
				            <li class="nav-item ">
				                <a class="nav-link" href="#" data-toggle="modal" data-target="#datcauhoi" style="color:black;font-weight:bold;font-size: 20px">Đặt câu hỏi</a>
				            </li>
				        </ul>
				    </div>

				    <ul class="navbar-nav ml-auto">
			           <li class="nav-item">
			              <input type="text" class="form-control" placeholder="Search">
			           </li>
			           <li class="nav-item">
			              <button type="submit"><img src="/QAweb/img/timkiem.png" width="30px"></button>
			           </li>
        		    </ul>

		</nav>

			<div class="modal" id="datcauhoi">
			         <div class="modal-dialog">
			            <div class="modal-content">
			               <div class="modal-header" style="background-color:#07eaea">
			                  <h4 class="modal-title" style="text-align:center;">Đặt câu hỏi</h4>
			                  <button class="close" data-dismiss="modal">&times;</button>
			               </div>
			       
			               <div class="modal-body">
			                  <label>NỘI DUNG CÂU HỎI :</label>
			                  <textarea class="form-control" rows="5" id="comment"></textarea>
			               </div>
			              
			               <div class="modal-footer">
			                  <button type="button" class="btn btn-danger" data-dismiss="modal">Ẩn danh</button>
			                  <button type="button" class="btn btn-primary" data-dismiss="modal">Xác nhận</button>
			               </div>
			            </div>
			         </div>
      		    </div>
   

    <div class= "container-fluid">
         <div class= "row">
            <div class ="col-md-12" style="background-color:#e5e5e5">
            	<div class="card m-3" style="float:left;">
            		<img src="/QAweb/img/user.png" width="80px">	
            	</div>
            	<div class="card m-3">
            		<div>
            			<p>Tóm tắt câu hỏi...</p>
            			<p>ĐĂNG BỞI : <span style="color:red">TÊN TÀI KHOẢN</span>/KHUYẾT DANH</p>	
            			<span>Số câu trả lời :&nbsp&nbsp&nbsp&nbsp&nbsp Số lượt thích :</span>
            		</div>	
            	</div>
            </div>
         </div>
    </div>
</body>
</html>