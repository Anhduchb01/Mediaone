               

                    
                    <div class="cart">
                        <div class="cart_header">
                            <a  href="./index.php">Trang chủ</a>
                        </div>
                        <?php
                            if(isset($_SESSION['dangky'])){
                                echo 'Xin chào: '.$_SESSION['dangky'];
                            }
                        ?>
                        
                        <div class="cart_main">
                            
                        
                            <div class="cart_main--sp">
                                <h3>GIỎ HÀNG CỦA BẠN</h3>
                                <div class="cart_main--sp_ul">
                                    <div>
                                        <?php
                                            $tongtien=0; 
                                            if(isset($_SESSION['cart'])){
                                            
                                            $soluongsanpham=0;   
                                        ?>
                                        
                                        
                                            <?php
                                                
                                                    foreach($_SESSION['cart'] as $cart_item){
                                                        $thanhtien = $cart_item['soluong']*$cart_item['giasp'];
                                                        $tongtien+=$thanhtien;
                                                        $soluongsanpham+=$cart_item['soluong'];
                                                        
                                            ?>
                                            
                                            <div class="spgiohang_cart">
                                                <div class="cart_spgiohang-img" name="hinhanh">
                                                    <img src="./admincp/modules/quanlysp/uploads/<?php echo $cart_item['hinhanh'] ?>" alt="sp1" width="100%" height="auto">
                                                </div>
                                                <div class="cart_info-sp">
                                                    <a href="index.php?quanly=chitiet&idsanpham=<?php echo $cart_item['id']?>"><p  name="tensanpham"><?php echo $cart_item['tensanpham'] ?></p></a><!-- thêm chi link chi tiết sản phẩm -->
                                                    <!-- <p><input type="text" placeholder="Chọn Size" name="size"></p> -->
                                                </div>
                                                <div class="cart_spgiohang-sl">
                                                    <a href="./pages/main/themgiohang.php?cong=<?php echo $cart_item['id'] ?>" class="ti-plus"></a>
                                                    <span name="soluong" class="cart_spgiohang-sl_stt"><?php echo $cart_item['soluong'] ?></span>
                                                    <a href="./pages/main/themgiohang.php?tru=<?php echo $cart_item['id'] ?>" class="ti-minus"></a>
                                                </div>
                                                <div name="giasp" class="cart_spgiohang-monney"><?php echo number_format($cart_item['giasp']).'đ' ?></div>
                                                <div class="cart_spgiohang-thanhtien">
                                                    <p >Thành tiền</p>
                                                    <p class="color_red"><?php echo number_format($thanhtien).'đ' ?></p>
                                                    <a href="./pages/main/themgiohang.php?xoa=<?php echo $cart_item['id'] ?>" class="color_red ti-trash"></a>
                                                </div> 
                                            </div>
                                        
                                        <?php  
                                                } 
                                        ?>
                                            <div class="cart_main--sp_ul--heading">Bạn đang có <?php echo $soluongsanpham ?> sản phẩm trong giỏ hàng</div>
                                        <?php  
                                            }else{
                                        ?>
                                        <div class="cart_main--sp_ul--heading">Giỏ hàng không có sản phẩm nào</div>
                                        <?php
                                            }
                                        ?>
                                        
                                    </div>
                                    <div class="cart_main-footer">
                                        <div class="cart_ghichu">
                                            <p for="fnote">Ghi chú đơn hàng</p><br>
                                            <textarea type="text" id="fnote" name="fnote"></textarea>
                                        </div>
                                        <div class="cart_chinhsachdoitra">
                                            <ul>
                                                <h4>Chính sách Đổi/Trả</h4>
                                                <li>Sản phẩm được đổi 1 lần duy nhất, không hỗ trợ trả.</li>
                                                <li>Sản phẩm còn đủ tem mác, chưa qua sử dụng.</li>
                                                <li>Sản phẩm nguyên giá được đổi trong 30 ngày trên toàn hệ thống.</li>
                                                <li>Sản phẩm sale chỉ hỗ trợ đổi size (nếu cửa hàng còn) trong 7 ngày trên toàn hệ thống.</li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            <div class="cart_main--sidebar">
                                <div>
                                    <a href="./index.php" class="cart_main--sidebar_next">
                                        <p>Tiếp tục mua hàng →</p>
                                    </a>
                                </div>
                                <div class="cart_main--sidebar_main">
                                    <p class="cart_main--sidebar_main-1">Thông tin đơn hàng</p>
                                    <p class="cart_main--sidebar_main-2" >Tổng tiền: <span name="tongtien"><?php   echo number_format($tongtien).'đ' ;?> </span></p>
                                    <div class="cart_main--sidebar_main-3">
                                        <p>Bạn phải đăng nhập để thanh toán</p>
                                        <?php   
                                            if(isset($_SESSION['dangky'])){
                                        ?>
                                         <!-- href="pages/main/thanhtoan.php" -->
                                        <a href="pages/main/thanhtoan.php" name="thanhtoan" >THANH TOÁN</a>
                                        <?php
                                            }else{
                                        ?>
                                        <a href="index.php?quanly=dangnhap">ĐĂNG NHẬP THANH TOÁN</a>
                                        <?php
                                            }
                                        ?>
                                    </div>
                                </div>
                            </div> 
                        
                            <div></div>
                        </div>
                        <!-- <div class="cart_thamkhaao">
                            <div class="cart_thamkhaao-1"> 
                                <h2>Có thể bạn sẽ thích</h2>
                                <p><a href="index.php?quanly=shopall">Xem thêm</a></p> <!-- thêm chi link sản phẩm mới -->
                            </div>
                            
                        </div> 
                    </div>