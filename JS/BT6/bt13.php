<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            padding: 10px;
            font-family: Arial;
            Font-size: 10pt;
        }

        span {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <form>
        Phone Number: <input type='text' id='txtPhone' />
        <span id="spnPhoneStatus"></span>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#txtPhone").blur(function(e) {
                if (validatePhone('txtPhone')) {
                    $('#spnPhoneStatus').html('Valid');
                    $('#spnPhoneStatus').css('color', 'green');
                } else {
                    $('#spnPhoneStatus').html('Invalid');
                    $('#spnPhoneStatus').css('color', 'red');
                }
            });
        });

        function validatePhone(txtPhone) {
            var a = document.getElementById(txtPhone).value;
            var filter = /^[0-9]+$/;
            if (filter.test(a)) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</body>

</html>