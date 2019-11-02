<?php include "create_session.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Quan Tri Cac Phien</title>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<style type="text/css">
		li a:hover{
			background-color:#0000ff;
		}
		
	</style>
</head>
<body>
	<nav class="navbar navbar-expand-sm" style="background-color:#00ffff">
		<div class="navbar-nav navbar-expand">
			<a href="index.php">
			<ul class="navbar-nav ml-md-5">
				<li class="nav-item p-2 ml-md-5">
					<img src="/QAweb/img/logouet.png" width="60px">
				</li>
				<li class="nav-item p-2">
					<img src="/QAweb/img/logoqa.png" width="60px">
				</li>
			</ul></a>
		</div>

		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color:#333333;color:white;height:50px">
	        MENU
	    </button>
	 
	    <div class="collapse navbar-collapse" id="collapsibleNavbar">
	        <ul class="navbar-nav ml-auto">
	            <li class="nav-item m-1">
	                <a class="nav-link" href="#" data-toggle="collapse" data-target="#quanly" style="color:black;font-weight:bold;font-size: 20px">Quản Lý <img src="/QAweb/img/muiten.png" width="25px"></a>
	            </li>
	            <li class="nav-item m-1">
	                <a class="nav-link" href="#" data-toggle="collapse" data-target="#user"><img src="/QAweb/img/user.png" width="30px"> <img src="/QAweb/img/muiten.png" width="25px"></a>
	            </li>
	        </ul>
	    </div>
	</nav>

	<div class= "container-fluid collapse" id="quanly">
         <div class= "row justify-content-end">
            <div class ="col-md-5" style="background-color:#007fff">
            	<div class="card m-3" style="float:left;">
            		<img src="/QAweb/img/user.png" width="80px">	
            	</div>
            	<div class="card m-3" style="background-color:#e5e5e5">
            		<div class="row">
            			<div class="col-md-9">
            				<img src="/QAweb/img/user.png" width="30px"> Phạm Đức Long (17020866)
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="/QAweb/img/mu.png" width="30px"> Chức vụ : Chủ Tọa
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="/QAweb/img/dauhoi.png" width="30px"> Tổng số câu hỏi : 0
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="/QAweb/img/donghonguoc.png" width="30px"> Lần cuối đặt câu hỏi : N/A
            			</div>
            		</div>

            		<div class="row">
            			<div class="col-md-9">
            				<img src="/QAweb/img/donghocat.png" width="30px"> Câu hỏi chưa trả lời : 0
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
               <div>Chức vụ : Chủ tọa</div>
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

    <div class="card">
    	<div class="card-body">
    		<div style="background-color:#999999;width:100%;height:800px;">

    			<nav class="navbar navbar-expand-sm" style="background-color:gray;width:100%;">
					<button class="navbar-toggler" type="button" data-toggle="modal" data-target="#taophienhoidap" style="background-color:#333333;color:white;height:50px">
				        Tạo phiên
				    </button>
	 
				    <div class="collapse navbar-collapse">
				        <ul class="navbar-nav mr-auto" style="background-color:#00ffff">
				            <li class="nav-item m-1">
				                <a class="nav-link" href="#" data-toggle="modal" data-target="#taophienhoidap" style="color:black;font-weight:bold;font-size:20px;width:304px;text-align:right;">Tạo phiên hỏi đáp <img src="/QAweb/img/danhsachqa.png" width="50px"></a>
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


				<div class="modal" id="taophienhoidap">
			         <div class="modal-dialog">
			            <div class="modal-content">
			               <div class="modal-header" style="background-color:#07eaea">
			                  <h4 class="modal-title" style="text-align:center;">TẠO PHIÊN HỎI ĐÁP</h4>
			                  <button class="close" data-dismiss="modal">&times;</button>
			               </div>
			       			<form action="" method="POST">
								<div class="modal-body">
									<label>TIÊU ĐỀ:</label>
									<input name="title_in" type="text" class="form-control">
									<label>MÔ TẢ:</label>
									<textarea name="describe_in" class="form-control" rows="5" id="comment"></textarea>
									<label> Thời gian bắt đầu: </label> 
									<input name="time_start_in" type="datetime-local"> <br>
									<label> Thời gian kết thúc: </label>
									<input name="time_end_in" type="datetime-local"> <br>
									<label>Mat khau: </label>
									<input name="pass_in" type="password"> 
								</div>
								
								<div class="modal-footer">
									<button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
									<button type="submit" class="btn btn-primary" name="btn_create_ss">Xác nhận</button>
								</div>
			       			</form>
			            </div>
			         </div>
      		    </div>


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

				    <button class="navbar-toggler" type="button" data-toggle="modal" data-target="#taophienkhaosat" style="background-color:#333333;color:white;height:50px">
				        Khảo sát
				    </button>
	 
				    <div class="collapse navbar-collapse">
				        <ul class="navbar-nav ml-auto" style="background-color:#00ffff">
				            <li class="nav-item m-1">
				                <a class="nav-link" href="#" data-toggle="modal" data-target="#taophienkhaosat" style="color:black;font-weight:bold;font-size: 20px">Tạo phiên khảo sát <img src="/QAweb/img/danhsachqa.png" width="50px"></a>
				            </li>
				        </ul>
				    </div>

				</nav>

				<div class="modal" id="taophienkhaosat">
			         <div class="modal-dialog">
			            <div class="modal-content">
			               <div class="modal-header" style="background-color:#07eaea">
			                  <h4 class="modal-title" style="text-align:center;">PHIÊN KHẢO SÁT</h4>
			                  <button class="close" data-dismiss="modal">&times;</button>
			               </div>
			       
			               <div class="modal-body">
			               	  <h3>Câu 1 : </h3>
			                  <label>Nhập nội dung :</label>
			                  <input type="text" class="form-control">
			                  <br>
			                  <div class="form-inline">
			                  	  <input type="checkbox"> &nbsp&nbsp&nbsp&nbsp
				                  <input type="text" class="form-control" placeholder="Lựa chọn 1" size="30">
			                  </div>
			                  <br>
			                  <div class="form-inline">
				                  <input type="checkbox"> &nbsp&nbsp&nbsp&nbsp
				                  <input type="text" class="form-control" placeholder="Lựa chọn 2" size="30">
			                  </div>
			                  <br>
			                  <input type="text" class="form-control" placeholder="Khác...">
			               </div>
			              
			               <div class="modal-footer">
			                  <button type="button" class="btn btn-info">Thêm Câu</button>
			                  <button type="button" class="btn btn-success">Xác Nhận</button>
			               </div>
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
				
				<?php include("saukhichonphien.php");?>
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