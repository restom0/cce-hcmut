<!-- 
	Cho mảng gồm các số 8,100,125,50,90,5,77,12
	1.in ra số lớn nhất trong mảng
	2.tinh tong tất cả các ptu trong mang
	3.tinh tong các ptu chia hết cho 5
	4.in ra so nhỏ nhì trong mảng
	5.in ra các so không chia hết cho 25
	note: câu 3,5 phải sử dụng call function (viết hàm chia hết cho 5 và không khia hết cho 25 riêng và gọi lại hàm)
-->
<h1>Bài tập mảng</h1>
* <b>Mảng các số: <span id="mangso"></span></b><br>
1.<b>Số lớn nhât là: <span id="lonnhat"></span></b><br>
2.<b>Tỏng các số: <span id="tong"></span></b><br>
3.<b>Tỏng các số chia hết cho 5: <span id="chia5"></span></b><br>
4.<b>Số nhỏ nhì trong mảng: <span id="nhonhi"></span></b><br>
5.<b>Các số chia hết cho 25: <span id="chia25"></span></b><br>
<script>
	const mang= [8,100,125,50,90,5,77,12];
	document.getElementById('mangso').innerHTML= mang;//in ra ds mảng
	//cau 1: in ra số lớn nhât
	var solon = mang[0];
	for (var i = 1; i < mang.length - 1; i++) {
		if(mang[i]>solon){
			solon= mang[i];
		}
	}
	document.getElementById('lonnhat').innerHTML= solon;
	//cau 2:tinh tong cac phan tu trong mang
	var sum =0;
	for (var i = 0; i < mang.length ; i++) {
		sum += mang[i];
	}
	document.getElementById('tong').innerHTML= sum;
	//cau 3: canh 1:tinh tong cac phan tu chia het cho 5
	var tong5 =0;
	for (var i = 0; i < mang.length ; i++) {
		if(mang[i]%5==0){
			tong5 += mang[i];
		}
	}
	document.getElementById('chia5').innerHTML= tong5;
	//câu 3: cách 2:tinh tong cac ptu chia het cho 5 bang function
	function chiahet5(a){
		if(a%5==0){
			return true;
		}
	}
	var tongchia5=0
	for (var i = 0; i < mang.length ; i++) {
		if(chiahet5(mang[i])){
			tongchia5 += mang[i];
		}
	}
	alert(tongchia5);
	//câu 4: tìm số nhỏ nhì
	var nhonhat=mang[0];
	for (var i = 1; i < mang.length - 1; i++) {
		if(mang[i]<nhonhat){
			nhonhat= mang[i];
		}
	}
	var nhonhi=mang[0];
	for (var i = 1; i < mang.length - 1; i++) {
		if(mang[i]>nhonhat && mang[i]<=nhonhi){
			nhonhi= mang[i];
		}
	}
	document.getElementById('nhonhi').innerHTML= nhonhi;
	//Câu 5: in ra cac so chia het cho 25
	var mangb=[];
	for(var i=0; i<mang.length; i++){
		if(mang[i]%25==0){
			mangb.push(mang[i]);
		}
	}
	
	document.getElementById('chia25').innerHTML= mangb;

</script>
