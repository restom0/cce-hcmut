import { ComponentFixture, TestBed } from '@angular/core/testing';

import { ShophoaComponent } from './shophoa.component';

describe('ShophoaComponent', () => {
  let component: ShophoaComponent;
  let fixture: ComponentFixture<ShophoaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      imports: [ShophoaComponent]
    })
    .compileComponents();
    
    fixture = TestBed.createComponent(ShophoaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
