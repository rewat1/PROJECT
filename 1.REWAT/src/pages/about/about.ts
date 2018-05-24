import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';

@Component({
  selector: 'page-about',
  templateUrl: 'about.html'
})
export class AboutPage {

  weight: number
  height: number 
  age: number
  bmrr:number

  bmi: number
  bmi1: number
  tdee:number

  
  constructor(public navCtrl: NavController) {

  }

  Bmi(){
      this.bmi = 66 + ( 13.7 * this.weight) + ( 5 * this.height ) - ( 6.8 * this.age)   
   }

   Bmi1(){
    this.bmi1 = 665 + ( 9.6 * this.weight) + ( 1.8 * this.height ) - ( 4.7 * this.age)   
 }
 Tdee1(){
   this.tdee = 1.2 * this.bmrr
 }
 Tdee2(){
  this.tdee = 1.375 * this.bmrr
}
Tdee3(){
  this.tdee = 1.55 * this.bmrr
}
Tdee4(){
  this.tdee = 1.7 * this.bmrr
}
Tdee5(){
  this.tdee = 1.9 * this.bmrr
}
}
