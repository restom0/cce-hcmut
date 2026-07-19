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
        font-size: 10pt;
    }
    </style>

</head>

<body>
    <form>
        Email Address: <input type='text' id='txtEmail' /><br />
        <input type='submit' id='btnValidate' value='Validate Email' />
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#btnValidate').click(function(e) {
            var sEmail = $('#txtEmail').val();
            if ($.trim(sEmail).length == 0) {
                alert('Please enter a valid email address');
                e.preventDefault();
            }
            if (validateEmail(sEmail)) {
                alert('Email is valid');
            } else {
                alert('Invalid Email Address');
                e.preventDefault();
            }
        });
    });

    function validateEmail(sEmail) {
        var filter = /^[\w\-.+_%]+@[\w\.\-]+\.[A-Za-z]{2,4}$/;
        return filter.test(sEmail);
    }
    </script>

</body>

</html>