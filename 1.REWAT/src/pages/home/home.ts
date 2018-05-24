import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';


@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  weight: number
  height: number 
  bmi: number

  constructor(public navCtrl: NavController) {

  }

  Bmi() {
    this.bmi = this.weight / ((this.height / 100) * (this.height / 100))    
   }

}