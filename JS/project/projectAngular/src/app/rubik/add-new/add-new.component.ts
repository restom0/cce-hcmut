import { Component, ChangeDetectionStrategy } from '@angular/core';
import {FormControl} from "@angular/forms";
@Component({
    selector: 'app-add-new',
    templateUrl: './add-new.component.html',
    styleUrls: ['./add-new.component.css'],
    changeDetection: ChangeDetectionStrategy.Eager,
    standalone: false
})

export class AddNewComponent {

  constructor() { }

  disableSelect = new FormControl(false);
}
