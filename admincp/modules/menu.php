
<div class="sidebar1">
    
    <div class="sanpham">
                    <a >Quản lý sản phẩm</a>
                    <div class="sanpham1">
                        <a href="index.php?action=quanlymenu&query=them">Thêm menu</a>
                        <a href="index.php?action=quanlysp&query=them">Thêm sản phẩm</a>
                        <a href="index.php?action=quanlysp&query=lieke">Danh sách sản phẩm</a>
                    </div>
                </div>
    <a href="index.php?action=quanlydonhang&query=lietke">Quản lý đơn hàng</a>
    <?php
        if(isset($_GET['dangxuat'])&&$_GET['dangxuat']==1){
            unset($_SESSION['dangky']);
            header('Location:../index.php');
        }
    ?>
    <div class="sanpham">
        <a href="index.php?action=qlkhachhang&query=lietke">Quản lí khách hàng</a>
    </div>

    <div class="sanpham">
        <a href="index.php?action=thongkedoanhthu&query=thongke">Thống kê doanh thu</a>
    </div>

    
    
    <div class="sanpham">
        <a >Quản lý chính sách</a>
        <div class="sanpham1">
            <a href="index.php?action=quanlytenchinhsach&query=them">Quản lý tên chính sách</a>
            <a href="index.php?action=quanlychinhsach&query=them">Thêm chính sách</a>
            <a href="index.php?action=quanlychinhsach&query=lietke">Danh sách chính sách</a>
        </div>
    </div>
    <div class="sanpham">
        <a >Quản lý trang chủ</a>
        <div class="sanpham1">
            <a href="index.php?action=quanlylienhe&query=them">Thêm liên hệ</a>
            <a href="index.php?action=quanlychinhanh&query=them">Thêm chi nhánh</a>
            <a href="index.php?action=anhtrangbia&query=them">Ảnh trang bìa</a>
        </div>
    </div>
    <div class="sanpham">
        <a >Quản lý bài báo</a>
        <div class="sanpham1">
            <a href="index.php?action=quanlybaibao&query=them">Thêm bài báo</a>
            <a href="index.php?action=quanlybaibao&query=lietke">Liệt kê bài báo</a>
        </div>
    </div>
    <p><a href="index.php?dangxuat=1">Đăng xuất : <?php if(isset($_SESSION['dangky'])){
		echo $_SESSION['email'];
        

	} ?></a></p>
</div>
<!-- <ul  class='menu'>
    <li><a href="index.php?action=quanlymenu&query=them">Quản lí menu</a></li>
    <li><a href="index.php?action=quanlysp&query=them">Quản lí sản phẩm</a></li>
    <li><a href="index.php?action=quanlydonhang&query=lietke">Quản lí đơn hàng</a></li>
</ul> -->