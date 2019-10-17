function myclose(){
    		window.close();
    }
function chuanhoa() 
			{
				names = document.getElementById('name');
				str = names.value.trim();
				str = str.replace(/\s+/g, ' ');
				var splitStr = str.split(' ');
					str = "";
				for (var i = 0; i < splitStr.length; i++) {
					if (str.length> 0) {str = str + " ";}
					str = str + splitStr[i].substring(0,1).toUpperCase();
					str = str + splitStr[i].substring(1).toLowerCase();
				 }
				
				names.value = str;
				
			}
function error(){
	var fullname = document.getElementById("name").value;
	var Email = document.getElementById('email').value
	if(fullname==""){
		alert("vui lòng điền đầy đủ thông tin họ tên ");
	}
	else if(Email=="" ){
		alert("vui lòng điền đầy đủ thông tin email");
	}
	else if(Email!=""){
		var email = document.getElementById('email'); 
	    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/; 
	    if (!filter.test(email.value)) { 
	             alert("E-mail nhập không hợp lệ");
	    }
	    else{
	    	alert("Thông tin tài khoản của bạn đã được thay đổi ");
	    }
	}
}