<!DOCTYPE html>
<html>
<head>
	<title> web</title> 
	<meta charset="utf-8">	
	<!-- Import Boostrap css, js, font awesome here -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">  
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link href="./style.css" rel="stylesheet">
    <script type="text/javascript" src="./bai1.js"> </script>
    
</head>
<body> 
	<script >
		
	</script>
	<div  class="dangnhap"  >
		<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" style="height: 70px">
			<div class="container-fluid">
				<h4 class="col-sm-5" href="#" style=" margin-left: 50px">
					ĐĂNG KÝ 
				</h4>
				<button style="color: red" onclick="myclose()" > x </button>
				<!-- myclose() đóng trang web thay đổi thông tin đang hiển thị -->
			</div>
		</nav>
		<div class="newbody" style="background-color: #FAFAFA">
			<div class="row justify-content-center" style="padding-top: 30px " >
				<div class="col-sm-12 row-container">
					<form class="form">
						<div class="avata" style="padding-left: 50px">
							<img src="https://vcdn-vnexpress.vnecdn.net/2019/07/30/3-1564483263_680x0.jpg" style="height: 150px;width: 200px;" id="image"><br>
							<br>
							<a href="#" style="margin-left: 60px ;" id="avata"> THAY AVATA</a>
							
						</div>
						<div class="thongtin" style="margin-top: 30px">
							<div class="form-group" >
								<label>
									<h4>Tên tài khoản :</h4> 
								</label>
								<input type="text" name="">
							</div>

							<div class="form-group" >
								<label>
									<h4>Mật Khẩu :</h4> 
								</label>
								<input type="password" name="">
							</div>
								
							<div class="form-group">
								<label>
									<h4>Nhập lại :</h4>
								 </label>
								<input type="password" id="name" name="" onblur="chuanhoa()" ></br>
							</div>
							<div class="form-group">
								<label>
									<h4> Email :</h4>
								</label>
								<input type="text" value="" id="email">
							</div>
						</div>
					</form>
				</div>
			</div> 
			<hr style="margin-top: 0px">
			<input  id="submit"  type="image" style="margin: -12px 	100px " src="icon.png" alt="SUBMIT" class="imge1"  onclick="error()" />
				<!--<img src="icon.png" >-->
		</div>
	</div>
</body>
</html>