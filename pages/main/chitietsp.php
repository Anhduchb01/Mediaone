
				<div>
					<div id="product">
						<div id="backtoshop">
							<a href="./index.php" class="ti-angle-left">back to new arrivals</a>
						</div>
					</div>
					<div style="width:100%">
						<?php	
								// $sql_sanpham = "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$_GET[idsanpham]' AND tinhtrang=1  LIMIT 1"; 
								$sql_sanpham ="(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`,`ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`, `director`, `run_time`, `studio`, `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,NULl as tacgia,NULL as nhaphathanh FROM tbl_dvd WHERE  id_sanpham = '$_GET[idsanpham]' AND id_danhmuc='$_GET[danhmuc]'AND tinhtrang=1  LIMIT 1)
								UNION 
								(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,NULL as `nghesi`,NULL as `gernes1`,NULL as `nhasx`,`tacgia`, `nhaphathanh` FROM tbl_book WHERE id_sanpham = '$_GET[idsanpham]' AND id_danhmuc='$_GET[danhmuc]'AND tinhtrang=1  LIMIT 1)
								UNION 
								(SELECT `id_sanpham`, `tensanpham`, `giasp`, `km`, `giagockm`, `kichthuoc`, `cannang`, `ngonngu`, `tomtat`, `hinhanh`, `tinhtrang`, `soluong`, `id_danhmuc`,NULL as `director` ,NULL as `run_time` ,NULL as `studio`,NULL as `writers`,`nghesi`,`gernes1`,`nhasx`,NULL as`tacgia`,NULL as `nhaphathanh` FROM tbl_cd WHERE id_sanpham = '$_GET[idsanpham]' AND id_danhmuc='$_GET[danhmuc]'AND tinhtrang=1  LIMIT 1) 
								";
								$query_sanpham = mysqli_query($mysqli,$sql_sanpham);
								$giaspkm=0;
								while($row_sanpham = mysqli_fetch_array($query_sanpham)){
									if ($row_sanpham['km']>0){$giaspkm=$row_sanpham['giasp']-($row_sanpham['giasp']*($row_sanpham['km']/100));};
						?>
						<div class="product-detail-wapper">
							<div class="detail-wapper-info">
								<div class="detail-left-img">
									<div class="detail-left-big-img">
										<img src="./admincp/modules/quanlysp/uploads/<?php echo $row_sanpham['hinhanh'] ?>" alt="">
									</div>
								</div>
								<div class="detail-right-info">
									<div class="detail-right-info-name">
										<h1><?php echo $row_sanpham['tensanpham'] ?></h1>
										<ul>
											<li><?php if($row_sanpham['id_danhmuc']==1){ echo "Author :",$row_sanpham['tacgia'] ;}elseif($row_sanpham['id_danhmuc']==2) {echo 'Artist :',$row_sanpham['nghesi'] ;}else {
															echo "Director :",$row_sanpham['director'];} ?></li>
											<li><?php if($row_sanpham['id_danhmuc']==1){ echo "Publisher :",$row_sanpham['nhaphathanh'] ;}elseif($row_sanpham['id_danhmuc']==2) {echo 'Producer :',$row_sanpham['nhasx'] ;}else {
															echo "Writer :",$row_sanpham['writers'];} ?></li>
										</ul>
									</div>
									<div class="detail-right-info-price">
										<p><?php if($row_sanpham['km']>0){ echo number_format($giaspkm).'$'; }else {echo number_format($row_sanpham['giasp']).'$';} ?><span><?php if($row_sanpham['km']>0){
                                                    echo number_format($row_sanpham['giasp']).'$';
                                                    }else{

                                                    } ?></span></p>
									</div>
									<!-- <div class="detail-right-info-size">
										<a>Size :</a>
										<div class="select-size">
											<div data-value="S" class="info-size">
												<input class="option-size" id="size-s" type="radio" name="option2" value="S">
												<label for="size-s" class="sz">
													<span>S</span>
												</label>
											</div>
											<div data-value="M" class="info-size">
												<input class="option-size" id="size-m" type="radio" name="option2" value="M">
												<label for="size-m" class="sz">
													<span>M</span>
												</label>
											</div>
											<div data-value="L" class="info-size">
												<input class="option-size" id="size-l" type="radio" name="option2" value="L">
												<label for="size-l" class="sz">
													<span>L</span>
												</label>
											</div>
										</div>
									</div> -->
									<div class="selector-actions">
										<!-- <div class="quantity-area clearfix">
											<input type="number" id="quantity" name="quantity" value="1" min="1" class="quantity-selector">
										</div> -->
										<div class="wrap-addcart clearfix">
											<div>
												<form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php echo $row_sanpham['id_sanpham'] ?>&danhmuc=<?php echo $row_sanpham['id_danhmuc'] ?>">
													<button type  = "submit" id="add-to-cart" title = 'th??m v??o gi???' name="themgiohang" class="giohang add-to-cartProduct button btn-addtocart addtocart-modal"><a >th??m v??o gi???</a></button>
												</form>
												
											</div>
										</div>
									</div>
									<div class="product-description">
										<div class="description-content">
											<div class="description-productdetail">
												<p>S???n ph???m ???????c&nbsp;v???n chuy???n t??? 2-3 ng??y.</p>
												<p><?php echo $row_sanpham['tomtat'] ?></p>
												<hr>
												<p>
													<strong>MEDIA ONE???&nbsp;&nbsp;</strong>
													???
													<strong>&nbsp;&nbsp;</strong>
													&nbsp;&nbsp;???
													<br>
													Copyright ?? 2021 MEDIA ONE. All rights reserved
												</p>
												<p>&nbsp;</p>
												<p>&nbsp;</p>
												<p>&nbsp;</p>
												<p>&nbsp;</p>
												<p>&nbsp;</p>
											</div>
										</div>
									</div>
								</div>
							</div>
					<?php } ?>
					<div class="splienquan">
						<h1>S???n ph???m li??n quan<h1>
					</div>
					<div class="maincontent">
             
                                <?php
                                        // $sql_pro = "SELECT * FROM tbl_sanpham order by RAND() LIMIT 4 ";
										if($_GET['danhmuc']==1){
											$sql_pro = "SELECT * FROM `tbl_book` WHERE tinhtrang=1 order by RAND() LIMIT 4";
										}
										elseif ($_GET['danhmuc']==2) {
											$sql_pro = "SELECT * FROM `tbl_cd` WHERE tinhtrang=1 order by RAND() LIMIT 4";
										}
										else {
											$sql_pro = "SELECT * FROM `tbl_dvd` WHERE tinhtrang=1 order by RAND() LIMIT 4";
										}
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
                                                <button type  ="submit" title = 'chi tiet' class="muangay"  name="chitiet"><a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>">Chi ti???t</a></button>
                                                <form method="POST" action="./pages/main/themgiohang.php?idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>">
                                                <button type  = "submit" title = 'th??m v??o gi???' name="themgiohang" class="giohang"><a >th??m v??o gi???</a></button>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="maincontent-info">
                                            <a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>" class="maincontent-name"><?php echo $row_pro['tensanpham'] ?></a>
                                            
											<a href="index.php?quanly=chitiet&idsanpham=<?php echo $row_pro['id_sanpham'] ?>&danhmuc=<?php echo $row_pro['id_danhmuc'] ?>" class="maincontent-chitiet">
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
                </div>
					