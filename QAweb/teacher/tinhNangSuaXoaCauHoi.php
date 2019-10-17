<!DOCTYPE html>
<html>
<head>
	<title>danh sách phiên hỏi đáp</title>
	<meta charset="utf-8">	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Import Boostrap css, js, font awesome here -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">       
    <link href="https://use.fontawesome.com/releases/v5.0.4/css/all.css" rel="stylesheet">  
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <link href="./giaodien2.css" rel="stylesheet"> 
</head>
<body>
	<div class="newbody">
		<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" style="height: 100px">
					<div class="container-fluid" >
						<h2>DIỄN ĐÀN TRAO ĐỔI THÔNG TIN</h2>
						<!-- myclose() đóng trang web thay đổi thông tin đang hiển thị -->
					</div>
		</nav>
		<div class="newbody1" style="overflow: auto;border-radius:8px">
			
			<button  id="sarch" class="sarch" style="background-color: #2EFEF7 ; width: 150px; height: 50px ; margin-top: 10px; margin-left:105px ;margin-bottom: 10px ;border-radius:8px" >SARCH </button>
			
			<button id="question" style="background-color: #2EFEF7 ; width: 150px; height: 50px ; margin-top: 10px;float: right ;margin-right: 105px ; margin-bottom: 10px ;border-radius:8px">ĐẶT CÂU HỎI</button>
			
		</div>
		
		<div class="newbody2" style="overflow: auto; border-radius: 8px">
			<div style="padding-top: 20px ; padding-left: 50px ; overflow: auto;" class="theme" >
				<label><h5>CHỦ ĐỀ :</h5></label>
				<label id="even_name"> diễn đàn cau hỏi </label><br>
				<div class="time" style="padding-top: 90px" >
					<label >THỜI GIAN MỞ :</label>
					<label id="start-time"> 9h</label>
					<label  style="padding-left: 100px">THỜI GIAN ĐÓNG :</label>
					<label id="end-time"> 9h</label>
					<label style="padding-left: 100px"> NGƯỜI TẠO :</label>
					<label  id="user"> ad</label>
				</div>
			</div>
			<div class="option" style="overflow: auto" >
				
				<button id="repair" style="background-color: #2EFEF7 ; width: 150px; height: 30px ;margin-top: 10px ;border-radius:8px ; margin-top: 40px ; margin-right: 100px">sửa</button><br>
				<button id="delete" style="background-color: #2EFEF7 ; width: 150px; height: 30px ;margin-top: 10px ;border-radius:8px">xóa</button><br>
				<button id="closed" style="background-color: #2EFEF7 ; width: 150px; height: 30px ;margin-top: 10px ; margin-bottom: 30px ;border-radius:8px" >đóng ngay</button>
			</div>
		</div>
		
		<div class="newbody3" style="overflow: auto;border-radius:8px">
			<div  class="user" style=" padding-top:20px ; padding-left: 50px">
				<label><h6>TÊN NGƯỜI DÙNG : </h6></label>
				<label id="user-name"> nguyen van a</label>
				
				<h6 style="margin-top: 20px">NỘI DUNG TRẢ LỜI :</h6>
			</div>
			<textarea style="width: 40%; height: 120px ; margin-top: 80px ; margin-left: 20px"></textarea>
			<div class="user-option">
				<button style="background-color:#2EFEF7 ; width: 150px; height: 30px ;margin-top: 70px ; margin-right: 100px ;border-radius:8px">xóa conmemt</button><br>
				<button style="background-color: #2EFEF7 ; width: 150px; height: 30px ;margin-top: 20px ; margin-bottom: 10px ;border-radius:8px">đặt làm đáp án </button>
			</div>

		</div>
		<nav class="navbar navbar-expand-md navbar-light bg-light sticky-bottom" style="height: 40px">
					<div class="container-fluid" >
						
					</div>
		</nav>
	</div>
</body>
</html>