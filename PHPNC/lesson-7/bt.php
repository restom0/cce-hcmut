<!DOCTYPE html>
<html>

<head>
    <title>Upload File</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label for="fileToUpload" class="form-label">Chọn file</label>
            </div>
            <div class="col-auto">
                <input class="form-control" type="file" name="fileToUpload" id="fileToUpload">
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary" value="Upload File" name="submit">Thêm</button>
            </div>
        </div>
    </form>
</body>

</html>
<?php
$uploadDirectory = 'images/';
$maxFileSize = 5242880;

if (isset($_POST["submit"])) {
    $targetFile = $uploadDirectory . basename($_FILES["fileToUpload"]["name"]);
    $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (empty($_FILES["fileToUpload"]["tmp_name"])) {
        echo "Vui lòng chọn một file để upload.";
    } elseif ($_FILES["fileToUpload"]["size"] > $maxFileSize) {
        echo "Kích thước file quá lớn. Chỉ cho phép các file có kích thước dưới 5MB.";
    } elseif ($fileType !== "jpg" && $fileType !== "png" && $fileType !== "jpeg" && $fileType !== "gif") {
        echo "File không hợp lệ. Chỉ cho phép các loại file: JPG, PNG, GIF.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $targetFile)) {
            echo '<h4>File đã được upload thành công:</h4>';
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Tên tệp</th>';
            echo '<th>Loại tệp</th>';
            echo '<th>Kích thước</th>';
            echo '<th>Đường dẫn tệp</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            $fileName = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
            $fileType = $fileType = strtolower(pathinfo($_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION));
            $fileSize = $_FILES["fileToUpload"]["size"];
            $filePath = $uploadDirectory . $fileName;

            echo '<tr>';
            echo '<td>' . $fileName . '</td>';
            echo '<td>' . $fileType . '</td>';
            echo '<td>' . $fileSize . ' bytes</td>';
            echo '<td>' . $filePath . '</td>';
            echo '</tr>';

            echo '</tbody>';
            echo '</table>';
            echo '<h4>Danh sách file:</h4>';
            $fileList = glob("images/*");
            echo '<table class="table table-bordered">';
            echo '<thead>';
            echo '<tr>';
            echo '<th>Tên tệp</th>';
            echo '<th>Loại tệp</th>';
            echo '<th>Kích thước</th>';
            echo '<th>Đường dẫn tệp</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            foreach ($fileList as $file) {
                $fileName = basename($file);
                $fileType = pathinfo($file, PATHINFO_EXTENSION);
                $fileSize = filesize($file);
                $filePath = $file;

                echo '<tr>';
                echo '<td>' . htmlspecialchars($fileName) . '</td>';
                echo '<td>' . htmlspecialchars($fileType) . '</td>';
                echo '<td>' . $fileSize . ' bytes</td>';
                echo '<td>' . htmlspecialchars($filePath) . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
        } else {
            echo "Đã xảy ra lỗi trong quá trình upload.";
        }
    }
}
?>