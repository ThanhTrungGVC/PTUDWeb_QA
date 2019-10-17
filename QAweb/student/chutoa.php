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
    <link href="./giaodien.css" rel="stylesheet"> 
</head>
<body>
	<div class="newbody" >
		<nav class="navbar navbar-expand-md navbar-light bg-light sticky-top" style="height: 100px">
				<div class="container-fluid" >
					<h2>DIỄN ĐÀN TRAO ĐỔI THÔNG TIN</h2>
					<!-- myclose() đóng trang web thay đổi thông tin đang hiển thị -->
				</div>
		</nav>
		<div class="newbody1" style="border-radius: 5px;">
			<div class="anhdaidien">
				<img src="iconnhanvat.png">
			</div>
			<div class="thongtin"  >

				<label><h6 style="margin-top: 30px">TÊN TÀI KHOẢN :</h6></label>
				<a id="name">nguyen van a</a></br>
				<label><h6>SỐ PHIÊN ĐÃ TẠO :</h6></label>
				<a id="event-number"> 100</a></br>
				<label id="number-of-questions"><h6>TỔNG SỐ CÂU HỎI :</h6></label>
				<a >650</a><br>
			</div>
			
		</div>
		<div class="newbody2" style="border-radius: 5px" >
			<h5 style="text-align: center; padding-top: 13px"> DANH SÁCH PHIÊN HỎI ĐÁP ĐÃ TẠO</h5>
		</div>
		<div  class="newbody3" style="border-radius: 5px ;overflow: auto" >
			<div class="anhcauhoi">
				<img src="iconcauhoi.png" style="height: 100px; margin-left: 37px; margin-top: 10px">
			</div>
			<div class="chude" id="chude" style="">

				<label><h6 style="margin-top: 12px">CHỦ ĐỀ :</h6></label>
				<a id="theme_1"> dien dan cau hoi</a></br>
				<label ><h6>ĐÃ TẠO :</h6></label>	
				<a id="time_1"> ngay trước</a>
				
				</a></br>
				<label><h6>SỐ CÂU HỎI :</h6></label>
				<a id="sum_1"> 4</a>	
				
			</div >	
				
		</div>	
		<div  class="newbody4" style="border-radius: 5px ;overflow: auto" >
			<div class="anhcauhoi">
				<img src="iconcauhoi.png" style="height: 100px; margin-left: 37px; margin-top: 10px">
			</div>
			<div class="chude" id="chude" style="">

				<label><h6 style="margin-top: 12px">CHỦ ĐỀ :</h6></label>
				<a id="theme_2"> dien dan cau hoi</a></br>
				<label ><h6>ĐÃ TẠO :</h6></label>	
				<a id="time_2"> ngay trước</a>
				
				</a></br>
				<label><h6>SỐ CÂU HỎI :</h6></label>
				<a id="sum_2"> 4</a>	
				
			</div >	
				
		</div>	
	</div>
</body>
</html>