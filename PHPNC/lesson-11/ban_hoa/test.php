<?php
$sql = "SELECT  p.*, GROUP_CONCAT(f.colors) colors FROM people
 LEFT JOIN features f ON f.person = p.person
 GROUP BY p.person
 ORDER BY timestamp ASC;";
foreach ($pdo->query($sql) as $row) {

    echo '<tr> ';
    echo ('<td>' . $row['person'] . '</td>');
    echo ('<td>' . $row['country'] . ' </td>');
    echo ('<td>');
    echo (implode('<br/>', explode(',', $row['colors'])));
    echo ('</td>');
    echo ('<td>' . $row['number'] . ' </td>');
    echo '</tr> ';
}