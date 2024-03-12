import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ThoComponent } from './tho.component';

describe('ThoComponent', () => {
  let component: ThoComponent;
  let fixture: ComponentFixture<ThoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ThoComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ThoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
