<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Đổi Tiền</title>
	<script>
			function doitien(so)
			{
				if (isNaN(so))
				{
					alert("Bạn phải nhập 1 số !!!");
				}
				else
				{
					var t100 = Math.floor(so / 100);
					var t50  = Math.floor((so - t100*100) / 50);
					var t20  = Math.floor((so -t100*100 - t50*50 )/20);
					var t10  = Math.floor((so -t100*100 - t50*50 - t20*20)/10);
					var t5   = Math.floor((so -t100*100 - t50*50 - t20*20 - t10*10)/5);
					var t2   = Math.floor((so -t100*100 - t50*50 - t20*20 - t10*10 -t5*5)/2);
					var t1   = Math.floor((so -t100*100 - t50*50 - t20*20 - t10*10 -t5*5 - t2*2));

					st100.innerHTML = "Số tờ 100 đồng: <span style='color:red'>" + t100 + "</span>";
					st50.innerHTML = "Số tờ 50 đồng: " + t50;
					st20.innerHTML = "Số tờ 20 đồng: " + t20;
					st10.innerHTML = "Số tờ 10 đồng: " + t10;
					st5.innerHTML = "Số tờ 5 đồng: " + t5;
					st2.innerHTML = "Số tờ 2 đồng: " + t2;
					st1.innerHTML = "Số tờ 1 đồng: " + t1;
				}

			}
	</script>
</head>
<body>
	<table align="center" width="400" border="1" bordercolor="#33DA03" bgcolor="#D9FED8"
               cellspacing="0" cellpadding="5">
		<tr>
			<td style="text-align:center;font-size: 30px">
				Đổi Tiền
			</td>
		</tr>
		<tr>
			<td>
				Nhập Số tiền:
				<input type="text" id="sotien" value="">
			</td>
		</tr>
		<tr align="center">
			<td>
				<input type="button" id="thaydoi" value=" Thực Hiện " onclick="doitien(parseInt(sotien.value));">
			</td>
		</tr>
		<tr>
			<td>
				<div id="st100">Số tờ 100đ: ??? </div>
				<div id="st50">Số tờ 50đ: ??? </div>
				<div id="st20">Số tờ 20đ: ??? </div>
				<div id="st10">Số tờ 10đ: ??? </div>
				<div id="st5">Số tờ 5đ: ??? </div>
				<div id="st2">Số tờ 2đ: ??? </div>
				<div id="st1">Số tờ 1đ: ??? </div>
			</td>
		</tr>
        </table>
</body>
</html>