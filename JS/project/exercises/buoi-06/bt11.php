<!doctype html>
<html>

<head>
    <title>Accordion</title>
    <style type="text/css">
    /* Styling for the accordion */
    .accordion {
        margin: 1em 0;
    }

    .accordion h3 {
        background: #559b6a;
        color: #fff;
        cursor: pointer;
        margin: 0 0 1px 0;
        padding: 4px 10px;
    }

    .accordion h3.current {
        background: #4289aa;
        cursor: default;
    }

    .accordion div.pane {
        padding: 5px 10px;
    }
    </style>
</head>

<body>
    <div class="accordion">
        <h3>1. Câu hỏi</h3>
        <div class="pane">
            <p>- Em hãy giải thích tại sao người ta thấy chớp trước rồi sau mới nghe thấy tiếng sấm. Lý do gì vậy?<br>
                Thưa thầy, vì mắt người ta ở phía trước nên thấy trước, còn tại ở phía sau nên nghe thấy tiếng sấm sau
                ạ!<br>
                (Do vận tốc của ánh sáng: xấp xỉ 300 triệu m/s nhanh hơn vận tốc của âm thanh: khoảng 344 m/s)</p>
        </div>
        <h3>2. Quan lớn mua vàng</h3>
        <div class="pane">
            <p>Theo lệ ngày xưa, ai làm quan thì mua món gì cũng chỉ phải trả nửa giá tiên, trừ mua vàng phải trả đủ.
                Một ông quan nọ vừa đền nhậm chứa, bảo hiệu vàng đem hai lạng đến bản cho ngài. Chủ hiệu vàng nghe tiếng
                quan dữ như cọp, mới bầm: <br>
                Vàng mỗi lạng thực giá sâu chục đồng, song quan lớn thì trả một nửa cũng được. Quan cầm hai lạng vàng
                xem, rồi ung dung bỏ một lạng vào túi. Chủ hiệu tưởng quan chỉ mua có một lạng, còn lạng kia trả lại,
                nên khi quan vào nhà trong, anh ta vẫn đứng đây đợi trả tiền.
                Hồi lâu quan ra, thấy vậy mới hỏi: <br>
                - Mua bán xong rồi, còn đứng đây làm gì? Chủ hiệu vàng đáp: <br>
                Con chờ quan lớn trả tiền cho. Quan bảo: <br>
                Tiền trả rồi, còn đòi gì nữa? Chủ hiệu vàng đáp: - Hai lang, quan trả lại một lạng, lấy một lạng. Quan
                nổi giận: <br>
                - Nhà người lạ thật! Nhà người bảo ta trả một nửa cũng được. Ta mua hai lạng, nhưng chỉ lấy một, trả lại
                một chẳng phải là đã trả một nửa là gì!!!<br>
            </p>
        </div>
        <h3>3. Ai đúng</h3>
        <div class="pane">
            <p>Trong một cuộc thi, giảm khảo đưa ra câu hỏi: "Người Việt Nam đầu tiên bay lên vũ trụ là ai?"<br>
                Re eeng! Re... eeng!<br>
                Mời đội A. c
                <hr>
                Thưa, đó là Từ Thức lên không gian và đã lạc động thiên thai<br>
                Mời đôi B.<br>
                Thánh Gióng cưỡi ngựa bay trước ạ. <br>
                Các cổ động viên lao nhao: <br>
                - Trật lất, đó là chú Cuội đã bay lên cung trăng ngồi ôm gốc đa lâu lắm rồi chứ bộ. <br>
            </p>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
    $(function() {
        $(".accordion div").show();
        setTimeout("$('.accordion div').slideToggle('slow');", 1000);
        $(".accordion h3").click(function() {
            $(this).next(".pane").slideToggle("slow").siblings(".pane:visible").slideUp("slow");
            $(this).toggleClass("current");
            $(this).siblings("h3").removeClass("current");
        });
    });
    </script>
</body>

</html>