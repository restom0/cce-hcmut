import { Injectable } from '@angular/core';
import { Giay } from './giay';
import { Observable } from 'rxjs';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class ApiService {


  PHP_API_SERVER = "http://localhost:81/";

	constructor(private httpClient: HttpClient) {}
	
  docDanhSachGiay(): Observable<Giay[]>{
		return this.httpClient.get<Giay[]>(`${this.PHP_API_SERVER}/lietkegiay.php`);
	}

}
