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
	        <ul class="navbar-nav ml-auto">
	            <li class="nav-item m-1">
	                <a class="nav-link" href="#" data-toggle="collapse" data-target="#quanly" style="color:black;font-weight:bold;font-size: 20px">Quản Lý <img src="muiten.png" width="25px"></a>
	            </li>
	            <li class="nav-item m-1">
	                <a class="nav-link" href="#" data-toggle="collapse" data-target="#user"><img src="user.png" width="30px"> <img src="muiten.png" width="25px"></a>
	            </li>
	        </ul>
	    </div>
	</nav>

	<div class= "container-fluid collapse" id="quanly">
         <div class= "row justify-content-end">
            <div class ="col-md-5" style="background-color:#007fff">
            	<div class="card m-3" style="float:left;">
            		<img src="user.png" width="80px">	
            	</div>
            	<div class="card m-3" style="background-color:#e5e5e5">
            		<div class="row">
            			<div class="col-md-9">
            				<img src="user.png" width="30px"> Phạm Đức Long (17020866)
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="mu.png" width="30px"> Chức vụ : Thành viên
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="dauhoi.png" width="30px"> Tổng số câu hỏi : 0
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="donghonguoc.png" width="30px"> Lần cuối đặt câu hỏi : N/A
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="donghocat.png" width="30px"> Câu hỏi chưa trả lời : 0
            			</div>
            		</div>
            	</div>

            	
            		<div>Danh sách câu hỏi hiển thị</div>
      
            </div>
         </div>
    </div>
	
	<div class= "container-fluid collapse" id="user">
         <div class= "row justify-content-end">
            <div class ="col-md-3" style="background-color:#00ff00">
               <div>Phạm Đức Long</div>
               <br>
               <div>Chức vụ : Thành viên</div>
               <br>
               <div>
                    <a href="SuaThongTinNguoiDung.php">
                        Cập nhập thông tin
                    </a>
               </div>
               <br>
               <div>
                    <a href="#">
                        Đăng xuất
                    </a>
               </div>
            </div>
         </div>
    </div>



	<div class= "container-fluid">
         <div class= "row">
            <div class ="col-md-12" style="background-color:#007fff">
            	<div class="card m-3" style="float:left;">
            		<img src="user.png" width="140px">	
            	</div>
            	<div class="card m-3">
            		<div>
            			<p>TÊN PHIÊN HỎI ĐÁP</p>
            			<p>MÔ TẢ : </p>
            			<p>ĐĂNG BỞI : <span style="color:red">TÊN TÀI KHOẢN</span></p>	
            			<span>THỜI GIAN TẠO : NGÀY TRƯỚC</span>
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
			              <button type="submit"><img src="timkiem.png" width="30px"></button>
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
            		<img src="user.png" width="80px">	
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