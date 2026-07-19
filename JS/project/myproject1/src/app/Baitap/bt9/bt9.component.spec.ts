import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Bt9Component } from './bt9.component';

describe('Bt9Component', () => {
  let component: Bt9Component;
  let fixture: ComponentFixture<Bt9Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [Bt9Component]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(Bt9Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
