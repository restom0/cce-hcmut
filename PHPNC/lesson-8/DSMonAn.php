<?php
$conn = new mysqli("localhost", "root", null, "ql_mon_an");
if ($conn->connect_error) {
    die("Kết nối thất bại !!!" . $conn->connect_error);
}

$foodCategories = [];
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM loai_mon WHERE id = '$id'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $foodCategories[] = $row;

    $categoryId = $row['id'];
    $sql = "SELECT * FROM mon_an WHERE id_loai_mon = '$categoryId' LIMIT 1";
    $result = $conn->query($sql);
} else {
    $sql = "SELECT * FROM loai_mon";
    $result = $conn->query($sql);
    while ($row = $result->fetch_assoc()) {
        $foodCategories[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Categories</title>
    <style>
        .style01 {
            width: 700px;
            margin: 10px auto;
            border-collapse: collapse;
            background-color: lightorange;
        }

        .style02 {
            font-family: serif;
            font-size: 30px;
            color: whitesmoke;
            background-color: darkorange;
            padding: 5px;
        }

        .style03 {
            font-family: arial;
            font-size: 18px
        }
    </style>
</head>

<body>
    <table cellspacing="0" cellpadding="5" class="style01">
        <caption class="style02">DANH MỤC MÓN ĂN</caption>
        <tr>
            <th class="style03">Danh mục món ăn</th>
            <th class="style03">Chi tiết món ăn</th>
        </tr>
        <?php foreach ($foodCategories as $category) : ?>
            <tr>
                <td>
                    <a href="danh_muc_mon_an.php?id=<?php echo $category['id']; ?>">
                        <?php echo $category['ten_loai_mon']; ?>
                    </a>
                </td>
                <?php if (isset($_GET['id'])) : ?>
                    <td>
                        <?php if ($result->num_rows > 0) : ?>
                            <?php while ($row = $result->fetch_assoc()) : ?>
                                <h2><?php echo $row['ten_mon_an']; ?></h2>
                                <p>Cách chế biến: <?php echo $row['cach_che_bien']; ?></p>
                                <img src="<?php echo $row['hinh']; ?>" alt="hình ảnh">
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p>Không có món ăn</p>
                        <?php endif; ?>
                    </td>
                <?php else : ?>
                    <td></td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>