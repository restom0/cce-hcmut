import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CuonhinhComponent } from './cuonhinh.component';

describe('CuonhinhComponent', () => {
  let component: CuonhinhComponent;
  let fixture: ComponentFixture<CuonhinhComponent>;

  beforeEach(() => {
    TestBed.configureTestingModule({
      declarations: [CuonhinhComponent]
    });
    fixture = TestBed.createComponent(CuonhinhComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
