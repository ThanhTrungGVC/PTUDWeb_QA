<!DOCTYPE html>
<html>
<head>
	<title></title>
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

    <div class="card">
    	<div class="card-body">
    		<div style="background-color:#e5e5e5;width:100%;height:800px;">

	    		<nav class="navbar navbar-expand-sm" style="background-color:gray;width:100%;">
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#danhsachphienhoidap" style="background-color:#333333;color:white;height:50px">
				        Danh sách
				    </button>
	 
				    <div class="collapse navbar-collapse">
				        <ul class="navbar-nav mr-auto" style="background-color:#00ffff">
				            <li class="nav-item m-1">
				                <a class="nav-link" href="#" data-toggle="collapse" data-target="#danhsachphienhoidap" style="color:black;font-weight:bold;font-size: 20px">Danh sách phiên hỏi đáp <img src="danhsachqa.png" width="50px"></a>
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

				
				
				

				<div class= "container-fluid collapse" id="danhsachphienhoidap">
			        <div class= "row justify-content-start">
			            <div class ="col-md-3" style="background-color:#00ff00">
			               <div onclick="loadphien();">
				               	<a href="#">
				               		Phiên hỏi đáp đang hoạt động
				               	</a>
			           	   </div>
			               <br>
			               <div onclick="loadphien();">
				               	<a href="#">
				               		Phiên hỏi đáp đã đóng
				               	</a>
			           	   </div>
			               <br>
			               <div onclick="loadphien();">
				               	<a href="#">
				               		Tất cả câu hỏi
				               	</a>
			           	   </div>
			            </div>
			        </div>
    			</div>



    			
    			<div id="saukhichonphien"></div>
    			<h5 align="center">Không có nội dung nào</h5>
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