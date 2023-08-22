   <?php
                                       

                 $dm= $_GET['q'];
                 require_once('connect.php');                          
                 $sql= "select * from san_pham where Ma_loai = '$dm'";
                 $kq=mysqli_query($conn,$sql);
                 while ($row = mysqli_fetch_array($kq)) {
                 	echo ' <tr>
                             <td>'.$row['Ma_sp'].'</td>
                             <td>'.$row['Ten_sp'].'</td>
                             <td>'.$row['So_luong'].'</td>
                             <td>'.$row['Gia_ban'].'</td>
                             <td>'.$row['Giam_gia'].'</td>
                             <td>'.$row['Ngay_sx'].'</td>
                            </tr>';
                                                # code...
                 }
                                          
                                         
                                          
                                         
                                       
   ?>