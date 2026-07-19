import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import {Routes, RouterModule} from "@angular/router";
import {LoginComponent} from "./login/login.component";
import {RubikComponent} from "./rubik/rubik.component";
import {BaivietComponent} from "./baiviet/baiviet.component";

const routes: Routes = [
  {path: 'login', component: LoginComponent},
  {path: 'rubik', component: RubikComponent},
  {path: 'baiviet', component: BaivietComponent},
];

@NgModule({
  declarations: [],
  imports: [
    CommonModule,
    RouterModule.forRoot(routes)
  ],
  exports: [RouterModule]
})
export class AppRoutingModule { }
