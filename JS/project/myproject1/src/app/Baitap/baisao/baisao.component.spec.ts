import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BaisaoComponent } from './baisao.component';

describe('BaisaoComponent', () => {
  let component: BaisaoComponent;
  let fixture: ComponentFixture<BaisaoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [BaisaoComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(BaisaoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
