<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <div class="box">
        <h3>Box title</h3>
        <ul class="list">
            <li>item 01</li>
            <li>item 02</li>
            <li>item 03</li>
            <li>item 04</li>
            <li>item 05</li>
            <li>item 06</li>
            <li>item 07</li>
        </ul>
        <button type="button">Add</button>
    </div>

    <script>
    $(function() {
        $('button').click(function(event) {
            var elm = $('.box:eq(0)').clone();
            $('.box').last().after(elm);
        });
    });
    </script>

</body>

</html>