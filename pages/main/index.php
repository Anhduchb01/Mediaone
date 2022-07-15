
<div class="main-slider">
    <?php
        $sql_anhtrangbia = "SELECT * FROM tbl_anhtrangbia WHERE tinhtrang=1";
        $query_anhtrangbia = mysqli_query($mysqli,$sql_anhtrangbia);
        while($row_anhtrangbia = mysqli_fetch_array($query_anhtrangbia)){
    ?>  
    <a href="#"><img class="mySlider" src="./admincp/modules/anhtrangbia/uploads/<?php echo $row_anhtrangbia['hinhanh'] ?>" height = 500px width = 100%></a>
    <!-- <a href="#"><img class="mySlider" src="./assets/img/Anh BTL to1.jpg" height = auto width = 100%></a> -->
    <?php } ?>
</div>
<script>
    var myIndex = 0;
    carousel();
    
    function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlider");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
    }
</script>
<div class="main-content">

    <div class="content-section">
        <h2 class="phuonganhheader">New Arrivals</h2>
        <a href="index.php?quanly=shopall"  class="section-sub-heading">Xem Thêm</a>
        <div class="maincontent">
            <?php
                $sql_pro = "(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`,`ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`, `director`, `run_time`, `studio`, `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,NULl as tacgia,NULL as nhaphathanh FROM tbl_dvd WHERE tinhtrang=1 LIMIT 4)
                UNION 
                (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,`tacgia`, `nhaphathanh` FROM tbl_book WHERE tinhtrang=1 LIMIT 4)
                UNION 
                (SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,`nghesi`,`gernes1`,`nhasx`,NULL as`tacgia`,NULL as `nhaphathanh` FROM tbl_cd WHERE tinhtrang=1 LIMIT 4) 
                ";
                $query_pro = mysqli_query($mysqli,$sql_pro);
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
<!-- </div>


        <?php
            $sql_baibao = "SELECT * FROM tbl_baibao WHERE tinhtrang=1";
            $query_baibao = mysqli_query($mysqli,$sql_baibao);
            while($row_baibao = mysqli_fetch_array($query_baibao)){
        ?> 
        <div class="journal-item">
            <img class="cangiua" src="./admincp/modules/quanlybaibao/uploads/<?php echo $row_baibao['hinhanh'] ?>" alt="" height = auto width = 97%>
            <div class="journal-body">
                <p><?php echo $row_baibao['thoigian'] ?></p>
                <h4 class="journal-heading"><?php echo $row_baibao['tenbaibao'] ?></h4>
                <p><?php echo $row_baibao['tomtat'] ?></p>
                <a href="./index.php?quanly=baibao&id=<?php echo $row_baibao['id_baibao'] ?>">Xem thêm</a>
            </div>
        </div>
        <?php
                }
        ?>
    </div>
</div> --> 
