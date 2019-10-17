<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!--<link rel="stylesheet" href="bootstrap.min.css">
	<script src="bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
	

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style type="text/css">
		a:hover{
			background-color:#7f7f7f;
		}
		
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-sm" style="background-color:#00ffff">
		<div class="navbar-nav navbar-expand">
			<ul class="navbar-nav ml-md-5">
				<li class="nav-item p-2 ml-md-5">
					<img src="logouet.png" width="60px">
				</li>
				<li class="nav-item p-2">
					<img src="logoqa.png" width="60px">
				</li>
			</ul>
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color:#333333;color:white;height:50px">
	        MENU
	    </button>
	 
	    <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav ml-auto nav-fill">
	            <li class="nav-item m-1">
	                <a class="nav-link" style="color:black;font-weight:bold;font-size:20px;background-color:#7f7f7f">Đăng Nhập</a>
	            </li>
	            <li class="nav-item m-1">
	                <a class="nav-link" href="#" data-toggle="collapse" data-target="#gioithieu" style="color:black;font-weight:bold;font-size: 20px">Giới Thiệu</a>
	            </li>
	            <li class="nav-item m-1">
	                <a class="nav-link" href="#" data-toggle="collapse" data-target="#huongdan" style="color:black;font-weight:bold;font-size: 20px">Hướng Dẫn</a>
	            </li>
	        </ul>
	    </div>
	</nav>

	<div class= "container-fluid collapse" id="gioithieu">
         <div class= "row justify-content-end">
            <div class ="col-md-3" style="background-color:#00ffff">
               <p>Đây là Website thảo luận và giải đáp thắc mắc cho cộng đồng sinh viên Đại Học Công Nghệ-Đại Học Quốc Gia Hà Nội.
               Được thiết kế nhằm mục đích giúp đỡ sinh viên.</p>
            </div>
         </div>
    </div>
	
	<div class= "container-fluid collapse" id="huongdan">
         <div class= "row justify-content-end">
            <div class ="col-md-3" style="background-color:#00ffff">
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
    		<div style="background-color:#999999;width:50%;height:300px;">
	    		<p style="font-size:20px;">Đăng Nhập Bằng Tài Khoản UETMAIL</p>
        	    <div>
	        	    <form>
					   <div class="row m-2">
					   	  <div class="col-md-2 col-sm-5" style="font-weight:bold;">Tài Khoản : </div>
					      <div class="col-md-10 col-sm-6">
					        <input type="text" class="form-control" placeholder="Email">
					      </div>
					   </div>

					   <div class="row m-2 w-100"></div>
					   <div class="row m-2 w-100"></div>
					  
					   <div class="row m-2">
					   	  <div class="col-md-2 col-sm-5" style="font-weight:bold;">Mật Khẩu : </div>
					      <div class="col-md-10 col-sm-6">
					        <input type="text" class="form-control" placeholder="password">
					      </div>
					   </div>

					   <div class="row m-2 w-100"></div>
					   <div class="row m-2 w-100"></div>

					   <div class="row m-2 justify-content-center">
					   	  <button type="submit" class="btn btn-primary">Đăng Nhập</button>
					   </div>

					   <div class="row m-2 w-100"></div>
					   <div class="row m-2 w-100"></div>

					   <div class="row m-2 justify-content-center">
					   	  <a href="dangky.php" class="btn btn-danger">Đăng Ký</a>
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