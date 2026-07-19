<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quan Ly Sinh Vien</title>
</head>

<body>

	<div>
		<label > Nhập Họ Tên </label>
		<input id="hoten" type="text"/>
	</div> 

	<br>

	<div>
		<label > Nhập Điểm thi </label>
		<input id="diemthi" type="number"/>
	</div> 

	<br>

	<button type="button" onclick="kq()"> Kết Quả </button>  

	<br><br>

	- Họ và Tên: <p id="ht"></p>

	<br>

    - Xếp Loại: <p id="xl"></p>

	<br>

    - Kết Quả: <p id="ketqua"></p>

	<script> 
		function kq(){
			//alert('aaa')
            var fn= document.getElementById('hoten').value; // lay ho ten nhap vao
            var fnhoa = fn.toUpperCase(); // chu hoa
            var name = document.getElementById('ht');  // dinh dang Ho Ten
            name.style.fontSize = '40pt';  // size 40pt
            name.style.color = 'gree'; // mau xanh 
            name.innerHTML = fnhoa    // gan Ho Ten vao 
            /*
            var diem = document.getElementByID('diemthi').value;

            if(diem<5){
                document.getElementByID('ketqua').innerHTML="Rớt";
            }
            else if (diem>=5){
                document.getElementByID('ketqua').innerHTML="Đậu";
            }

            if(diem>=9){
                document.getElementByID('xl').innerHTML="Xuất sắc";
            }
            else if (diem>=8){
                document.getElementByID('xl').innerHTML="Giỏi";
            }
            else if (diem>=7){
                document.getElementByID('xl').innerHTML="Khá";
            }
            else if (diem>=6){
                document.getElementByID('xl').innerHTML="TB";
            }
            else {
                document.getElementByID('xl').innerHTML="Yeu";
            }
	}*/
	}
	</script>
</body>
</html>