import {AfterViewInit, Component, ViewChild} from '@angular/core';
import {MatTableDataSource} from "@angular/material/table";
import {SelectionModel} from "@angular/cdk/collections";
import {MatPaginator} from "@angular/material/paginator";
import {MatDialog} from "@angular/material/dialog";
import {AddNewComponent} from "./add-new/add-new.component";

@Component({
  selector: 'app-rubik',
  templateUrl: './rubik.component.html',
  styleUrls: ['./rubik.component.css']
})
export class RubikComponent implements AfterViewInit {

  constructor(public dialog: MatDialog) { }

  ngOnInit(): void {
  }
  displayedColumns: string[] = ['position', 'tenSP', 'loai', 'moTa', 'soLuong', 'giaBan'];
  dataSource = new MatTableDataSource<PeriodicElement>(ELEMENT_DATA);
  selection = new SelectionModel<PeriodicElement>(true, []);

  /** Whether the number of selected elements matches the total number of rows. */
  isAllSelected() {
    const numSelected = this.selection.selected.length;
    const numRows = this.dataSource.data.length;
    return numSelected === numRows;
  }
  /** Selects all rows if they are not all selected; otherwise clear selection. */
  toggleAllRows() {
    if (this.isAllSelected()) {
      this.selection.clear();
      return;
    }
    this.selection.select(...this.dataSource.data);
  }
  /** The label for the checkbox on the passed row */
  checkboxLabel(row?: PeriodicElement): string {
    if (!row) {
      return `${this.isAllSelected() ? 'deselect' : 'select'} all`;
    }
    return `${this.selection.isSelected(row) ? 'deselect' : 'select'} row ${row.position + 1}`;
  }

  // @ts-ignore
  @ViewChild(MatPaginator) paginator: MatPaginator;

  ngAfterViewInit() {
    this.dataSource.paginator = this.paginator;
  }

  openDialog() {
    const dialogRef = this.dialog.open(AddNewComponent);

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
    });
  }
  applyFilter(event: Event) {
    const filterValue = (event.target as HTMLInputElement).value;
    this.dataSource.filter = filterValue.trim().toLowerCase();

    if (this.dataSource.paginator) {
      this.dataSource.paginator.firstPage();
    }
  }
}

export interface PeriodicElement {
  position: number;
  tenSP: string;
  loai: string;
  moTa: string;
  soLuong: number;
  giaBan: number;
}

const ELEMENT_DATA: PeriodicElement[] = [
  {position: 1,
    tenSP: 'GAN 13 MAGLEV',
    loai: '3x3',
    moTa: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at cum, " +
      "distinctio dolorem eum excepturi fuga hic impedit ipsum iste labore natus nihil quaerat, quam quisquam repellendus temporibus vel, vitae!",
    soLuong: 100,
    giaBan: 1500000,
  },
];
