<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bootstrap demo</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <style>
       .carousel .carousel-indicators button {
            width: 15px;
            height: 15px;
            border-radius: 100%;
            background-color: #FF0000;
        }

        .carousel-control-next-icon {
          background-image: url('../hinh/ketiep.png');
            color: red;
        }
        .carousel-control-prev-icon {
          background-image: url('../hinh/truoc.png');
        }
  </style>
</head>
<body>
    <div class="container">
      
      <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2" aria-label="Slide 3"></button>
             <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="3" aria-label="Slide 4"></button>
        </div>
      <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../hinh/banner_pc01.jpg" class="d-block w-100" height="350" alt="hình 01">
              <div class="carousel-caption d-none d-md-block text-black">
                <h5>Nha Trang</h5>
                <p>Nha Trang nắng cháy da người. Ăn uống chặt chém !!!!</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../hinh/banner_pc02.jpg" class="d-block w-100" height="350" alt="hình 02">
              <div class="carousel-caption d-none d-md-block text-black">
                <h5>Đà Lạt</h5>
                <p>Đà lạt có căn nhà ma. Ăn uống chặt chém !!!!</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="../hinh/banner_pc03.jpg" class="d-block w-100" height="350" alt="hình 03">
            </div>
            <div class="carousel-item">
              <img src="../hinh/banner_pc04.jpg" class="d-block w-100" height="350" alt="hình 04">
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
          </button>
    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>