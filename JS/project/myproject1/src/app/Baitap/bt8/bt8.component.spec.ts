import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Bt8Component } from './bt8.component';

describe('Bt8Component', () => {
  let component: Bt8Component;
  let fixture: ComponentFixture<Bt8Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Bt8Component]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(Bt8Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
