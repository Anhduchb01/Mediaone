<div class="quanlymenu">
            <h3>Xem đơn hàng </h3>
<?php
	$code = $_GET['id_khachhang'];
	$sql_lietke_dh = "SELECT * FROM tbl_cart_details,tbl_giohang WHERE  tbl_cart_details.code_cart=tbl_giohang.code_cart AND tbl_giohang.id_khachhang = '".$code."' ORDER BY tbl_cart_details.id_cart_details DESC";
	//lấy dữ liệu từ bảng sản phẩm và cart details điều kiện 2 id bằng nahu và code trên get phải bằng code trong tbl cart details
  $query_lietke_dh = mysqli_query($mysqli,$sql_lietke_dh);
?>
<table  class='lietkesp'>
  <tr class="header_lietke">
  	<th>Id</th>
    <th>Mã đơn hàng</th>
    <th>Tên sản phẩm</th>
    <th>Số lượng</th>
    <th>Giá gốc</th>
    <th>Đơn giá</th>
   
    <th>Thành tiền</th>
  
  
  </tr>
  <?php
  $i = 0;
  $tongtien = 0;
  $giaspkm=0;
  while($row = mysqli_fetch_array($query_lietke_dh)){
    // if ($row['km']>0){
    //   $giaspkm=$row['giasp']-($row['giasp']*($row['km']/100));
    // }else {
    //   $giaspkm=$row['giasp'];
    // }
    $giaspkm=$row['giasp'];
  	$i++;
  	$thanhtien = $giaspkm*$row['soluongmua'];
  	$tongtien += $thanhtien ;
  ?>
  <tr>
  	<th><?php echo $i ?></th>
    <th><?php echo $row['code_cart'] ?></th>
    <th><?php echo $row['id_sanpham'] ?></th>
    <th><?php echo $row['soluongmua'] ?></th>
    <th><?php echo number_format($row['giagockm']).'đ' ?></th>
    <th><?php echo number_format($row['giasp']).'đ' ?></th>
    <th><?php echo number_format($thanhtien).'đ' ?></th>
   	
  </tr>
  <?php
  } 
  ?>
  <tr>
  	<th colspan="6">
   		<p>Tổng tiền : <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p>
   	</th>
   
  </tr>
  <tr>
    <th>
        <a class="inputdonhang" href="index.php?action=qlkhachhang&query=lietke">Quay lại trang quản lý đơn hàng</a> 
    </th>
  </tr>
 
</table>
</div>