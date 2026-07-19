<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>

<body>
    <ul id="list">
        <li>item 1</li>

        <li>item 2</li>
        <li>item 3</li>

        <li>item 4</li>
        <li>item 5</li>

        <li>item 6</li>
        <li>item 7</li>

    </ul>
    <button type="button" id="remove">Remove</button>

    <button type="button" id="add">Add</button>
    <script>
        $(document).ready(function() {
            $('#add').click(function() {
                $('#list').append('<li>New item</li>');
            });

            $('#remove').click(function() {
                $('#list li').last().remove();
            });
        });
    </script>

</body>

</html>