<!DOCTYPE html>
<html>
<body>

<div>
<label > Mời bạn nhập số </label>
<input id="sobatki" type="number"/>
<button type="button" onclick="ktrachanle()"> Check </button>  
</div> 
<br>

<p id="kq"></p> 

<script type="text/javascript"> 
function ktrachanle(){
	var a = document.getElementById('sobatki').value;	 
	if (a % 2 == 0){
	    document.getElementById('kq').innerHTML= 'Số bạn vừa nhập'+a+'là số chẵn';
	}
	else{
	    document.getElementById('kq').innerHTML= 'Số bạn vừa nhập'+a+'là số lẻ';
	}
}
</script>
</body>
</html>