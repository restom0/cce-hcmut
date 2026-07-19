import { Component, OnInit } from '@angular/core';

interface cards {
  img: string;
  content: string;
}

@Component({
  selector: 'app-content',
  templateUrl: './content.component.html',
  styleUrls: ['./content.component.css']
})
export class ContentComponent implements OnInit {
  public img1: string = 'assets/paris.jpg'
  public img2: string = 'assets/running-on-ground-1574160737-5309-1574161121-3.jpg'
  public img3: string = 'assets/sanfran.jpg'

  public card: cards[] = [
    {
      img: 'assets/paris.jpg',
      content: "Paris là thủ đô và là thành phố đông dân nhất nước Pháp, cũng là một trong ba thành phố phát triển kinh tế nhanh nhất thế giới cùng Luân Đôn và New York và là một trung tâm hành chính của vùng Île-de-France với dân số ước tính là 2.165.423 người tính đến năm 2019, trên diện tích hơn 105,4 km². "
    },
    {
      img: 'assets/running-on-ground-1574160737-5309-1574161121-3.jpg',
      content: 'Chạy việt dã hay là việt dã là môn đi bộ, chạy bộ và chạy vượt chướng ngại vật tự nhiên được tiến hành luyện tập và thi đấu trong môi trường thiên nhiên. Đây được coi là biện pháp rất hiệu quả nhằm nâng cao sức khoẻ của người tập, làm tăng sức bền bỉ, dẻo dai và nhanh nhẹn hơn và là môn thể thao rèn luyện thân thể.'
    },
    {
      img: 'assets/sanfran.jpg',
      content: 'San Francisco, tên chính thức là Thành phố và Quận San Francisco, là một trung tâm văn hóa, thương mại và tài chính ở tiểu bang California của Hoa Kỳ. Tọa lạc tại miền Bắc California, San Francisco là thành phố đông dân thứ 17 ở Hoa Kỳ và là thành phố đông dân thứ tư ở California, với 873.965 cư dân tính đến năm 2020.'
    }
  ]

  constructor() { }

  ngOnInit(): void {
  }

}
