import { HttpClientModule } from '@angular/common/http';
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { ThomeComponent } from './baitap/thome/thome.component';
import { BaisaoComponent } from './baitap/baisao/baisao.component';
import { ThucdonComponent } from './thucdon/thucdon.component';
import { CuonhinhComponent } from './cuonhinh/cuonhinh.component';
import { TrangchuComponent } from './trangchu/trangchu.component';
import { ThucungComponent } from './thucung/thucung.component';
import { PhuongtienComponent } from './phuongtien/phuongtien.component';
import { GiaysComponent } from './giays/giays.component';

@NgModule({
  declarations: [
    AppComponent,
    ThomeComponent,
    BaisaoComponent,
    ThucdonComponent,
    CuonhinhComponent,
    TrangchuComponent,
    ThucungComponent,
    PhuongtienComponent,
    GiaysComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    HttpClientModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
