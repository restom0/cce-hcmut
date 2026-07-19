<body>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <style>
          #myImg {
              border-radius: 5px;
          }
          #myImg:hover {opacity: 0.7;}
          /* định dạng phần nền của modal */
          .popup {
              display: none; /* mặc định được ẩn đi */
              position:fixed; /* vị trí được cố định */
              z-index: 1; /* ưu tiên hiển thị đầu tiên */
              padding-top: 100px; 
              left: 250px;
              top: 0;
              width: 60%; 
              height: 80%; 
              background-color: rgb(0,0,0); /* Fallback color */
          }
          /* Phần nội hình ảnh của modal */
          .modal-content {
              margin: auto;
              display: block;
              width: 80%;
              max-width: 700px;
          }
          /* phần caption của modal image */
          #caption {
              margin: auto;
              display: block;
              width: 80%;
              max-width: 700px;
              text-align: center;
              color: #ccc;
              padding: 10px 0;
          }
          /* Button đóng Modal */
          .close {
              position: absolute;
              top: 15px;
              right: 35px;
              color: #f1f1f1;
              font-size: 40px;
              font-weight: bold;
          }
          .close:hover,
          .close:focus {
              color: #bbb;
              text-decoration: none;
              cursor: pointer;
          }
        </style>
    </head>
    <body> 
        <p>Các bạn click vào hình ảnh để mở Modal!</p>
        <img id="myImg" onclick="openpopup();" src="images/oto.jpg" width="420" height="200">
        <!-- popup -->
        <div id="popup" class="popup">
          <span class="close" onclick="closepopup();" id="close">&times;</span>
          <img class="modal-content" id="img01">
          <div id="caption">
            Lamborghini thường tạo ra những chiếc xe đặc biệt nhân dịp
            kỷ niệm của hãng. Centenario giới hạn 40 chiếc lên tới 1,9 triệu USD
           </div>
        </div>
    <script type="text/javascript">
      function openpopup(){
        // show popup gồm imgage và nôi dung text
        document.getElementById('popup').style.display='block';
        //gán hình ảnh cho popup
        document.getElementById('img01').src='images/oto.jpg';
        //xu ly nhan nut close

      }
      function closepopup(){
        document.getElementById('popup').style.display='none';
      }
    </script>    
    </body>