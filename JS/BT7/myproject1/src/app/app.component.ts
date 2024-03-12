import { Component } from '@angular/core';
import { RouterOutlet } from '@angular/router';

@Component({
  selector: 'app-root',
  standalone: true,
  imports: [RouterOutlet],
  templateUrl: './Baitap/register/register.component.html',
  styleUrl: './Baitap/register/register.component.css'
})
export class AppComponent {
  title = 'myproject1';
}
