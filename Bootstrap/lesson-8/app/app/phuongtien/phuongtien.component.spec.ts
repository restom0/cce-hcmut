import { ComponentFixture, TestBed } from '@angular/core/testing';

import { PhuongtienComponent } from './phuongtien.component';

describe('PhuongtienComponent', () => {
  let component: PhuongtienComponent;
  let fixture: ComponentFixture<PhuongtienComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [PhuongtienComponent]
    });
    fixture = TestBed.createComponent(PhuongtienComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
