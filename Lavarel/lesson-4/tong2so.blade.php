<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tổng Hai Số</title>
</head>
<body>
    <form action="" method="post">
        @csrf
        Số thứ 01: <input type="text" name="so01" value="{{$s1??null}}">
        @if($errors->has("so01"))
            <span style="color:red">{{$errors->first("so01")}}</span>
        @endif
        <br>
        Số thứ 02: <input type="text" name="so02" value="{{$s2??null}}">
        @if($errors->has("so02"))
            <span style="color:red">{{$errors->first("so02")}}</span>
        @endif
        <br>
        <input type="submit" name="tinh" value=" Tính ">
    </form>
    <br>
    @if(isset($tong))
        Tổng hai số: {{$tong}}
    @endif
</body>
</html>