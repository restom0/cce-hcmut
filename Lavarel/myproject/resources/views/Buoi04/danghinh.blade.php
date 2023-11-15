<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng Hình</title>
</head>
<body>
   @if(count($errors)>0)
        <div style="color:red">
            @foreach($errors->all() as $err)
                {{$err}}<br>
            @endforeach
        </div>  
   @endif
   @if(Session::has("thongbao"))
        <div style="color:#006600">
            {{Session::get("thongbao")}}
        </div>
        <div>
           
            <img src="../Images/{{Session::get('tentt')}}" width="200" alt="hình ảnh"> 
        </div>
   @endif
    <form action="" method="post" enctype="multipart/form-data">
        @csrf
        <input type="file" name="taptin">
        <br>
        <input type="submit" name="danghinh" value=" Đăng Hình">
    </form>
</body>
</html>