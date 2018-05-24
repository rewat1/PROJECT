import { Component } from '@angular/core';
import { NavController } from 'ionic-angular';
import { BeverageServiceProvider } from '../../providers/beverage-service/beverage-service';
import { Beverage } from '../../model/beverage';
import { Subscription } from 'rxjs/Subscription';

@Component({
  selector: 'page-home',
  templateUrl: 'home.html'
})
export class HomePage {

  beverageList: Beverage[];
  subscription : Subscription;

  constructor(public navCtrl: NavController) {

  }

  private getData(){
    this.subscription = this.beverageList.getAllData().subscribe(
      (beverageList:Beverage[]) => this.beverageList = beverageList
    );
  }

  ionViewWillEnter(){
    this.getData();
  }

  ionViewWillLeave(){
    this.subscription.unsubscribe();
  }


}
