<tr class="header_lietke">
    <th>Id</th>
    <th>Thời gian</th>
    <th>Mã đơn hàng</th>
    <th>Mã sản phẩm</th>
    <th>Số lượng</th>
    <th>Giá gốc</th>
    <th>Đơn giá</th>
    <th>Doanh thu</th>

</tr>
<?php

include('../../config/config.php');
$timeCheckIn = $_GET['timeCheckIn'];
$timeCheckOut = $_GET['timeCheckOut'];
$sql_lietke_dh = "SELECT * FROM tbl_giohang,tbl_khackhang,tbl_cart_details WHERE   tbl_cart_details.code_cart=tbl_giohang.code_cart AND tbl_giohang.id_khachhang=tbl_khackhang.id_khachhang AND tbl_giohang.cart_status =1 AND tbl_giohang.stime BETWEEN  '".$timeCheckIn."' AND '".$timeCheckOut."' ORDER BY tbl_giohang.id_giohang DESC";
$query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);

$i = 0;
$tongdoanhthu = 0;
while($row = mysqli_fetch_array($query_lietke_dh)){
    $i++;
    $doanhthu = $row['giasp'] - $row['giagockm'];
    $tongdoanhthu += $doanhthu;
?>
<tr>
    <th><?php echo $i ?></th>
    <th><?php echo $row['stime']  ?></th>
    <th><?php echo $row['code_cart'] ?></th>
    <th><?php echo $row['id_sanpham'] ?></th>
    <th><?php echo $row['soluongmua'] ?></th>
    <th><?php echo $row['giagockm'] ?></th>
    <th><?php echo $row['giasp']?></th>

    <th><?php echo $doanhthu?></th>

        
</tr>
<?php 
    }
?>
<tr >
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>
    <th></th>

    <th>Tổng doanh thu :</th>
    <th><?php echo $tongdoanhthu ?></th>
</tr>

    
    
