<?php
	if(isset($_POST['timkiem'])){
		$giathap = (float) $_POST['giathap'];
        $giacao = (float) $_POST['giacao'];
        
	}
	// $sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'  ";
	// $sql_pro = "SELECT * FROM tbl_sanpham WHERE giasp<$giacao AND giasp >$giathap";
    $sql_pro = "(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`,`ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`, `director`, `run_time`, `studio`, `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,NULl as tacgia,NULL as nhaphathanh FROM tbl_dvd WHERE giasp<$giacao AND giasp >$giathap AND tinhtrang=1 LIMIT 4)
                UNION 
                (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,`tacgia`, `nhaphathanh` FROM tbl_book WHERE giasp<$giacao AND giasp >$giathap AND tinhtrang=1 LIMIT 4)
                UNION 
                (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,`nghesi`,`gernes1`,`nhasx`,NULL as`tacgia`,NULL as `nhaphathanh` FROM tbl_cd WHERE giasp<$giacao AND giasp >$giathap AND tinhtrang=1 LIMIT 4) 
                ";
    $query_pro = mysqli_query($mysqli,$sql_pro);
	
?>
<div class="headline">
        <h3>Tìm kiếm : <?php echo $_POST['giathap']; ?> $ đến <?php echo $_POST['giacao']; ?> $</h3>
</div>
<div class="maincontent">
    <?php
        $giaspkm=0;
        while($row_pro = mysqli_fetch_array($query_pro)){
            if ($row_pro['km']>0){$giaspkm=$row_pro['giasp']-($row_pro['giasp']*($row_pro['km']/100));};
    ?>
    
        <ul>
        <div class="maincontent-item">
                <div class="maincontent-top">

                    <?php 
                        if($row_pro['km']==0){

                        }else{
                    ?>
                            <div class="khuyenmai"><?php echo number_format($row_pro['km']).'%' ?></div>
                    <?php  
                        }
                    ?>
                    <div class="maiconten-top1">
                        
                        <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>" class="maincontent-img">
                            <img src="./admincp/modules/quanlysp/uploads/<?php echo $row_pro['hinhanh'] ?>">
                        </a>
                        <button type  ="submit" title = 'chi tiet' class="muangay"  name="chitiet"><a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>">Chi tiết</a></button>
                        <form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>">
                        <button type  = "submit" title = 'thêm vào giỏ' name="themgiohang" class="giohang"><a >thêm vào giỏ</a></button>
                        </form>
                    </div>
                </div>
                <div class="maincontent-info">
                    <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>" class="maincontent-name"><?php echo 'BOOK :',$row_pro['tensanpham'] ?>
                    
                
                
                    </a>
                    <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>" class="maincontent-chitiet">
                    <ul>
                        <li><?php if($row_pro['id_danhmuc']==1){ echo "Author :",$row_pro['tacgia'] ;}elseif($row_pro['id_danhmuc']==2) {echo 'Artist :',$row_pro['nghesi'] ;}else {
                                        echo "Director :",$row_pro['director'];} ?></li>
                        <li><?php if($row_pro['id_danhmuc']==1){ echo "Publisher :",$row_pro['nhaphathanh'] ;}elseif($row_pro['id_danhmuc']==2) {echo 'Producer :',$row_pro['nhasx'] ;}else {
                                        echo "Writer :",$row_pro['writers'];} ?></li>
                    </ul>
                        
                    </a>


                    <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>" class="maincontent-gia"><?php if($row_pro['km']>0){ echo number_format($row_pro['giagockm']).'$'; }else {echo number_format($row_pro['giasp']).'$';} ?>
                                    <span><?php if($row_pro['km']>0){
                                            echo number_format($row_pro['giasp']).'$';
                                            }else{

                                            }
                                            ?>                                                                                                                                                                                                        
                                    </span>
                                    
                                    
                                    
                                </a>
                                
                    
                    
                </div>
            </div>
            </ul>
            
            <?php
                }
            ?>
            
        </div>
        
    </div>