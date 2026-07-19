import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppComponent } from './app.component';
import { BrowserAnimationsModule } from '@angular/platform-browser/animations';
import { LoginComponent } from './login/login.component';
import {RouterLinkActive, RouterLinkWithHref} from "@angular/router";
import {MatIconModule} from '@angular/material/icon';
import {MatToolbarModule} from '@angular/material/toolbar';
import {MatTabsModule} from '@angular/material/tabs';
import {MatButtonModule} from "@angular/material/button";
import {MatTableModule} from '@angular/material/table';
import { RubikComponent } from './rubik/rubik.component';
import { BaivietComponent, AddNew } from './baiviet/baiviet.component';
import {MatPaginatorModule} from "@angular/material/paginator";
import {MatCheckboxModule} from "@angular/material/checkbox";
import {MatDialogModule} from "@angular/material/dialog";
import {MatInputModule} from "@angular/material/input";
import { AddNewComponent } from './rubik/add-new/add-new.component';
import {MatSelectModule} from "@angular/material/select";
import {ReactiveFormsModule} from "@angular/forms";

@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    RubikComponent,
    BaivietComponent,
    AddNew,
    AddNewComponent
  ],
  imports: [
    BrowserModule,
    BrowserAnimationsModule,
    RouterLinkActive,
    MatIconModule,
    MatToolbarModule,
    MatTabsModule,
    RouterLinkWithHref,
    MatButtonModule,
    MatTableModule,
    MatPaginatorModule,
    MatCheckboxModule,
    MatDialogModule,
    MatInputModule,
    MatSelectModule,
    ReactiveFormsModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule {}
