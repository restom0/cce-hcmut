import { ComponentFixture, TestBed } from '@angular/core/testing';

import { RubikComponent } from './rubik.component';

describe('RubikComponent', () => {
  let component: RubikComponent;
  let fixture: ComponentFixture<RubikComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ RubikComponent ]
    })
    .compileComponents();

    fixture = TestBed.createComponent(RubikComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
