import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ThucungComponent } from './thucung.component';

describe('ThucungComponent', () => {
  let component: ThucungComponent;
  let fixture: ComponentFixture<ThucungComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [ThucungComponent]
    });
    fixture = TestBed.createComponent(ThucungComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
