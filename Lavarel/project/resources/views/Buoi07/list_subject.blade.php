<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh sách môn học</title>
</head>

<body>
    <h1 align='center'>Danh sách môn học</h1>
    <div class="table-responsive">
        <table class="table table-primary">
            <thead>
                <tr>
                    <th scope="col">Mã môn học</th>
                    <th scope="col">Tên môn học</th>
                    <th scope="col">Số tín chỉ</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr>
                        <td>{{ $subject->mamh }}</td>
                        <td>{{ $subject->tenmh }}</td>
                        <td>{{ $subject->sotinchi }}</td>
                    </tr>
                @endforeach
                <tr class="">
                    <th colspan="3">Tổng số môn học là: {{ $total }}</th>
                </tr>
            </tbody>
        </table>
    </div>
</body>

</html>
