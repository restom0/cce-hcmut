<div class="container">
    <div class="row mb-5">
        <div class="col-md-2"></div>
        <div class="col-md-8">
            <div class="row border border-2 rounded border-primary p-5">
                <div class="col-md-3">
                    <?php
                    echo "<img src='img/" . $row["hinh_anh"] . "' class='img-fluid w-100' alt='hình'>";
                    ?>
                </div>
                <div class="col-md-9">
                    <?php
                    echo "<h2>" . $row["ten_hoa"] . "</h2>";
                    echo "<h3>Thành phần: " . $row["tp_chinh"] . "</h3>";
                    echo "<h3>Giá bán: " . $row["gia_ban"] . "</h3>";
                    ?>
                </div>
            </div>
        </div>
        <div class="col-md-2"></div>
    </div>
</div>