import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';

import { TrangchuComponent } from './trangchu/trangchu.component';
import { PhuongtienComponent } from './phuongtien/phuongtien.component';
import { ThucungComponent } from './thucung/thucung.component';
import { GiaysComponent } from './giays/giays.component';

const routes: Routes = [
    {path:'', component:TrangchuComponent},
    {path:'phongcanh', component:TrangchuComponent},
    {path:'thucung', component:ThucungComponent},
    {path:'phuongtien', component:PhuongtienComponent},
    {path:'lietkegiay', component:GiaysComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
