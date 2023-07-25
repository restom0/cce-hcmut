<?php
if (!empty($_POST)) {
    $u = $p = '';
    if (isset($_POST['urs'])) {
        $u = $_POST['urs'];
    }
    if (isset($_POST['psw'])) {
        $p = $_POST['psw'];
    }
    //echo $u.' '.$p;
    //xu ly login
    //if($u=='admin' && $p=='123456@'){
    // header('Location:main.php');
    //}

    //ket noi database
    $conn = mysqli_connect('localhost', 'root', '', 'users');
    //viet sql kiem tra email va password co dung ko
    $p = md5(sha1($p));
    $sql = "select * from users where Email='$u' and Password ='$p'";
    //thuc thi cau lenh sql
    $kq = mysqli_query($conn, $sql);
    //kiem tra ket qua thuc thi sql cos ton tai user ko (dem so dong hon 0)
    if (mysqli_num_rows($kq) > 0) {
        header('Location:main.php');
    } else {
        echo "ban chua la thanh vien, vui long dang ky!";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
        }

        form {
            border: 3px solid #f1f1f1;
        }

        input[type=text],
        input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }

        button {
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            opacity: 0.8;
        }

        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }

        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }

        img.avatar {
            width: 40%;
            border-radius: 50%;
        }

        .container {
            padding: 16px;
        }

        span.psw {
            float: right;
            padding-top: 16px;
        }

        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }

            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>

<body>

    <h2>Login Form</h2>

    <form action="" method="post">
        <div class="imgcontainer">
            <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="urs"><b>Username</b></label>
            <input type="text" placeholder="Enter Email" name="urs" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit">Login</button>
            <label>
                <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
    </form>

</body>

</html>