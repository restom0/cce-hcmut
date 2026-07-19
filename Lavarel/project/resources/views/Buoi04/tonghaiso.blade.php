<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng Hai Số</title>
</head>
<body>
    @if(count($errors)>0)
        <div style="color:red">
            @foreach($errors->all() as $err)
                {{$err}} <br>
            @endforeach
        </div>
    @endif
    <form action="" method="post">
        @csrf
        Số thứ 01: <input type="text" name="so01" value="{{$s1??null}}">
        <br>
        Số thứ 02: <input type="text" name="so02" value="{{$s2??null}}">
        <br>
        <input type="submit" name="tinh" value=" Tính ">
    </form>
    <br>
    @if(isset($tong))
        Tổng hai số: {{$tong}}
    @endif
</body>
</html>