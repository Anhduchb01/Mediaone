<div>
<?php
    if(isset($_GET['trang'])){ //khi inset trang
        $page = $_GET['trang']; //đặt $page = $ i ở số trang
    }else{
        $page =1;    
    }if($page == '' || $page == 1){     // khi trang 1 hoặc ko có số trang thì begin = 0
        $begin = 0;
    }else{
        $begin = ($page*8)-8;   // khi số khác thì lấy số trang nhân với 2 và trừ đi 2 sản phẩn trang trước vd đang lấy là mỗi trang 2 sp
    }

    //$sql_pro = "SELECT * FROM tbl_sanpham  DESC LIMIT $begin,2";
    // $sql_pro = "SELECT * FROM tbl_sanpham WHERE km>0 ORDER BY km DESC LIMIT $begin,8"; //lấy tất cả sản phẩm dựa vào id 
    // $sql_pro ="(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`,`ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`, `director`, `run_time`, `studio`, `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx,NULl as tacgia,NULL as nhaphathanh FROM tbl_dvd WHERE tinhtrang=1 AND km>0 ORDER BY km DESC LIMIT $begin,4)
    // UNION 
    // (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,`tacgia`, `nhaphathanh` FROM tbl_book WHERE tinhtrang=1 AND km>0 ORDER BY km DESC LIMIT $begin,4)
    // UNION 
    // (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,`nghesi`,`gernes1`,`nhasx`,NULL as`tacgia`,NULL as `nhaphathanh` FROM tbl_cd WHERE tinhtrang=1 AND km>0 ORDER BY km DESC LIMIT $begin,4) 
    // ";
    $sql_pro = "(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`,`ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`, `director`, `run_time`, `studio`, `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,NULl as tacgia,NULL as nhaphathanh FROM tbl_dvd WHERE tinhtrang=1  AND km>0 ORDER BY km DESC LIMIT $begin,4)
    UNION 
    (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,`tacgia`, `nhaphathanh` FROM tbl_book WHERE tinhtrang=1  AND km>0 ORDER BY km DESC LIMIT $begin,4)
    UNION 
    (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,`nghesi`,`gernes1`,`nhasx`,NULL as`tacgia`,NULL as `nhaphathanh` FROM tbl_cd WHERE tinhtrang=1  AND km>0 ORDER BY km DESC LIMIT $begin,4) ";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    //get ten danh muc
    // $sql_cate = "SELECT * FROM tbl_danhmuc WHERE tbl_danhmuc.id_danhmuc = '$_GET[id]' LIMIT 1";
    // $query_cate = mysqli_query($mysqli,$sql_cate);
    // $row_title = mysqli_fetch_array($query_cate);

?>

        <div class="headline">
                <h3>Khuyến Mãi</h3>
        </div>
        <div class="home-sort">
            <span class="filter-sort">Trang: <?php echo $page ?></span>
            <!-- <select class="list-sort-by">
                    <option value="price-ascending">Giá: Tăng dần</option>
                    <option value="price-descending" >Giá: Giảm dần</option>
                    <option value="title-ascending">Tên: A-Z</option>
                    <option value="title-descending" >Tên: Z-A</option>
                    <option value="created-ascending" >Cũ nhất</option>
                    <option value="created-descending">Mới nhất</option>
                    <option value="best-selling" >Bán chạy nhất</option>
                    <option value="quantity-descending">Tồn kho: Giảm dần</option>
            </select> -->
                
            </div>
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
                            <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>" class="maincontent-name"><?php echo $row_pro['tensanpham'] ?></a>
                            
                            <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>" ?>
                                <ul>
                                    <li><?php if($row_pro['id_danhmuc']==1){ echo "Author :",$row_pro['tacgia'] ;}elseif($row_pro['id_danhmuc']==2) {echo 'Artist :',$row_pro['nghesi'] ;}else {
                                                    echo "Director :",$row_pro['director'];} ?></li>
                                    <li><?php if($row_pro['id_danhmuc']==1){ echo "Publisher :",$row_pro['nhaphathanh'] ;}elseif($row_pro['id_danhmuc']==2) {echo 'Producer :',$row_pro['nhasx'] ;}else {
                                                    echo "Writer :",$row_pro['writers'];} ?></li>
                                </ul>
                        
                            </a>
                            
                            <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>" class="maincontent-gia"><?php if($row_pro['km']>0){ echo number_format($giaspkm).'$'; }else {echo number_format($row_pro['giasp']).'$';} ?>
                                            <span><?php if($row_pro['km']>0){
                                                    echo number_format($row_pro['giasp']).'$';
                                                    }else{

                                                    }
                                                    ?>                                                                                                                                                                                                        
                                            </span></a>
                        </div>
                    </div>
                </ul>
            <?php
                }
            ?>
            
        </div>
        <div class="content-paging">
            <?php   
                $sql_trang = mysqli_query($mysqli,"(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`,`ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`, `director`, `run_time`, `studio`, `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,NULl as tacgia,NULL as nhaphathanh FROM tbl_dvd WHERE tinhtrang=1 AND km>0 )
                UNION 
                (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,`tacgia`, `nhaphathanh` FROM tbl_book WHERE tinhtrang=1 AND km>0 )
                UNION 
                (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,`nghesi`,`gernes1`,`nhasx`,NULL as`tacgia`,NULL as `nhaphathanh` FROM tbl_cd WHERE tinhtrang=1 AND km>0)"); // lấy tất cả dữ liệu sản phẩm từ tbl sản phẩm điêu kiện có id danh mục  trùng với id danh mục trong tbl sản phẩm
                $row_count = mysqli_num_rows($sql_trang);
                $trang = ceil($row_count/8);//chia cho 2 này là lấy ví dụ mỗi trang có 2 sản phẩm
                // echo $trang;
            ?>
            <div class="filter-page">
                <!-- <a href="" class="filter-page-control fas ti-angle-left"></a> -->
                <?php
                    for($i=1;$i<=$trang;$i++){
                ?>
                <a <?php if($i==$page){echo 'style="color: red;background-color: #ccc;"';}else{'';} ?> href="index.php?quanly=sale&trang=<?php echo $i ?>" class="filter-page-number"><?php echo $i ?></a>
                <!-- kia là điều kiện nếu bấm vào trang nào thì trang đó có css như kia còn không là rỗng còn kia là đường link điều kiên -->
                <?php
                    }
                ?>
                <!-- <a href="" class="filter-page-control fas ti-angle-right"></a> -->
            </div>
        </div>