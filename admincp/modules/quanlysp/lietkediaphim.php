<?php
    // $sql_lietke_sp = "SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc ORDER BY id_sanpham ASC";
    $sql_lietke_sp ="SELECT * FROM tbl_dvd ORDER BY id_sanpham ASC
    ";
    $query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);

?>
<div class="quanlymenu">
            <h3>Liệt kê Đĩa Phim</h3>

            <table class='lietkesp' >
                    <tr class="header_lietke">
                        <th>ID</th>
                        <th>Tên Sản Phẩm</th>
                        <th>Đạo diễn</th>
                        <th>Phim trường</th>
                        <th>Hình ảnh</th>
                        <th>Giá sp</th>
                        <th>Khuyến Mãi %</th>
                        <th>Giá gốc</th>
                        <th>Số lượng</th>
                        <th>Danh muc</th>
                        
                        <th>Tóm tắt</th>
                        <th>Tình trạng</th>
                        
                        <th class="them_menu4" >Quản lý</th>
                    </tr>
                    <?php
                        $i=0;
                        while($row = mysqli_fetch_array($query_lietke_sp)){
                            $i++;
                    ?>
                    
                    <tr>
                        <th><?php echo $i ?></th>
                        <th><?php echo $row['tensanpham'] ?></th>
                        <th><?php echo $row['director'] ?></th>
                        <th><?php echo $row['studio'] ?></th>
                        <th><img src="modules/quanlysp/uploads/<?php echo $row['hinhanh']?>" width=100px ></th>
                        <th><?php echo $row['giasp'] ?></th>
                        <th><?php echo $row['km'] ?></th>
                        <th><?php echo $row['giagockm'] ?></th>
                        <th><?php echo $row['soluong'] ?></th>
                        <th><?php  if($row['id_danhmuc']==1){
                                    echo 'Sách';
                                    }elseif($row['id_danhmuc']==2){
                                        echo 'Đĩa Nhạc';
                                    }else{
                                        echo 'Đĩa Phim';
                                    }
            
                            ?>
                        </th>

                        
                        <th><?php echo $row['tomtat'] ?></th>
                        <th><?php  if($row['tinhtrang']==1){
                                    echo 'Còn hàng';
                                    }else{
                                        echo 'Hết';
                                    }
            
                            ?>
                        </th>
                        
                        <th>
                            <a href="modules/quanlysp/xulydiaphim.php?idsanpham=<?php echo $row['id_sanpham']?>">Xóa</a>  |  <a href="index.php?action=quanlysp&query=suadiaphim&idsanpham=<?php echo $row['id_sanpham']?>">Sửa</a> 
                        </th>
                    </tr>
                    <?php
                        }
                    ?>
                </form>
            </table>

        </div>