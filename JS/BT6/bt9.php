<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <style>
        ul {
            list-style-type: none;
        }

        #nav li {
            float: left;
            position: relative;
        }

        #nav li a {
            background: #9972B5;
            color: #fff;
            display: block;
            padding: 5px 10px;
            text-decoration: none;
            font-family: Arial, Helvetica, Verdana, sans-serif;
        }

        #nav li:hover {
            background: #FF9900;
            text-decoration: none;
        }

        #nav li ul {
            background: #FF9900;
            margin-top: -1px;
            width: 150px;
            position: absolute;
        }

        #nav li ul {
            background: #d1d3d4;
            display: none;
            width: 150px;
            position: absolute;
        }

        .shadow {
            -moz-box-shadow: 0px 3px 7px #8A8A8B;
            -webkit-box-shadow: 0px 3px 7px #8A8A8B;
            box-shadow: 0px 3px 7px #8A8A8B;
        }

        #nav li ul ul {
            width: 100%;
        }

        #nav li ul li:first-child {
            border-top: 2px solid #FF9900;
        }

        #nav li .current * {
            background: #FF9900;
        }

        #nav ul ul {
            left: -999em;
            top: 33;
        }
    </style>
</head>

<body>
    <ul id="nav">
        <li><a href="#">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="#">Services</a>
            <ul class="child">
                <li><a href="#">Web Design</a></li>
                <li><a href="#">Web Development</a></li>
                <li><a href="#">Logo and Print Design</a></li>
                <li><a href="#">Batagor Enak Neh</a>
                    <ul class="childchild">
                        <li><a href="#">Web Design</a></li>
                        <li><a href="#">Web Development</a></li>
                        <li><a href="#">Logo and Print Design</a></li>
                        <li><a href="#">Batagor Enak Neh</a></li>
                        <li><a href="#">Ngerujak juga</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li><a href="#">Ngerujak juga</a></li>
        <li><a href="#">Portofolio</a></li>
        <li><a href="#">Pengen ke Arab</a></li>
        <li><a href="#">Beasiswa S2 Go!! Goo!!</a>
            <ul>
                <li><a href="#">Lokal</a></li>
                <li><a href="#">International</a></li>
            </ul>
        </li>
        <li><a href="#">Hire me</a></li>
    </ul>
    <script type="text/javascript">
        $("#nav ul.child").removeClass('child');
        $("#nav ul.childchild").removeClass('childchild');
        $("#nav li").has('ul').hover(function() {
                $(this).addClass('current').children('ul').addClass('shadow').slideDown(200);
            },
            function() {
                $(this).removeClass('current').children('ul').stop(true, true).slideUp('200');
            });
    </script>

</body>

</html>