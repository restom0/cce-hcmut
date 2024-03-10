<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Maximum Value Calculator</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <label for="nameA">Enter value A:</label>
    <input type="text" id="nameA" value="0">
    <br>
    <label for="nameB">Enter value B:</label>
    <input type="text" id="nameB" value="0">
    <br>
    <div>Max: <span id="result">0</span></div>

    <script>
    $(function() {
        $('input').change(function() {
            var a = parseFloat($('#nameA').val());
            var b = parseFloat($('#nameB').val());
            var result = $('#result');
            if (!isNaN(a) && !isNaN(b)) {
                result.text(Math.max(a, b));
            }
        });
    });
    </script>
</body>

</html>