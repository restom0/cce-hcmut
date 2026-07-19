import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-trangchu',
  templateUrl: './trangchu.component.html',
  styleUrls: ['./trangchu.component.css']
})
export class TrangchuComponent implements OnInit{
    dsphongcanh = [
      {hinh: "dl1.jpg", mota:"Quảng trường Lâm Viên là một trong các địa danh nổi tiếng ở Đà Lạt, nằm trên con đường Trần Quốc Toản."},
      {hinh: "dl2.jpg", mota:"Nằm cách trung tâm thành phố Đà Lạt khoảng 20km, đồi chè Cầu Đất là một trong những địa điểm du lịch nổi tiếng nhất nhì Lâm Đồng"},
      {hinh: "dl3.jpg", mota:"Hoa Sơn Điền Trang là một phong cảnh Đà Lạt nằm trong rừng thông bạt ngàn, quanh năm cỏ cây, hoa lá tỏa hương thơm ngát"},
      {hinh: "dl4.jpg", mota:"Thác Datanla. Con thác này nằm ở giữa đèo Prenn, cách trung tâm thành phố Đà Lạt 10km."},
      {hinh: "dl5.jpg", mota:"Hồ Xuân Hương không chỉ là phong cảnh Đà Lạt nổi tiếng mà còn là biểu tượng du lịch của thành phố."},    
    ];
    constructor() {}
    ngOnInit(): void {
      
    }
}
