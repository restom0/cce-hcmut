import { Component, ChangeDetectionStrategy } from '@angular/core';

@Component({
    selector: 'app-root',
    // templateUrl points at the register component's template rather than
    // app.component.html, so no <router-outlet> is ever rendered and the
    // RouterOutlet import was dead. Left as-is to preserve behaviour.
    templateUrl: './Baitap/register/register.component.html',
    changeDetection: ChangeDetectionStrategy.Eager,
    styleUrl: './Baitap/register/register.component.css'
})
export class AppComponent {
  title = 'myproject1';
}
