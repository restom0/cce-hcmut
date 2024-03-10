<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <form action="#">
        <p><label><input type="checkbox" id="checkAll" /> Chọn Hết (Select All)</label></p>
        <fieldset>
            <legend>Loads of checkboxes</legend>
            <p><label><input type="checkbox" /> HTML5 & CSS3</label></p>
            <p><label><input type="checkbox" /> BootStrap & Wordpress </label></p>
            <p><label><input type="checkbox" /> Javascript & Jquery</label></p>
            <p><label><input type="checkbox" /> PHP & laravel </label></p>
        </fieldset>
    </form>
    <script>
        $(document).ready(function() {
            $("#checkAll").change(function() {
                $("input:checkbox").prop('checked', $(this).prop("checked"));
            });
        });
    </script>

</body>

</html>