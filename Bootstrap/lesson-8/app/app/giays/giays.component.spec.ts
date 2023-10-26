import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GiaysComponent } from './giays.component';

describe('GiaysComponent', () => {
  let component: GiaysComponent;
  let fixture: ComponentFixture<GiaysComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [GiaysComponent]
    });
    fixture = TestBed.createComponent(GiaysComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
