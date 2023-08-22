 function tatden(){
            var pden = document.getElementById ('den');
            pden.style.fontSize ='40pt'; pden.style.color ='yellow';pden.innerHTML='den da tat';
        }
 function tinhtong2so(a,b){	
 	var sum = a+b;
 	return sum;
 }
  function tich2so(a,b){	
 	var tich = a*b;
 	return tich;
 }
 function kiemtrachanle(){
 	//alert('aaaa');
 	var a = document.getElementById('sobatki').value;
 	if(a%2==0){
 		document.getElementById('ketqua').innerHTML='Số ban vừa nhâp '+ a + 'là số chắn';
 	}
 	else{
 		document.getElementById('ketqua').innerHTML='Số ban vừa nhâp '+ a + 'là số lẻ';
 	
 	}
 }