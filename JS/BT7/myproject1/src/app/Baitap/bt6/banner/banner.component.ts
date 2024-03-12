import { Component, OnInit } from '@angular/core';



@Component({
  selector: 'app-banner',
  templateUrl: './banner.component.html',
  styleUrls: ['./banner.component.css']
})
export class BannerComponent implements OnInit {
  public img1: string = 'assets/paris.jpg'
  public img2: string = 'assets/running-on-ground-1574160737-5309-1574161121-3.jpg'
  public img3: string = 'assets/sanfran.jpg'

  constructor() { }

  ngOnInit(): void {
  }

}
