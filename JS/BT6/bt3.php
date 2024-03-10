<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body {
        color: #383838;
        font-family: Helvetica, sans-serif;
        font-size: 16px;
        line-height: 1.5;
    }

    .clearfix {
        zoom: 1;
    }

    .clearfix:after {
        clear: both;
        content: ".";
        display: block;
        height: 0;
        line-height: 0;
        visibility: hidden;
    }

    ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    li {
        border: 1px solid #ccc;
        float: left;
        padding: 10px;
        width: 300px;
    }
    </style>
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <ul class="list clearfix">
        <li>orem ipsum dolor sit amet, consectetur adipiscing elit.<br>
            Sed id urna facilisis, fringilla ex nec, gravida est.<br>
            Pellentesque eu tempor libero, et euismod elit. <br>
            In vitae sem quis risus bibendum tincidunt.</li>
        <li>Praesent id porta turpis. Lorem ipsum dolor sit amet, consectetur adipiscing elit. <br>
            Donec nec ex vitae justo malesuada rutrum a vel sapien. Quisque tellus velit, ullamcorper eget
            scelerisque et, bibendum et est. <br>
            Duis consequat elit et congue suscipit. Sed ut urna vel augue sagittis ultricies.
            <br>Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis
            egestas.
            <br>Nam elit sapien, fringilla a turpis vel, pretium molestie nisi. <br>
            Donec efficitur, quam eu auctor blandit,
        </li>
    </ul>
    <script>
    $(function() {
        var a = $('.list li').first();
        var b = $('.list li').last();
        var height_a = a.height();
        var height_b = b.height();
        if (height_a > height_b) {
            b.height(height_a);
        } else {
            a.height(height_b);
        }
    });
    </script>

</body>

</html>