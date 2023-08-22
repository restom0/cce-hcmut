<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Đồng hồ hiện tại</h1>
	<h2> Hôm nay là:<span id='dh'></span></h2>
	<h2>Đến tết còn: <span id='abc'></span></h2>
<script>
	//đòng hồ
	setInterval(dongho,1000);
	function dongho(){
		var date= new Date();
		document.getElementById("dh").innerHTML = date;
	}
	//dh đếm ngược
	var a=setInterval(coutdown,1000);
	function coutdown(){
		var date = new Date();
		var tet = new Date('2023-08-10 20:28:00');
		var kc= (tet - date)/1000;//tinh ra giay
		var ngay = Math.floor(kc/(60*60*24));// tính ngày
		var gio =Math.floor(kc%(60*60*24)/(60*60));
		var phut =Math.floor(kc%(60*60)/(60));
		var giay =Math.floor(kc%60);
		if(kc<1){
			clearInterval(a);
			document.getElementById("abc").innerHTML= "Nghỉ về đi chơi";
		}
		else{
			document.getElementById("abc").innerHTML = ngay + ' ' + gio + ' ' + phut +' '+giay;
		}	
		
	}

</script>
</body>
</html>