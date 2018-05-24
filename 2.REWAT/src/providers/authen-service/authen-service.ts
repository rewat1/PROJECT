import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';
import { Beverage } from '../../model/beverage';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class AuthenServiceProvider {

  apiUrl: string = "http://localhost/API_LAB1/crud_users.php"; 

  constructor(public http: HttpClient) {
    console.log('Hello AuthenServiceProvider Provider');
  }
  getAllData(): Observable<Beverage[]> {
    return this.http.get<Beverage[]>(this.apiUrl);
  }
}
