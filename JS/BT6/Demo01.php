<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Demo JQuery</title>
</head>
<body>
        <div class="abc">Chào Bạn </div>
        <div class="def">chúc mừng bạn</div>
        <div id="khung" style="background-color:brown; height:200px"></div>
        <div>
            <input type="button" name="hien" value=" Hiện " id="hien">
            <input type="button" name="an" value=" Ẩn " id="an">
            <input type="button" name="lay" value=" Lấy Nội Dung " id="lay">
        </div>
       
<script src="Js/jquery-3.7.1.min.js"></script>
<script>
        $(document).ready(function(){
           $("#hien").click(function(){
                $("#khung").show(4000);
                $(".abc, .def").css("border","2px solid red");
           });
           $("#an").click(function(){
                $("#khung").hide(3000);
           });

           $("#lay").click(function(){
                var nd = $(".abc").html();
                alert(nd);
                $(".abc").html("<b>Không Thích Chào</b>")
           });
        });
    </script>
</body>
</html>