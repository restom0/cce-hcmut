<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Slider</title>
    <style>
    /* Style the image slider */
    #slider {
        position: relative;
        margin: 0;
        padding: 0;
        list-style-type: none;
        width: 650px;
        height: 430px;
        border: 1px solid #008000;
        overflow: hidden;
    }

    #slider li {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        opacity: 0;
        transition: opacity 0.5s ease;
    }

    #slider li:first-child {
        opacity: 1;
    }

    #slider img {
        width: 650px;
        height: 430px;
    }

    #slider p {
        position: absolute;
        bottom: 0;
        padding: 20px;
        color: #ffffff;
        background-color: #008000;
        opacity: 0.6;
        margin: 0;
        left: 0;
        right: 0;
    }
    </style>
</head>

<body>
    <ul id="slider">
        <li>
            <a href="https://flic.kr/p/pq1UFA">
                <img src="https://c4.staticflickr.com/4/3867/15367978792_acd632254d_h.jpg" alt="Alter Apfelbaum" />
                <p>Slide 1</p>
            </a>
        </li>
        <li>
            <a href="https://flic.kr/p/ppXtn4">
                <img src="https://c3.staticflickr.com/3/2942/15367308281_cf8a164414_h.jpg" alt="Ruth St Flowers-191" />
                <p>Slide 2</p>
            </a>
        </li>
        <li>
            <a href="https://flic.kr/p/pq5a4k">
                <img src="https://c4.staticflickr.com/4/3862/15368612485_251ef5de2f_h.jpg" alt="Canada Close In." />
                <p>Slide 3</p>
            </a>
        </li>
    </ul>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(function() {
        $('#slider li').hide().filter(':first').show();
        setInterval(slideshow, 3000);
    });

    function slideshow() {
        $('#slider li:first').fadeOut('slow').next().fadeIn('slow').end().appendTo('#slider');
    }
    </script>
</body>

</html>