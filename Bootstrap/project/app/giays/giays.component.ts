import { OnInit } from '@angular/core';
import { Component } from '@angular/core';
import { ApiService } from '../api.service';
import { Giay } from '../giay';


@Component({
  selector: 'app-giays',
  templateUrl: './giays.component.html',
  styleUrls: ['./giays.component.css']
})
export class GiaysComponent implements OnInit  {
  giays?: Giay[];

	constructor(private apiService: ApiService) {
		this.apiService.docDanhSachGiay().subscribe((giays: Giay[])=>{
		this.giays = giays;
		//console.log(this.giays);
	}) }
	ngOnInit()
	{
	}


}
