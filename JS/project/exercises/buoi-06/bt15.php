<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Date Form</title>
    <style>
        body {
            padding: 10px;
            font-family: Arial;
            font-size: 10pt;
        }

        .error {
            color: red;
            font-family: Verdana;
            font-size: 8pt;
        }
    </style>
</head>

<body>
    <form>
        Enter Date: <span><input type="text" id="txtDate" /></span>
        <span class="error">Invalid Date. (mm/dd/yyyy or mm-dd-yyyy)</span>
        <br /><br />
        <input id="btnSubmit" type="submit" value="Submit" />
    </form>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.error').hide();
            $('#btnSubmit').click(function(event) {
                var dtVal = $('#txtDate').val();
                if (ValidateDate(dtVal))
                    $('.error').hide();
                else {
                    $('.error').show();
                    event.preventDefault();
                }
            });
        });

        function ValidateDate(dtValue) {
            var dtRegex = new RegExp(/\b\d{1,2}[\/]\d{1,2}[\/]\d{4}\b/);
            return dtRegex.test(dtValue);
        }
    </script>
</body>

</html>