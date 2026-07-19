import {AfterViewInit, Component, ViewChild} from '@angular/core';
import {MatPaginator} from '@angular/material/paginator';
import {MatTableDataSource} from '@angular/material/table';
import {SelectionModel} from "@angular/cdk/collections";
import {MatDialog} from "@angular/material/dialog";

@Component({
  selector: 'app-baiviet',
  templateUrl: './baiviet.component.html',
  styleUrls: ['./baiviet.component.css']
})
export class BaivietComponent implements AfterViewInit {

  constructor(public dialog: MatDialog) { }

  ngOnInit(): void {
  }
  displayedColumns: string[] = ['position', 'subject', 'content', 'author'];
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
    const dialogRef = this.dialog.open(AddNew);

    dialogRef.afterClosed().subscribe(result => {
      console.log(`Dialog result: ${result}`);
    });
  }
}

@Component({
  selector: 'add-new',
  templateUrl: 'add-new.html',
  styleUrls: ['add-new.css']
})
export class AddNew {}

export interface PeriodicElement {
  position: number;
  subject: string;
  content: string;
  author: string;
}

const ELEMENT_DATA: PeriodicElement[] = [
  {position: 1,
    subject: 'Hướng dẫn chơi Rubik toàn tập (Phần 1)',
    content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at cum, " +
      "distinctio dolorem eum excepturi fuga hic impedit ipsum iste labore natus nihil quaerat, quam quisquam repellendus temporibus vel, vitae!",
    author: 'Minh Tuấn'
  },
  {position: 1,
    subject: 'Hướng dẫn chơi Rubik toàn tập (Phần 2)',
    content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at cum, " +
      "distinctio dolorem eum excepturi fuga hic impedit ipsum iste labore natus nihil quaerat, quam quisquam repellendus temporibus vel, vitae!",
    author: 'Minh Tuấn'
  },
  {position: 1,
    subject: 'Hướng dẫn chơi Rubik toàn tập (Phần 2)',
    content: "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda at cum, " +
      "distinctio dolorem eum excepturi fuga hic impedit ipsum iste labore natus nihil quaerat, quam quisquam repellendus temporibus vel, vitae!",
    author: 'Minh Tuấn'
  },
];
