import { NO_ERRORS_SCHEMA } from '@angular/core';
import { ComponentFixture, TestBed } from '@angular/core/testing';
import { MatDialog } from '@angular/material/dialog';
import { of } from 'rxjs';

import { BaivietComponent } from './baiviet.component';

describe('BaivietComponent', () => {
  let component: BaivietComponent;
  let fixture: ComponentFixture<BaivietComponent>;
  let dialog: jasmine.SpyObj<MatDialog>;

  beforeEach(async () => {
    dialog = jasmine.createSpyObj<MatDialog>('MatDialog', ['open']);
    dialog.open.and.returnValue({ afterClosed: () => of('saved') } as never);

    await TestBed.configureTestingModule({
      declarations: [ BaivietComponent ],
      providers: [{ provide: MatDialog, useValue: dialog }],
      schemas: [NO_ERRORS_SCHEMA]
    })
    .compileComponents();

    fixture = TestBed.createComponent(BaivietComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('selects and clears all rows', () => {
    expect(component.isAllSelected()).toBeFalse();

    component.toggleAllRows();
    expect(component.isAllSelected()).toBeTrue();
    expect(component.selection.selected.length).toBe(component.dataSource.data.length);

    component.toggleAllRows();
    expect(component.selection.selected.length).toBe(0);
  });

  it('builds accessible checkbox labels', () => {
    const row = component.dataSource.data[0];

    expect(component.checkboxLabel()).toBe('select all');
    expect(component.checkboxLabel(row)).toBe(`select row ${row.position + 1}`);

    component.selection.select(row);

    expect(component.checkboxLabel(row)).toBe(`deselect row ${row.position + 1}`);
  });

  it('assigns paginator after view init', () => {
    const paginator = {
      page: of(),
      initialized: of(),
      pageIndex: 0,
      pageSize: 10,
      length: component.dataSource.data.length
    } as never;

    component.paginator = paginator;
    component.ngAfterViewInit();

    expect(component.dataSource.paginator).toBe(paginator);
  });

  it('opens the add-new dialog and observes close result', () => {
    spyOn(console, 'log');

    component.openDialog();

    expect(dialog.open).toHaveBeenCalled();
    expect(console.log).toHaveBeenCalledWith('Dialog result: saved');
  });
});
