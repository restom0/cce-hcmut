<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        li {
            border: 1px solid #ccc;
            border-radius: 50%;
            cursor: pointer;
            display: inline-block;
            margin-right: 10px;
            height: 40px;
            width: 40px;
            line-height: 40px;
            text-align: center;
        }

        li.checked {
            background-color: #e9ede0;
        }
    </style>
</head>

<body>
    <ul class="check-list">
        <li class="checked">01</li>
        <li>02</li>
        <li>03</li>
        <li>04</li>
        <li>05</li>
        <li>06</li>
        <li>07</li>
    </ul>
    <script>
        $(function() {
            $('.check-list li').click(function() {
                // Remove the 'checked' class from all list items
                $('.check-list li').removeClass();
                // Add the 'checked' class to the clicked list item
                $(this).addClass('checked');
            });
        });
    </script>

</body>

</html>